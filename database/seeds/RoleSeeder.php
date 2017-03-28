<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  $admin = new Role();
$admin->name = 'admin';
$admin->display_name = 'User Administrator'; // optional
$admin->description = 'User is allowed to manage and edit other users'; // optional
$admin->save();
$user = User::where('name', '=', 'RABAB HUSSIEN')->first();

// role attach alias
$user->attachRole($admin); // parameter can be an Role object, array, or id
    }
    
}
