<?php

namespace App\Http\Controllers;

use DB;

use App\Http\Controllers\Controller;
use App\Module\ShareData;

class HomeController extends Controller {
    public function indexPage() {
        $input = request();
        $name = 'home';
        $ad = DB::table("ad")->get();
        $randomBooks_12 = [];
        $randomProducts_12 = DB::table("product")
            ->inRandomOrder()
            ->limit(12)
            ->get();
        $u_id = $input->user() ? $input->user()->u_id : 0;
        foreach($randomProducts_12 as $product) {
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
            $randomBooks_12[$p_id] = [
                "detail" => $product,
                'as' => $author_or_singer,
                "stars" => round($stars),
                "inWishlist" => $inWishlist ? True : False,
            ];
        }
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'products' => $randomBooks_12,
            'ads' => $ad,
        ];
        return view('home', $binding);
    }
}

?>
