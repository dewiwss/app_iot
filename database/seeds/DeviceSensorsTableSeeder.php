<?php

use Illuminate\Database\Seeder;

class DeviceSensorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('device_sensors')->delete();

        \DB::table('device_sensors')->insert(array (
            0 =>
            array (
                'id' => 1,
                'device_id' => 1,
                'sensor_id' => 1,
                'data_sensor' => '0',
                'created_at' => '2020-06-25 10:38:22',
                'updated_at' => '2020-06-25 10:38:22',
            ),
            1 =>
            array (
                'id' => 2,
                'device_id' => 1,
                'sensor_id' => 2,
                'data_sensor' => '0',
                'created_at' => '2020-06-25 10:38:22',
                'updated_at' => '2020-06-25 10:38:22',
            ),
        ));


    }
}
