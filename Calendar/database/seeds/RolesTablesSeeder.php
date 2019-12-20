<?php

use Illuminate\Database\Seeder;

class RolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [            
            ['id' => 1, 'name' => 'Studente'],
            ['id' => 2, 'name' => 'Amministratore'],
        ];
    
        foreach ($user_roles as $item) {
            DB::table('user_roles')->insert($item);
        }        

        $Professor_roles = [            
            ['id' => 1, 'name' => 'Professore ordinario'],
            ['id' => 2, 'name' => 'Professore associato'],
            ['id' => 3, 'name' => 'Riceratore'],
            ['id' => 4, 'name' => 'Assistente'],
        ];
    
        foreach ($Professor_roles as $item) {
            DB::table('professor_roles')->insert($item);
        }

        $Buindings = [            
            ['id' => 1, 'name' => 'Coppito 0', 'address' => 'Via San Francesco 160'],
            ['id' => 2, 'name' => 'Coppito 1', 'address' => 'Via San Francesco 160'],
            ['id' => 3, 'name' => 'Coppito 2', 'address' => 'Via San Francesco 160'],
            ['id' => 4, 'name' => 'Roio', 'address' => 'Via San Benedetto 100'],
        ];
    
        foreach ($Buindings as $item) {
            DB::table('buildings')->insert($item);
        }

        $Departments = [            
            ['id' => 1, 'name' => 'DISIM'],
            ['id' => 2, 'name' => 'DISCAB'],
            ['id' => 3, 'name' => 'MESVA'],
            ['id' => 4, 'name' => 'DSU'],
            ['id' => 5, 'name' => 'DSFC'],
            ['id' => 6, 'name' => 'DIIIE'],
            ['id' => 7, 'name' => 'DICEAA'],
        ];
    
        foreach ($Departments as $item) {
            DB::table('departments')->insert($item);
        }
    }
}
