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

    public function lookSession() {
        $input = request();
        $data = $input->session()->all();
        return Response::json($data);
    }
}
