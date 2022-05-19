<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module\ShareData;

use DB;
use Auth;

class CustomerController extends Controller {
    public function listPage() {
        $name = 'list';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.list', $binding);
    }

    public function allPage() {
        $name = 'all';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.all', $binding);
    }

    public function profilePage() {
        $name = 'profile';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.profile', $binding);
    }

    public function wishlistPage() {
        $name = 'wishlist';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.wishlist', $binding);
    }

    public function mybookPage() {
        $name = 'mybook';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
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
        $p_type = DB::table("product")
            ->where("p_id", "=", $p_id)
            ->value("p_type");
        $detail = DB::table("product")
            ->where("product.p_id", "=", $p_id)
            ->join($p_type, "product.p_id", "=", "$p_type.p_id")
            ->first();
        $author_or_singer = $p_type=="book" ? "author" : "singer";
        $author_or_singer = DB::table($author_or_singer)
            ->where("p_id", "=", $p_id)
            ->get();
        $classes = DB::table("classes")
            ->where("p_id", "=", $p_id)
            ->join("all_classes", "classes.c_id", "=", "all_classes.c_id")
            ->get();
        $comments = DB::table("rate")
            ->where("rate.p_id", "=", $p_id)
            ->join("users", "users.u_id", "=", "rate.u_id")
            ->orderBy('time', 'desc')
            ->get();
        $inWishlist = DB::table("wishlist")
            ->where("u_id", "=", Auth::user()->u_id)
            ->where("p_id", "=", $p_id)
            ->first();
        $avg = DB::table("rate")
            ->where("p_id", "=", $p_id)
            ->groupBy('p_id')
            ->avg('stars');
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
        $cart = request()->session()->get('cart');
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
                ];
                array_push($cartData, $tmp);
            }
            $total = count($cartData);
        }
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'cart' => $cartData,
            'total' => $total,
        ];
        return view('customer.cart', $binding);
    }
}
