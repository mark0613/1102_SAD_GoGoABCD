<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserAuthController;

use App\Module\ShareData;

use App\Models\Author;
use App\Models\Book;
use App\Models\Classes;
use App\Models\Music;
use App\Models\Product;
use App\Models\Singer;


class AdminController extends Controller {
    public function productPage() {
        $name = 'product';
        $all_book_classes = DB::table("all_classes")->where("type", "=", "b")->get();
        $all_music_classes = DB::table("all_classes")->where("type", "=", "m")->get();
        $all_classes = [
            "b" => $all_book_classes,
            "m" => $all_music_classes
        ];
        $product = DB::table("product")->select("p_id", "p_name", "price", "inventory")->get();
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'classes' => $all_classes,
            'product' => $product,
        ];
        return view('merchant.product', $binding);
    }
    public function productProcess() {
        $input = request();
        $photoPath = $input->file('photo')->store('product', 'public');
        $file = $input->file('file');
        $er_and_type = explode("-", $input["p_type"]);
        $author_or_singer = explode(", ", $input["author_or_singer"]);
        $classes = $input["classes"];
        // product table
        $product = [
            "p_name" => $input["name"],
            "description" => $input["description"],
            "photo" => $photoPath,
            "price" => $input["price"],
            "inventory" => $input["inventory"],
            "p_type" => $er_and_type[1],
            "p_e_or_r" => $er_and_type[0],
            "isbn" => $input["isbn"],
            "publisher" => $input["publisher"],
        ];
        $data = Product::create($product);
        // (book or music) and (author or singer) table
        $p_id = $data->p_id;
        if ($er_and_type[1] == "book") {
            foreach($author_or_singer as $author) {
                $tmp = [
                    "p_id" => $p_id,
                    "name" => $author,
                ];
                DB::table("author")->insert($tmp);
            }
            if ($product["p_e_or_r"] == 'e') {
                $path = PdfController::uploadPdf($file);
                $path = explode("/", $path)[1];
                $path = explode(".", $path)[0];
                DB::table('product')->where("p_id", "=", $p_id)->update(["path" => $path]);
            }
        }
        else {
            foreach($author_or_singer as $singer) {
                $tmp = [
                    "p_id" => $p_id,
                    "name" => $singer,
                ];
                DB::table("singer")->insert($tmp);
            }
            if ($product["p_e_or_r"] == 'e') {
                $file->store('product', 'public');
            }
        }
        // classes table
        foreach($classes as $c_id) {
            $tmp = [
                "p_id" => $p_id,
                "c_id" => $c_id,
            ];
            DB::table("classes")->insert($tmp);
        }
        return Redirect::to("/admin/product");
        exit;
    }

    public function recordPage() {
        $name = 'record';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('merchant.record', $binding);
    }

    public function discountPage() {
        $name = 'discount';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('merchant.discount', $binding);
    }

    public function adPage() {
        $name = 'ad';
        $ad = DB::table("ad")->get();
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'ads' => $ad,
        ];
        return view('merchant.ad', $binding);
    }
    public function adProcess() {
        $input = request();
        $adPath = $input->file('ad')->store('ad', 'public');
        $timezone = date_default_timezone_get();
        date_default_timezone_set('Asia/Taipei');
        $nowTime = date('Y-m-d H:i:s');
        $ad = [
            "image" => $adPath,
            "time" => $nowTime,
        ];
        DB::table("ad")->insert($ad);
        return Redirect::to("/admin/ad");
    }

    public function chartPage() {
        $name = 'chart';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('merchant.chart', $binding);
    }

    public function staffPage() {
        $name = 'staff';
        $staff = DB::table("merchant")
            ->join("users", "users.u_id", "=", "merchant.u_id")
            ->select("email", "username", "m_type")
            ->get();
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            'staff' => $staff,
        ];
        return view('merchant.staff', $binding);
    }
    public function staffProcess() {
        $input = request();
        return UserAuthController::registerMerchantProcess($input);
    }

}
