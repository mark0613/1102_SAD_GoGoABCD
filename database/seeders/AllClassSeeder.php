<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AllClasses;

class AllClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement("INSERT INTO all_classes(class, type) VALUES('懸疑', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('冒險', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('校園', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('宗教', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('科幻', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('社會', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('自然', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('科學', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('運動', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('愛情', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('經濟', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('音樂', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('商務', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('政治', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('文學', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('歷史', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('恐怖', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('傳記', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('偵探小說', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('犯罪小說', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('語言', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('娛樂', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('健康', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('語言', 'b')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('華語', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('日語', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('韓語', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('西洋', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('爵士', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('台語', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('兒童', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('古典', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('世界音樂', 'm')");
        DB::statement("INSERT INTO all_classes(class, type) VALUES('宗教', 'm')");

    }
}
