<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'admin-enter',

            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',

            'home-list',
            'home-create',
            'home-edit',
            'home-delete',

            'news-list',
            'news-create',
            'news-edit',
            'news-delete',

            'product_category-list',
            'product_category-create',
            'product_category-edit',
            'product_category-delete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'size-list',
            'size-create',
            'size-edit',
            'size-delete',

            'sport_category-list',
            'sport_category-create',
            'sport_category-edit',
            'sport_category-delete',

            'team-list',
            'team-create',
            'team-edit',
            'team-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'simple-user',
         ];

         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
