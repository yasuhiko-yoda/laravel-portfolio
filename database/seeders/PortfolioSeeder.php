<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portfolios')->insert([
            'title'=>'コーポレートサイト',
            'url' =>'https://yodayasu.net/test/',
            'thumbnail' => 'https://yodayasu.net/test/wp-content/themes/ys_co_ltd/img/thumb01.jpg',
            'description'=> 'ワードプレスで作成したコーポレートサイトです。',
            'category_id' => '1',
            'created_at' => '2021/09/09'

        ]);
    }
}
