<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('foyer_responsables')->count() == 0) {


            DB::table('foyer_responsables')->insert([
                ['id' => 1,'is_active'=>1, "name" => 'Foyer Seddik','gouver'=>"Sousse",'address' =>"Av. Habib Bourguiba",'name_res' =>"Med Salah",'tel' =>"55444333",'fax' =>"77321589", 'capacity' =>"100" , 'email'=> "foyer@foyer.com",   "password" => Hash::make("password")]
            ]);

            DB::table('foyer_responsables')->insert([
                ['id' => 2,'is_active'=>1, "name" => 'Foyer Mlika','gouver'=>"Sousse",'address' =>"Hammam Sousse",'name_res' =>"Zouhaier",'tel' =>"55666777",'fax' =>"77321321", 'capacity' =>"100" , 'email'=> "mlika@foyer.com",   "password" => Hash::make("password")]
            ]);

            DB::table('foyer_responsables')->insert([
                ['id' => 3,'is_active'=>1, "name" => 'Universitaire Sahloul','gouver'=>"Sousse",'address' =>"Sahloul",'name_res' =>"Mohsen",'tel' =>"55222999",'fax' =>"77521654", 'capacity' =>"100" , 'email'=> "sahloul@foyer.com",   "password" => Hash::make("password")]
            ]);
        }
        if (DB::table('rooms')->count() == 0) {

            DB::table('rooms')->insert([
                ['id' => 1, 'is_published'=>1, 'foyer_id' => 1, "name" => 'A11', 'description' => "description", "type" => "Individual", "tv" => "0", "wc" => "1", "wifi" => "1", "kitchenette" => "1", "price" => "300"]
            ]);

            DB::table('rooms')->insert([
                ['id' => 2, 'is_published'=>1, 'foyer_id' => 2, "name" => 'E12', 'description' => "description", "type" => "Double", "tv" => "0", "wc" => "1", "wifi" => "1", "kitchenette" => "1", "price" => "300"]
            ]);
        }
        if (DB::table('users')->count() == 0) {

            DB::table('users')->insert([
                ['id' => 1, "name" => 'Med Jaziri', 'email' => "user@user.com",'name_establishment' => "Institut Supérieure d'Informatique et de Technologies de Communication Hammam Sousse",'class' => "2LAT", "cin" => "06976132" ,"password" => Hash::make("password")]
            ]);

            DB::table('users')->insert([
                ['id' => 2, "name" => 'Nesrine Soussi', 'email' => "nesrine.soussi.isitc@gmail.com",'name_establishment' => "Institut Supérieure d'Informatique et de Technologies de Communication Hammam Sousse",'class' => "1MPSWM", "cin" => "06976367" ,"password" => Hash::make("password")]
            ]);

        }
        if (DB::table('office_responsables')->count() == 0) {

            DB::table('office_responsables')->insert([
                ['id' => 1, "name" => 'Admin', 'email' => "admin@admin.com", "password" => Hash::make("password")]
            ]);
        }
        if (DB::table('students_foyer')->count() == 0) {

            DB::table('students_foyer')->insert([
                ['id' => 1, 'user_id' => 1, 'foyer_id' => 1, ]
            ]);
        }

    }
}
