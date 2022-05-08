<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use PdfController;

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
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
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
            "p_e_or_r" => $er_and_type[0]
        ];
        $data = Product::create($product);
        // (book or music) and (author or singer) table
        $p_id = $data->p_id;
        if ($er_and_type[1] == "book") {
            $book = [
                "p_id" => $p_id,
                "isbn" => $input["isbn"],
                "publisher" => $input["publisher"],
            ];
            DB::table("book")->insert($book);
            foreach($author_or_singer as $author) {
                $tmp = [
                    "p_id" => $p_id,
                    "name" => $author,
                ];
                DB::table("author")->insert($tmp);
            }
            $b_or_m = "b";
            if ($product["p_e_or_r"]) {
                PdfController::uploadPdf($file);
            }
        }
        else {
            $music = [
                "p_id" => $p_id,
                "publisher" => $input["publisher"],
            ];
            DB::table("music")->insert($music);
            foreach($author_or_singer as $singer) {
                $tmp = [
                    "p_id" => $p_id,
                    "name" => $singer,
                ];
                DB::table("singer")->insert($tmp);
            }
            $b_or_m = "m";
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
}
