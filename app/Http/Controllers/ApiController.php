<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\CartController;

use Carbon\Carbon;

use Response;
use DB;

use App\Models\User;
use App\Models\Product;
use App\Models\Classes;
use App\Models\Author;
use App\Models\Singer;
use App\Models\Comment;
use App\Models\CSMsg;

class ApiController extends Controller {
    // shopping cart
    public function addProductToCart() {
        $input = request();
        $cart = $input->session()->get('cart');
        CartController::$cart = ($cart == null) ? [] : $cart;
        $p_id = $input["p_id"];
        $q = $input["quantity"];
        CartController::addProduct($p_id, $q);
        $input->session()->put('cart', CartController::$cart);
        $response = [
            "status" => "success"
        ];

        return Response::json($response);
    }
    public function removeProductFromCart() {
        $input = request();
        $cart = $input->session()->get('cart');
        CartController::$cart = ($cart == null) ? [] : $cart;
        CartController::removeProduct($input["p_id"]);
        $input->session()->put('cart', CartController::$cart);
        $response = [
            "status" => "success"
        ];

        return Response::json($response);
    }
    public function updateQuantity() {
        $input = request();
        $p_id = $input["p_id"];
        $q = $input["quantity"];
        $cart = $input->session()->get('cart');
        CartController::$cart = ($cart == null) ? [] : $cart;
        CartController::updateQuantity($p_id, $q);
        $input->session()->put('cart', CartController::$cart);
        $response = [
            "status" => "success"
        ];

        return Response::json($response);
    }

    // wishlist
    public function addProductToWishlist() {
        $input = request();
        $p_id = $input["p_id"];
        $wish = [
            "p_id" => $p_id,
            "u_id" => $input->user()->u_id,
        ];
        DB::table('wishlist')->insert($wish);
        $response = [
            "status" => "success"
        ];

        return Response::json($response);
    }
    public function removeProductFromWishlist() {
        $input = request();
        $p_id = $input["p_id"];
        DB::table('wishlist')->where('p_id', $p_id)->delete();
        $response = [
            "status" => "success"
        ];

        return Response::json($response);
    }

    // payment
    public function pay() {
        $input = request();
        DB::transaction(function() use(&$input) {
            $u_id = $input->user() ? $input->user()->u_id : null;
            $orders = $input["order"];
            $points = $input["points"];
            date_default_timezone_set('Asia/Taipei');
            $time = date('Y-m-d H:i:s');
            $cost = 0;
            $record = [
                "u_id" => $u_id,
                "usedPoint" => $points,
                "time" => $time,
                "cost" => $cost,
            ];
            DB::table("purchase_record")->insert($record);
            $r_id = DB::table("purchase_record")
                ->where("u_id", "=", $u_id)
                ->where("time", "=", $time)
                ->where("cost", "=", $cost)
                ->value("r_id");
            foreach($orders as $p_id => $quantity) {
                $order = [
                    "r_id" => $r_id,
                    "p_id" => $p_id,
                    "quantity" => $quantity,
                ];
                DB::table("order")->insert($order);
                DB::statement("UPDATE product SET inventory=inventory-$quantity WHERE p_id=$p_id");
                $e_or_r = DB::table("product")->where("p_id", "=", $p_id)->value("p_e_or_r");
                if ($e_or_r=="e" && $u_id) {
                    $own = [
                        "u_id" => $u_id,
                        "p_id" => $p_id,
                    ];
                    DB::table("own")->insert($own);
                }
                $cost += DB::table("product")->where("p_id", "=", $p_id)->value("price") * $quantity;
            }
            if ($u_id) {
                $get = round($cost / 100);
                DB::statement("UPDATE member SET points=points-$points+$get WHERE u_id=$u_id");
            }
            DB::table("purchase_record")->where("r_id", "=", $r_id)->update(["cost" => $cost-$points]);
        });
        CartController::clear();
        $input->session()->put('cart', CartController::$cart);

        $response = [
            "status" => "success"
        ];
        return Response::json($response);
    }

    // reader
    public function checkPageExists() {
        $input = request();
        $book = $input['book'];
        $page = $input["page"];
        $response = [
            "status" => "success"
        ];
        if (file_exists("storage/books/$book/$page.jpg")) {
            $response["data"] = true;
        }
        else {
            $response["data"] = false;
        }
        return Response::json($response);
    }

