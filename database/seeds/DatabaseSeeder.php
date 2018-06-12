<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $this->call(UsersTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);

        // Model::reguard();
        DB::table('users')->insert([
            [
                'name' =>'admin',
                'email' =>'admin@gmail.com',
                'password'=>Hash::make('slux12356'),
                'role'=>1
            ]
            ]
        );
        DB::table('categories')->insert([
            [
                'url'=>'danh-muc-an',
                'name'=>'danh mục ẩn',
                'title'=>'danh mục ẩn',
                'seo_keyword'=>'danh mục ẩn',
                'seo_description'=>'danh mục ẩn'
            ],
            [
                'url'=>'sua-chua-nokia-8800',
                'name'=>'sửa chữa 8800',
                'title'=>'Sửa chữa nokia 8800',
                'seo_keyword'=>'Sửa chữa nokia 8800',
                'seo_description'=>'Sửa chữa nokia 8800'
            ],
            [
                'url'=>'sua-chua-vertu',
                'name'=>'sửa chữa vertu',
                'title'=>'sửa chữa vertu',
                'seo_keyword'=>'sửa chữa vertu',
                'seo_description'=>'sửa chữa vertu'
            ],
            [
                'url'=>'tin-tuc',
                'name'=>'Tin tức',
                'title'=>'Tin tức',
                'seo_keyword'=>'Tin tức',
                'seo_description'=>'tin tức'
            ],
            [
                'url'=>'lien-he',
                'name'=>'Liên hệ',
                'title'=>'liên hệ',
                'seo_keyword'=>'liên hệ',
                'seo_description'=>'liên hệ'
            ]
            
        ]);
        DB::table('images')->insert([
            [
                'url'=>'null.png',
                'name'=>'null.png',
                'alt'=>'null.png'
                
            ]
        ]);
        DB::table('slides_header')->insert([

            [
                'image'=>'null.png',
                'blog_url'=>'http://localhost/tin-tuc',
                'title'=>'slide1'
            ],
            [
                'image'=>'null.png',
                'blog_url'=>'http://localhost/tin-tuc',
                'title'=>'slide2'
            ],
            [
                'image'=>'null.png',
                'blog_url'=>'http://localhost/tin-tuc',
                'title'=>'slide3'
            ]

        ]);
    }
}
