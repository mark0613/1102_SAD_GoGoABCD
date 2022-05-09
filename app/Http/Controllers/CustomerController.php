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
}
