<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

use App\Module\ShareData;

use DB;
use Auth;

use App\Models\Product;
use App\Models\Comment;
use App\Models\AllClasses;

class CustomerController extends Controller {
    public function listPage() {
        $input = request();
        $keyword = $input->keyword;
        $u_id = $input->user() ? $input->user()->u_id : 0;
        $productColumns = Schema::getColumnListing('product');
        $ignore = [
            "p_id",
            "price",
            "inventory",
            "photo",
            "path",
        ];
        $i = 0;
        $products = [];
        foreach($productColumns as $col) {
            if (in_array($col, $ignore)) {
                continue;
            }
            $tmp = Product::whereLike($col, $keyword)->get();
            if (count($tmp) == 0) {
                continue;
            }

            if ($i == 0) {
                $products = $tmp;
            }
            else {
                $products->merge($tmp);
            }
            $i++;
        }
        
        $data = [];
        foreach ($products as $product) {
            $p_id = $product->p_id;
            $p_type = $product->p_type;
            $as = ($p_type == "book") ? Product::find($p_id)->authors : Product::find($p_id)->singers;
            $inWishlist = DB::table("wishlist")
                ->where("u_id", "=", $u_id)
                ->where("p_id", "=", $p_id)
                ->first();
            $avg = Comment::where("p_id", "=", $p_id)->groupBy('p_id')->avg('stars');
            $avg = round($avg, 0);

            $d = [
                "detail" => $product,
                "as" => $as,
                "inWishlist" => $inWishlist===null ? false : true,
                "avg" => $avg,
            ];
            array_push($data, $d);
        }
        $name = 'list';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            "products" => $data,
        ];
        return view('customer.list', $binding);
    }

    public function allPage() {
        $input = request();
        $c_id = $input->c_id;
        $p_e_or_r = $input->er;
        $u_id = $input->user() ? $input->user()->u_id : 0;
        $className = AllClasses::find($c_id)->class;
        $productsContainTargetClass = DB::table("classes")
            ->where("c_id", "=", $c_id)
            ->join("product", "product.p_id", "=", "classes.p_id")
            ->where("p_e_or_r", "=", $p_e_or_r)
            ->distinct()
            ->get();
        $products = [];
        foreach($productsContainTargetClass as $product) {
            $p_id = $product->p_id;
            $stars = DB::table("comment")
                ->where("p_id", "=", $p_id)
                ->groupBy('p_id')
                ->avg('stars');
            $inWishlist = DB::table("wishlist")
                ->where("p_id", "=", $p_id)
                ->where("u_id", "=", $u_id)
                ->groupBy('p_id')
                ->count();
            $table = $product->p_type == "book" ? "author" : "singer";
            $author_or_singer = DB::table($table)
                ->where("p_id", "=", $p_id)
                ->get();
            $products[$p_id] = [
                "detail" => $product,
                'as' => $author_or_singer,
                "stars" => round($stars),
                "inWishlist" => $inWishlist ? True : False,
            ];
        }
        $name = 'all';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'products' => $products,
            'className' => $className,
        ];
        return view('customer.all', $binding);
    }

    public function profilePage() {
        $name = 'profile';
        $u_id = request()->user()->u_id;
        $profile = DB::table('users')
            ->join('member', 'users.u_id', '=', 'member.u_id')
            ->where("users.u_id", "=", $u_id)
            ->first();
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'profile' => $profile,
        ];
        return view('customer.profile', $binding);
    }
    public function profileProcess() {
        $input = request();
        $u_id = $input->user()->u_id;
        $email = $input["email"];
        $name = $input["name"];
        $phone = $input["phone"];
        $address = $input["address"];
        DB::table("users")
            ->where("u_id", "=", $u_id)
            ->update(['email' => $email]);
        DB::table("member")
            ->where("u_id", "=", $u_id)
            ->update([
                "name" => $name,
                "phone" => $phone,
                "address" => $address,
            ]);
        return Redirect::to("/profile");
    }

    public function wishlistPage() {
        $name = 'wishlist';
        $input = request();
        $u_id = $input->user() ? $input->user()->u_id : 0;
        $winshlist = DB::table("wishlist")
            ->join("product", "wishlist.p_id", "=", "product.p_id")
            ->where("u_id", "=", $u_id)
            ->get();
        $author_or_singer = [];
        $classes = [];
        $avg = [];
        foreach($winshlist as $w) {
            $p_id = $w->p_id;
            $p_type = $w->p_type;
            $as = $p_type=="book" ? "author" : "singer";
            $as = DB::table($as)
                ->where("p_id", "=", $p_id)
                ->get();
            $c = DB::table("classes")
                ->where("p_id", "=", $p_id)
                ->join("all_classes", "classes.c_id", "=", "all_classes.c_id")
                ->get();
            $a = DB::table("comment")
                ->where("p_id", "=", $p_id)
                ->groupBy('p_id')
                ->avg('stars');
            $a = $a==null ? 0 : $a;
            $a = round($a, 0);

            array_push($author_or_singer, $as);
            array_push($classes, $c);
            array_push($avg, $a);
        }
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'wishlist' => $winshlist,
            'author_or_singer' => $author_or_singer,
            "classes" => $classes,
            "avg" => $avg,
        ];
        return view('customer.wishlist', $binding);
    }

    public function mybookPage() {
        $name = 'mybook';
        $input = request();
        $u_id = $input->user()->u_id;
        $own = DB::table("own")
            ->where("u_id", "=", $u_id)
            ->where("p_type", "=", "book")
            ->join("product", "product.p_id", "=", "own.p_id")
            ->get();
        $mybooks = [];
        foreach($own as $book) {
            $p_id = $book->p_id;
            $authors = DB::table("author")->where("p_id", "=", $p_id)->get();
            $mybooks[$p_id] = [
                "book" => $book,
                "author" => $authors,
            ];
        }
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'mybooks' => $mybooks,
        ];
        return view('customer.mybook', $binding);
    }

    public function mymusicPage() {
        $name = 'mymusic';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.mymusic', $binding);
    }

    public function detailPage($p_id) {
        $name = 'detail';
        $p_type = Product::where("p_id", "=", $p_id)->value("p_type");
        $detail = Product::where("p_id", "=", $p_id)->first();
        $author_or_singer = ($p_type == "book") ? Product::find($p_id)->authors : Product::find($p_id)->singers;
        $classes = DB::table("classes")
            ->where("p_id", "=", $p_id)
            ->join("all_classes", "classes.c_id", "=", "all_classes.c_id")
            ->get();
        $comments = Product::where("product.p_id", "=", $p_id)
            ->join("comment", "comment.p_id", "=", "product.p_id")
            ->join("users", "users.u_id", "=", "comment.u_id")
            ->orderBy('time')
            ->get();

        if (Auth::user()) {
            $inWishlist = DB::table("wishlist")
                ->where("u_id", "=", Auth::user()->u_id)
                ->where("p_id", "=", $p_id)
                ->first();
        }
        else {
            $inWishlist = null;
        }

        $avg = Comment::where("p_id", "=", $p_id)->groupBy('p_id')->avg('stars');
        $avg = round($avg, 0);

        if($inWishlist === null) {
            $inWishlist = False;
        }
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'detail' => $detail,
            'author_or_singer' => $author_or_singer,
            "classes" => $classes,
            'comments' => $comments,
            "inWishlist" => $inWishlist,
            "avg" => $avg,
        ];
        return view('customer.detail', $binding);
    }

    public function cartPage() {
        $name = 'cart';
        $input = request();
        $cart = $input->session()->get('cart');
        $u_id = $input->user() ? $input->user()->u_id : 0;
        $user = DB::table("users")
            ->join("member", "users.u_id", "=", "member.u_id")
            ->where("member.u_id", "=", $u_id)
            ->first();
        $cartData = [];
        $total = 0;
        if ($cart !== null) {
            foreach($cart as $p_id => $quantity) {
                $product = DB::table("product")->where("p_id", "=", $p_id)->first();
                $tmp = [
                    "p_id" => $product->p_id,
                    "p_name" => $product->p_name,
                    "photo" => $product->photo,
                    "price" => $product->price,
                    "quantity" => $quantity,
                    "inventory" => $product->inventory,
                ];
                array_push($cartData, $tmp);
            }
            $total = count($cartData);
        }
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'user' => $user,
            'cart' => $cartData,
            'total' => $total,
        ];
        return view('customer.cart', $binding);
    }

    public function recordPage() {
        $name = 'record';
        $all_book_classes = DB::table("all_classes")->where("type", "=", "b")->get();
        $all_music_classes = DB::table("all_classes")->where("type", "=", "m")->get();
        $all_classes = [
            "b" => $all_book_classes,
            "m" => $all_music_classes
        ];
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'classes' => $all_classes,
        ];
        return view('customer.record', $binding);
    }

    public function csPage() {
        $name = 'cs';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.cs', $binding);
    }
}