    // record
    public function searchRecord() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $u_id = $input->user() ? $input->user()->u_id : 0;
        $u_type = User::where("u_id", "=", $u_id)->value("u_type");
        $type = $input["type"];
        if ($type == 'id') {
            $r_id = $input["r_id"];
            if ($u_id==0 || ($u_type && $u_type=='merchant')) {
                $record = DB::table("purchase_record")
                    ->where("r_id", "=", $r_id)
                    ->first();
            }
            else {
                $record = DB::table("purchase_record")
                    ->where("r_id", "=", $r_id)
                    ->where("u_id", "=", $u_id)
                    ->first();
            }
            $order = DB::table("order")
                ->where("r_id", "=", $r_id)
                ->join("product", "product.p_id", "=", "order.p_id")
                ->get();
            $data = [
                "record" => $record,
                "order" => $order,
            ];
            $response["data"] = [$data];
        }
        else if ($type == 'date') {
            $startDate = $input["startDate"];
            $endDate = $input["endDate"];

            if ($u_id==0 || ($u_type && $u_type=='merchant')) {
                $records = DB::table("purchase_record")
                    ->whereBetween("time", [$startDate, $endDate])
                    ->get();
            }
            else {
                $records = DB::table("purchase_record")
                    ->where("u_id", "=", $u_id)
                    ->whereBetween("time", [$startDate, $endDate])
                    ->get();
            }
            
            $data = [];
            foreach ($records as $record) {
                $r_id = $record->r_id;
                $order = DB::table("order")
                    ->where("r_id", "=", $r_id)
                    ->join("product", "product.p_id", "=", "order.p_id")
                    ->get();
                $tmp = [
                    "record" => $record,
                    "order" => $order,
                ];
                array_push($data, $tmp);
            }
            $response["data"] = $data;
        }
        else if ($type == 'class') {
            $classes = $input['class'];
            $ordersContainTargetClasses = DB::table("order")
                ->select("r_id")
                ->whereIn("p_id", function ($query) use(&$classes) {
                    $query->select("p_id")
                        ->from("classes")
                        ->whereIn("c_id", $classes);
                })
                ->distinct()
                ->orderBy("r_id", 'asc')
                ->get();
            
            $data = [];
            foreach ($ordersContainTargetClasses as $order) {
                $r_id = $order->r_id;
                if ($u_id==0 || ($u_type && $u_type=='merchant')) {
                    $record = DB::table("purchase_record")
                    ->where("r_id", "=", $r_id)
                    ->first();
                }
                else {
                    $record = DB::table("purchase_record")
                    ->where("r_id", "=", $r_id)
                    ->where("u_id", "=", $u_id)
                    ->first();
                }
                
                $order = DB::table("order")
                    ->where("r_id", "=", $r_id)
                    ->join("product", "product.p_id", "=", "order.p_id")
                    ->get();
                $tmp = [
                    "record" => $record,
                    "order" => $order,
                ];
                array_push($data, $tmp);
            }
            $response["data"] = $data;
        }
        else {
            $response["status"] = "fail";
        }

