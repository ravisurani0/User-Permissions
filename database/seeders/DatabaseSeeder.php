<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\PermissionTable;
use App\Models\Products;
use App\Models\Role;
use App\Models\roleHasPermissions;
use App\Models\Stores;
use App\Models\User;
use App\Models\userHasPermission;
use App\Models\UserHasRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@mail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password')
        // ]);

        User::insert([[
            'name' => 'Admin',
            'last_name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ], [
            'name' => 'Admin2',
            'last_name' => 'admin2',
            'email' => 'admin2@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ], [
            'name' => 'Manager',
            'last_name' => 'manager',
            'email' => 'manager@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ], [
            'name' => 'Sellman',
            'last_name' => 'Sellman',
            'email' => 'sellman@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]]);

        Products::factory(30)->create();
        Stores::factory(30)->create();
        Employee::factory(30)->create();
        // User::factory(10)->create();

        PermissionTable::insert(
            [
                [
                    "name" => "Products",
                    "key" => "products",
                ],
                [
                    "name" => "Stores",
                    "key" => "stores",
                ],
                [
                    "name" => "User",
                    "key" => "user",
                ],
                [
                    "name" => "Employee",
                    "key" => "employee",
                ],
                [
                    "name" => "Permission Table",
                    "key" => "permission-table",
                ],
                [
                    "name" => "User Permeations",
                    "key" => "user-permeations",
                ], [
                    "name" => "Role Permeations",
                    "key" => "role-permeations",
                ],
            ]
        );
        Role::insert(
            [
                [
                    "name" => "Admin",
                    "key" => "admin",
                ],
                [
                    "name" => "User",
                    "key" => "user",
                ],
                [
                    "name" => "Manager",
                    "key" => "manager",
                ],
                [
                    "name" => "Sellman",
                    "key" => "sellman",
                ],
            ]
        );

        roleHasPermissions::insert(
            [
                [
                    "role_id" => 1,
                    "permission_table_id" => 1,
                    "permission_key" => "products",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 1,
                    "permission_table_id" => 2,
                    "permission_key" => "stores",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 1,
                    "permission_table_id" => 3,
                    "permission_key" => "user",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 1,
                    "permission_table_id" => 4,
                    "permission_key" => "employee",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 1,
                    "permission_table_id" => 5,
                    "permission_key" => "permission-table",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 1,
                    "permission_table_id" => 6,
                    "permission_key" => "user-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 1,
                    "permission_table_id" => 6,
                    "permission_key" => "role-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => true,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 1,
                    "permission_key" => "products",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 2,
                    "permission_key" => "stores",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 3,
                    "permission_key" => "user",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 4,
                    "permission_key" => "employee",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 5,
                    "permission_key" => "permission-table",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 6,
                    "permission_key" => "user-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 2,
                    "permission_table_id" => 6,
                    "permission_key" => "role-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => true,
                    "create" => true,
                    "update" => true,
                    "edit" => true,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 1,
                    "permission_key" => "products",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 2,
                    "permission_key" => "stores",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 3,
                    "permission_key" => "user",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 4,
                    "permission_key" => "employee",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 5,
                    "permission_key" => "permission-table",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 6,
                    "permission_key" => "user-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 3,
                    "permission_table_id" => 6,
                    "permission_key" => "role-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 1,
                    "permission_key" => "products",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 2,
                    "permission_key" => "stores",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 3,
                    "permission_key" => "user",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 4,
                    "permission_key" => "employee",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 5,
                    "permission_key" => "permission-table",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 6,
                    "permission_key" => "user-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
                [
                    "role_id" => 4,
                    "permission_table_id" => 6,
                    "permission_key" => "role-permeations",
                    "index" => true,
                    "show" => true,
                    "store" => false,
                    "create" => false,
                    "update" => false,
                    "edit" => false,
                    "destroy" => false,
                ],
            ]
        );

        UserHasRole::insert([[
            "role_id" => "1",
            "user_id" => "1",
        ], [
            "role_id" => "2",
            "user_id" => "2",
        ], [
            "role_id" => "3",
            "user_id" => "3",
        ], [
            "role_id" => "4",
            "user_id" => "4",
        ]]);
    }
}
