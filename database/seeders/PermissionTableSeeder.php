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

            // << sport-complexes
            'sport_complex-list',
            'sport_complex-create',
            'sport_complex-edit',
            'sport_complex-delete',

            'location-list',
            'location-create',
            'location-edit',
            'location-delete',

            'area-list',
            'area-create',
            'area-edit',
            'area-delete',

            'country-list',
            'country-create',
            'country-edit',
            'country-delete',

            'region-list',
            'region-create',
            'region-edit',
            'region-delete',
            // >>end-sport-complexes

            'team-list',
            'team-create',
            'team-edit',
            'team-delete',

            // << ticket
            'ticket-list',
            'ticket-create',
            'ticket-edit',
            'ticket-delete',

            'stadium-list',
            'stadium-create',
            'stadium-edit',
            'stadium-delete',

            'section-list',
            'section-create',
            'section-edit',
            'section-delete',

            // end-ticket  >>

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
