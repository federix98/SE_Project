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

        $Degree_groups = [            
            ['id' => 1, 'name' => 'Informatica', 'department_id' => '1'],
            ['id' => 2, 'name' => 'Ingegneria dell\'informazione', 'department_id' => '1'],
            ['id' => 3, 'name' => 'Magistrali informatica', 'department_id' => '1'],
            ['id' => 4, 'name' => 'Biotecnologie', 'department_id' => '2'],
            ['id' => 5, 'name' => 'Fisioterapia', 'department_id' => '2'],
            ['id' => 6, 'name' => 'Scienze motorie e sportive', 'department_id' => '2'],
            ['id' => 7, 'name' => 'Medicina', 'department_id' => '3'],
            ['id' => 8, 'name' => 'Infermeriestica', 'department_id' => '3'],
            ['id' => 9, 'name' => 'Ostetricia', 'department_id' => '3'],
            ['id' => 10, 'name' => 'Lettere', 'department_id' => '4'],
            ['id' => 11, 'name' => 'Filosofia', 'department_id' => '4'],
            ['id' => 12, 'name' => 'Beni Culturali', 'department_id' => '4'],
            ['id' => 13, 'name' => 'Fisica', 'department_id' => '5'],
            ['id' => 14, 'name' => 'Chimica', 'department_id' => '5'],
            ['id' => 15, 'name' => 'Magistrale Fisica', 'department_id' => '5'],
            ['id' => 16, 'name' => 'Ingegneria industriale', 'department_id' => '6'],
            ['id' => 17, 'name' => 'Economia', 'department_id' => '6'],
            ['id' => 18, 'name' => 'Ingegneria civile e ambientale', 'department_id' => '7'],
            ['id' => 19, 'name' => 'Ingegneria edile e architettura', 'department_id' => '7'],
        ];
    
        foreach ($Degree_groups as $item) {
            DB::table('degree_groups')->insert($item);
        }

    }
}
