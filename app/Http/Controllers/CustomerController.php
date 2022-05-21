<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Module\ShareData;

use DB;
use Auth;

use App\Models\Product;
use App\Models\Rate;

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
        $winshlist = DB::table("wishlist")
            ->join("product", "wishlist.p_id", "=", "product.p_id")
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
            $a = DB::table("rate")
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
            ->first();
        $author_or_singer = $p_type=="book" ? "author" : "singer";
        $author_or_singer = DB::table($author_or_singer)
            ->where("p_id", "=", $p_id)
            ->get();
        $classes = DB::table("classes")
            ->where("p_id", "=", $p_id)
            ->join("all_classes", "classes.c_id", "=", "all_classes.c_id")
            ->get();

        $comments = Product::find($p_id)
            ->comments
            ->sortByDesc('time');
        if (Auth::user()) {
            $inWishlist = DB::table("wishlist")
                ->where("u_id", "=", Auth::user()->u_id)
                ->where("p_id", "=", $p_id)
                ->first();
        }
        else {
            $inWishlist = null;
        }

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