        return Response::json($response);
    }

    // merchant platform
    public function deleteStaff() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $u_id = $input["u_id"];
        DB::table("users")
            ->where("u_id", "=", $u_id)
            ->delete();
        return Response::json($response);
    }
    public function getProduct() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $p_id = $input["p_id"];
        $detail = Product::where("p_id", "=", $p_id)->first();
        $p_type = Product::where("p_id", "=", $p_id)->value("p_type");
        $as = ($p_type == "book") ? 
            Product::find($p_id)->authors->pluck('name')->toArray() : 
            Product::find($p_id)->singers->pluck('name')->toArray();
        $classes = DB::table("classes")
            ->where("p_id", "=", $p_id)
            ->pluck('c_id')
            ->toArray();
        $response["data"] = [
            "detail" => $detail,
            "as" => $as,
            "classes" => $classes,
        ];
        return Response::json($response);
    }
    public function updateProduct() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $p_id = $input["p_id"];
        if ($input->photo) {
            $photoPath = $input->photo->store('product', 'public');
            Product::where("p_id", "=", $p_id)->update(["photo" => $photoPath]);
        }
        $er_and_type = explode("-", $input["p_type"]);
        $p_e_or_r = $er_and_type[0];
        $p_type = $er_and_type[1];
        $author_or_singer = explode(", ", $input["author_or_singer"]);
        $classes = $input["classes"];
        $product = [
            "p_name" => $input["name"],
            "description" => $input["description"],
            "price" => $input["price"],
            "inventory" => $input["inventory"],
            "p_type" => $p_type,
            "p_e_or_r" => $p_e_or_r,
            "isbn" => $input["isbn"],
            "publisher" => $input["publisher"],
        ];
        Product::where("p_id", "=", $p_id)->update($product);
        Classes::where("p_id", "=", $p_id)->delete();
        foreach($classes as $c_id) {
            $data = [
                "p_id" => $p_id,
                "c_id" => $c_id,
            ];
            Classes::create($data);
        }
        if ($p_e_or_r=="e" && $input->file) {
            $file = $input->file('file');
            if ($p_type == "book") {
                $path = PdfController::uploadPdf($file);
                $path = explode("/", $path)[1];
                $path = explode(".", $path)[0];
            }
            else {
                $path = $file->store('music', 'public');
            }
            Product::where("p_id", "=", $p_id)->update(["path" => $path]);
        }

        if ($p_type == "book") {
            Author::where("p_id", "=", $p_id)->delete();
            foreach($author_or_singer as $author) {
                $tmp = [
                    "p_id" => $p_id,
                    "name" => $author,
                ];
                DB::table("author")->insert($tmp);
            }
        }
        else {
            Singer::where("p_id", "=", $p_id)->delete();
            foreach($author_or_singer as $singer) {
                $tmp = [
                    "p_id" => $p_id,
                    "name" => $singer,
                ];
                DB::table("singer")->insert($tmp);
            }
        }

        return Response::json($response);
    }
    public function deleteProduct() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $p_id = $input["p_id"];
        DB::table("product")
            ->where("p_id", "=", $p_id)
            ->delete();
        return Response::json($response);
    }
    public function deleteAdvertisement() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $a_id = $input["a_id"];
        DB::table("ad")
            ->where("a_id", "=", $a_id)
            ->delete();
        return Response::json($response);
    }
    public function getChartData() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $startDate = $input["startDate"];
        $endDate = $input["endDate"];
        $productTypes = $input["productType"];
        $data = [
            "labels" => [],
            "datasets" => [],
        ];
        foreach ($productTypes as $type) {
            $data["datasets"][$type] = [];
        }
        $records = DB::table("order")
            ->join("purchase_record", "purchase_record.r_id", "=", "order.r_id")
            ->join("product", "product.p_id", "=", "order.p_id")
            ->whereBetween(DB::raw('CAST(time AS DATE)'), [$startDate, $endDate])
            ->orderBy("time")
            ->get()
            ->groupBy(function($query) {
                return Carbon::parse($query->time)->format('Y-m');
            })
            ;

        $i = 0;
        foreach($records as $label => $orders) {
            array_push($data["labels"], $label);
            foreach ($productTypes as $type) {
                $data["datasets"][$type][$i] = 0;
            }
            foreach ($orders as $detail) {
                $type = $detail->p_e_or_r . "-" . $detail->p_type;
                if (array_key_exists($type, $data["datasets"])) {
                    $data["datasets"][$type][$i] += $detail->quantity;
                }
            }
            $i++;
        }

        $response["data"] = $data;
        return Response::json($response);
    }

    // comments
    public function giveComment() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        date_default_timezone_set('Asia/Taipei');
        $data = [
            "u_id" => $input->user()->u_id,
            "p_id" => $input["p_id"],
            "stars" => $input["stars"],
            "content" => $input["content"],
            "time" => date('Y-m-d H:i:s'),
        ];
        Comment::create($data);
        return Response::json($response);
    }

    // cs
    public function getCustomerServiceMessageOnCustomer() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $u_id = $input->user()->u_id;
        $m_id = $input["m_id"];
        $msg = CSMsg::where("c_id", "=", $u_id)
            ->where("m_id", "=", $m_id)
            ->orderBy("time")
            ->get();
        $response["data"] = $msg;
        return Response::json($response);
    }
    public function getCustomerServiceMessageOnCS() {
        $response = [
            "status" => "success"
        ];
        $input = request();
        $u_id = $input->user()->u_id;
        $c_id = $input["c_id"];
        $msg = CSMsg::where("m_id", "=", $u_id)
            ->where("c_id", "=", $c_id)
            ->orderBy("time")
            ->get();
        $response["data"] = $msg;
        $response["c_id"] = $c_id;
        $response["m_id"] = $u_id;
        return Response::json($response);
    }

    public function sendMessageOnCustomer(){
        $response = [
            "status" => "success"
        ];
        $input = request();
        date_default_timezone_set('Asia/Taipei');
        $data = [
            "c_id" => $input->user()->u_id,
            "m_id" => $input["m_id"],
            "message" => $input["msg"],
            "time" => date('Y-m-d H:i:s'),
            "from" => $input->user()->u_id,
        ];
        CSMsg::create($data);
        return Response::json($response);
    }
    public function sendMessageOnCS(){
        $response = [
            "status" => "success"
        ];
        $input = request();
        date_default_timezone_set('Asia/Taipei');
        $data = [
            "c_id" => $input["c_id"],
            "m_id" => $input->user()->u_id,
            "message" => $input["msg"],
            "time" => date('Y-m-d H:i:s'),
            "from" => $input->user()->u_id,
        ];
        CSMsg::create($data);
        return Response::json($response);
    }

    // random
    public function goodLuck() {
        $response = [
            "status" => "success",
        ];
        $response["data"] = Product::all()->random(1)->first()->p_id;
        return Response::json($response);
    }

    // test
    public function lookSession() {
        $input = request();
        $p_id = $input->p_id;
        // $data = $input->session()->all();
        $data = $input->user()->u_id;
        return Response::json($data);
    }
}
