<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\CartController;

use Response;
use DB;

class ApiController extends Controller {
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
                $cost += DB::table("product")->where("p_id", "=", $p_id)->value("price") * $quantity;
            }
            if ($u_id) {
                $get = $cost % 100;
                DB::statement("UPDATE member SET points=points-$points+MOD($cost, 100) WHERE u_id=$u_id");
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

    public function lookSession() {
        $input = request();
        $data = $input->session()->all();
        return Response::json($data);
    }
}
