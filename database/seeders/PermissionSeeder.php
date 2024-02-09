<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $adminPermissions = [
            Permission::create(['name' => 'banners.*']),
            Permission::create(['name' => 'discounts.admin.*']),
            Permission::create(['name' => 'orders.admin.*']),
            Permission::create(['name' => 'comments.admin.*']),
            Permission::create(['name' => 'restaurant categories.*']),
            Permission::create(['name' => 'food categories.*']),
        ];
        $sellerPermissions = [
            Permission::create(['name' => 'restaurants.*']),
            Permission::create(['name' => 'addresses.*']),
            Permission::create(['name' => 'schedules.*']),
            Permission::create(['name' => 'foods.*']),
            Permission::create(['name' => 'reports.*']),
            Permission::create(['name' => 'orders.seller.*']),
            Permission::create(['name' => 'comments.seller.*']),
            Permission::create(['name' => 'discounts.seller.*'])
        ];

        foreach (RoleEnum::getValues() as $role) {
            $$role = Role::create(['name'=>$role]);
        }

        $admin->givePermissionTo($adminPermissions);
        $seller->givePermissionTo($sellerPermissions);

        $superAdmin = User::factory()->create([
            'name' => 'علی زیبایی',
            'email' => 'alizibaie1380@gmail.com',
            'password' => 123456,
        ]);

        $sampleSeller = User::factory()->create([
            'name'=>'first seller' ,
            'email'=>'alizibaie2001@gmail.com' ,
            'password'=>'Ali1380$50505',
        ]);
        $superAdmin->assignRole($admin);
        $sampleSeller->assignRole($seller);
    }

}
