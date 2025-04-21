<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


public function run()
{
    $admin = Role::create(['name' => 'Admin']);
    $waiter = Role::create(['name' => 'Waiter']);
    $cashier = Role::create(['name' => 'Cashier']);

    $takeOrder = Permission::create(['name' => 'Take Order']);
    $processPayment = Permission::create(['name' => 'Process Payment']);

    $admin->permissions()->attach([$takeOrder->id, $processPayment->id]);
    $waiter->permissions()->attach([$takeOrder->id]);
    $cashier->permissions()->attach([$processPayment->id]);
}

}
