<?php

namespace App\Http\Controllers;

use DB;

use App\Http\Controllers\Controller;
use App\Module\ShareData;

class HomeController extends Controller {
    public function indexPage() {
        $name = 'home';
        $ad = DB::table("ad")->get();
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'ads' => $ad,
        ];
        return view('home', $binding);
    }
}

?>
