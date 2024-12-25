<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class seederuserapi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Reset cached roles and permissions
    app()[\Spatie\PermissionRegistrar::class]->forgetCachedPermissions();

    // Create permissions
    $permissions = [
        'Lihat Task',
        'Buat Task',
        'Ubah Task',
        'Hapus Task',
    ];

    foreach ($permissions as $permissions){
        Permission::create(['name'=>$permissions]);
    }
    
    $role1 = Role::create(['name'=>'superadmin']);
    $role1 -> givePermissionTo(Permission::all);
    
    $role2 = Role::create(['name'=> 'user']);
    $role2 = Role::create(['Lihat Task']);
    
    $superman = User::create([
        "name" => "superman",
        "email" => "superman@gmail.com",
        "password" => "superman123"
    ]);
    $superman->assignRole($role1);

    $orang_biasa = User::create([
        "name" => "orang",
        "email" => "orang@gmail.com",
        "password" => "orang123"
    ]);
    $orang_biasa->assignRole($role2);
        
    }
}