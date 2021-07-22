<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class list_acceses extends Seeder
{
   
    private $roles= [
        [
         'code' => '1',
         'name' => 'Dashboard',
         'parent_id' => 0,
         'is_menu' => true,
        ],
        [
         'code' => '2',
         'name' => 'Karyawan',
         'parent_id' => 0,
         'is_menu' => true,
        ],
        [
         'code' => '3',
         'name' => 'Jabatan',
         'parent_id' => 0,
         'is_menu' => true,
        ],
    ];
    public function run()
    {
        DB::table('list_acceses')->delete();
        DB::table('list_acceses')->insert($this->roles);
        
    }
}
