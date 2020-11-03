<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('User')->insert([
            "user_email"=>"ansell@gmail.com",
            "user_password"=>sha1("ansell"),
            "user_nama"=>"ansell",
            "user_notelp"=>"08123456789",
            "user_tipe"=>0,
            "user_photo"=>"default_pict.png"
        ]);


        DB::table('User')->insert([
            "user_email"=>"robby@gmail.com",
            "user_password"=>sha1("robby"),
            "user_nama"=>"robby",
            "user_notelp"=>"08123451123",
            "user_tipe"=>1,
            "user_photo"=>"default_pict.png"
        ]);

        DB::table('Kategori')->insert([
            "kategori_nama"=>"jual"
        ]);
        DB::table('Kategori')->insert([
            "kategori_nama"=>"sewa"
        ]);

        DB::table('Negara')->insert([
            "negara_nama"=>"Singapore"
        ]);
        DB::table('Negara')->insert([
            "negara_nama"=>"Taiwan"
        ]);
        DB::table('Negara')->insert([
            "negara_nama"=>"Hongkong"
        ]);
        DB::table('Negara')->insert([
            "negara_nama"=>"Malaysia"
        ]);


    }
}
