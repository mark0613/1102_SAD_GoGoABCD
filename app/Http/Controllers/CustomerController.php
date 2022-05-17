<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module\ShareData;

use DB;

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

    public function detailPage() {
        $name = 'detail';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
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
