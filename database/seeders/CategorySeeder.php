<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // DB::table('categories')->insert([
        //     'name'=>'Webサイト',
        // ]);

        // DB::table('categories')->insert([
        //     'name'=>'Webアプリケーション',
        // ]);

        // DB::table('categories')->insert([
        //     'name'=>'ヘッドレスCMS',
        // ]);

        $rows = [
            ['name' => 'Webサイト'],
            ['name' => 'Webアプリケーション'],
            ['name' => 'ヘッドレスCMS'],
        ];

        DB::table('categories')->upsert(
            $rows,
            ['name'],   // これをキーに重複判定
            []          // 更新する列（無ければ空でOK）
        );

    }
}
