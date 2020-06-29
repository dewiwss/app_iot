<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        // \DB::table('devices')->delete();

        \DB::table('devices')->insert(array (
            0 =>
            array (
                'id' => 1,
                'device_numbercode' => '20200980199',
                'device_name' => 'Astra',
                'description' => 'alat pengukur suhu dan kelembapan',
                'user_id' => 1,
                'created_at' => '2020-06-25 10:38:22',
                'updated_at' => '2020-06-25 10:38:22',
            ),
        ));

        factory(App\Device::class,10)->create();



    }
}
