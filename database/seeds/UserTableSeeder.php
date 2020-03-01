<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager  = Role::where('name', 'manager')->first();

        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'admin@admin.com';
        $employee->role_id = 1;
        $employee->password = bcrypt('adminadmin');
        $employee->save();

        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->email = 'manager@example.com';
        $manager->role_id = 2;
        $manager->password = bcrypt('secret');
        $manager->save();
    }
}
