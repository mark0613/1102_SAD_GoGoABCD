<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Module\ShareData;

class ReaderController extends Controller {
    public function readerPage($bookName) {
        $input = request();
        $p_name = DB::table("product")->where("path", "=", $bookName)->value("p_name");
        $page = $input->page;
        $name = 'reader';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
            "p_name" => $p_name,
            'path' => "storage/books/$bookName/$page.jpg",
        ];
        return view('reader', $binding);
    } 
}
