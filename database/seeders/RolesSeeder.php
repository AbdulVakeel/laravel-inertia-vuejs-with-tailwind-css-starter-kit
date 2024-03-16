<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $roles = [
            'super_admin', 
            'staff', 
            'manager', 
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        DB::table('model_has_roles')->insert([
            'role_id' => 1, 
            'model_type' => 'App\Models\User', 
            'model_id' => 1, 
        ]);

    }
}
