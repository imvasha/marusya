<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'admin';
        $role_employee->desc = 'A Employee User';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'author';
        $role_manager->desc = 'A Manager User';
        $role_manager->save();
    }
}
