<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ RolesTablesSeeder::class ]);

        $admin = [
            'id' => 1, 
            'user_role_id' => '2', 
            'degree_id' => NULL,
            'name' => 'admin', 
            'surname' => 'admin', 
            'matric_no' => '0',
            'email' => 'admin@gmail.com', 
            'password' => 'admin', 
            'personal_calendar' => FALSE,
            'LAU' => now()
        ];

        DB::table('users')->insert($admin);

        $this->call([ PopulateSeeder::class ]);
    }
}
