<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            array(
              'rol' => 'admin',
            ),
            array(
              'rol' => 'user',
            ),
          ));
    }
}
