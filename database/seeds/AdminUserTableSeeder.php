<?php

use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
           'name' => 'christian',
            'email' => 'christian.85@live.fr',
            'password' => '$2y$10$d/es1e969nDByX7sqKNgKemHStCutilY6yD/BSRoHwDlvMvLfG6Oy', //password
           
        ]);
    }
}
