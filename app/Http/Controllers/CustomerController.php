<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module\ShareData;

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
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('customer.cart', $binding);
    }
}
