<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller {
    public static $cart;
    public static function addProduct($p_id, $quantity) {
        self::$cart[$p_id] = $quantity;
    }
    public static function removeProduct($p_id) {
        foreach ($p_id as $index => $id) {
            if (!empty(self::$cart[$id])) {
                unset(self::$cart[$id]);
            }
        }
    }
    public static function updateQuantity($p_id, $quantity) {
        if (!empty(self::$cart[$p_id])) {
            self::$cart[$p_id] = $quantity;
        }
    }
    public static function clear() {
        self::$cart = [];
    }
}
