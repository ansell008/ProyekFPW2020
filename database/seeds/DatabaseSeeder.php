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
            "user_email" => "ansell@gmail.com",
            "user_password" => sha1("ansell"),
            "user_nama" => "ansell",
            "user_notelp" => "08123456789",
            "user_tipe" => 0,
            "user_photo" => "default_pict.png"
        ]);


        DB::table('User')->insert([
            "user_email" => "robby@gmail.com",
            "user_password" => sha1("robby"),
            "user_nama" => "robby",
            "user_notelp" => "08123451123",
            "user_tipe" => 1,
            "user_photo" => "default_pict.png"
        ]);

        DB::table('Kategori')->insert([
            "kategori_nama" => "Jual"
        ]);
        DB::table('Kategori')->insert([
            "kategori_nama" => "Sewa"
        ]);

        DB::table('Negara')->insert([
            "negara_nama" => "Singapore"
        ]);
        DB::table('Negara')->insert([
            "negara_nama" => "Taiwan"
        ]);
        DB::table('Negara')->insert([
            "negara_nama" => "Hongkong"
        ]);
        DB::table('Negara')->insert([
            "negara_nama" => "Malaysia"
        ]);
        DB::table('Negara')->insert([
            "negara_nama" => "Indonesia"
        ]);


        DB::table('Tipe_apartment')->insert([
            "tipe_apartment_nama" => "Studio",
            "tipe_apartment_deskripsi" => "Apartemen Studio adalah apartemen yang hanya terdiri satu ruangan saja yang mencakup semua fungsi mulai dari tempat tidur,
            dapur, area belajar, lemari, dan sebagainya dengan tambahan sebuah kamar mandi.
            Umumnya luas dari jenis apartemen ini tidak lebih dari 30 m2."
        ]);

        DB::table('Tipe_apartment')->insert([
            "tipe_apartment_nama" => "Alcove",
            "tipe_apartment_deskripsi" => "Hampir sama seperti Studio, yang membedakannya adalah Apartemen Alcove memiliki ukuran yang sedikit lebih besar dengan denah berbentuk membelok seperti huruf L
            dimana area tempat tidur berada dibagian belokan sehingga sedikit terpisah dari fungsi ruang lainnya."
        ]);
        DB::table('Tipe_apartment')->insert([
            "tipe_apartment_nama" => "Convertible",
            "tipe_apartment_deskripsi" => "Apartemen Covertible juga merupakan apartemen yang cocok untuk kamu yang tinggal sendirian atau hanya berdua saja
            karena hanya terdiri dari satu ruangan saja seperti apartemen studio.
            Bedanya, tipe apartemen satu ini memiliki ukuran lebih luas sehingga kamu bisa menambahkan partisi-partisi untuk memisahkan area-area tertentu."
        ]);
        DB::table('Tipe_apartment')->insert([
            "tipe_apartment_nama" => "Junior 1 Bedroom",
            "tipe_apartment_deskripsi" => "Apartemen ini memiliki satu kamar tidur yang terpisah dari ruang utama lain yang mengakomodir fungsi2 lain seperti
            area ruang keluarga serta dapur dan ruang makan."
        ]);
        DB::table('Tipe_apartment')->insert([
            "tipe_apartment_nama" => "Junior 2 Bedroom",
            "tipe_apartment_deskripsi" => "Apartemen 2 Bedroom menawarkan unit apartemen dengan dua buah kamar tidur.
            Umumnya kamar tidur terdiri dari sebuah kamar tidur utama dan satu kamar tidur anak dengan ukuran yang lebih kecil."
        ]);

        DB::table('Kota')->insert([
            "negara_id" => 1,
            "kota_nama" => "Marina Bay"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 1,
            "kota_nama" => "Newton & Novena"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 1,
            "kota_nama" => "Redhill & Alexandra"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 1,
            "kota_nama" => "Marine Parade"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 5,
            "kota_nama" => "Surabaya"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 5,
            "kota_nama" => "Jakarta"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 5,
            "kota_nama" => "Bandung"
        ]);
        DB::table('Kota')->insert([
            "negara_id" => 5,
            "kota_nama" => "Tangerang"
        ]);
    }
}
