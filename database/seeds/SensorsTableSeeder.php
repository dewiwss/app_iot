<?php

use Illuminate\Database\Seeder;

class SensorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        // \DB::table('sensors')->delete();

        \DB::table('sensors')->insert(array (
            0 =>
            array (
                'id' => 1,
                'sensor_code' => '123456789',
                'sensor_name' => 'sensor suhu',
                'type' => 'LDR123',
                'description' => 'description',
                'created_at' => '2020-06-25 10:38:22',
                'updated_at' => '2020-06-25 10:38:22',
            ),
            1 =>
            array (
                'id' => 2,
                'sensor_code' => '223456789',
                'sensor_name' => 'sensor kelembapan',
                'type' => 'LDR123',
                'description' => 'description',
                'created_at' => '2020-06-25 10:38:22',
                'updated_at' => '2020-06-25 10:38:22',
            ),
        ));

        factory(App\Sensor::class,15)->create();



    }
}
