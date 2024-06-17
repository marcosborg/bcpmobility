<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'menu_create',
            ],
            [
                'id'    => 18,
                'title' => 'menu_edit',
            ],
            [
                'id'    => 19,
                'title' => 'menu_show',
            ],
            [
                'id'    => 20,
                'title' => 'menu_delete',
            ],
            [
                'id'    => 21,
                'title' => 'menu_access',
            ],
            [
                'id'    => 22,
                'title' => 'hero_create',
            ],
            [
                'id'    => 23,
                'title' => 'hero_edit',
            ],
            [
                'id'    => 24,
                'title' => 'hero_show',
            ],
            [
                'id'    => 25,
                'title' => 'hero_delete',
            ],
            [
                'id'    => 26,
                'title' => 'hero_access',
            ],
            [
                'id'    => 27,
                'title' => 'brand_create',
            ],
            [
                'id'    => 28,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 29,
                'title' => 'brand_show',
            ],
            [
                'id'    => 30,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 31,
                'title' => 'brand_access',
            ],
            [
                'id'    => 32,
                'title' => 'service_create',
            ],
            [
                'id'    => 33,
                'title' => 'service_edit',
            ],
            [
                'id'    => 34,
                'title' => 'service_show',
            ],
            [
                'id'    => 35,
                'title' => 'service_delete',
            ],
            [
                'id'    => 36,
                'title' => 'service_access',
            ],
            [
                'id'    => 37,
                'title' => 'ctum_create',
            ],
            [
                'id'    => 38,
                'title' => 'ctum_edit',
            ],
            [
                'id'    => 39,
                'title' => 'ctum_show',
            ],
            [
                'id'    => 40,
                'title' => 'ctum_delete',
            ],
            [
                'id'    => 41,
                'title' => 'ctum_access',
            ],
            [
                'id'    => 42,
                'title' => 'option_create',
            ],
            [
                'id'    => 43,
                'title' => 'option_edit',
            ],
            [
                'id'    => 44,
                'title' => 'option_show',
            ],
            [
                'id'    => 45,
                'title' => 'option_delete',
            ],
            [
                'id'    => 46,
                'title' => 'option_access',
            ],
            [
                'id'    => 47,
                'title' => 'contact_create',
            ],
            [
                'id'    => 48,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 49,
                'title' => 'contact_show',
            ],
            [
                'id'    => 50,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 51,
                'title' => 'contact_access',
            ],
            [
                'id'    => 52,
                'title' => 'lang_create',
            ],
            [
                'id'    => 53,
                'title' => 'lang_edit',
            ],
            [
                'id'    => 54,
                'title' => 'lang_show',
            ],
            [
                'id'    => 55,
                'title' => 'lang_delete',
            ],
            [
                'id'    => 56,
                'title' => 'lang_access',
            ],
            [
                'id'    => 57,
                'title' => 'slide_create',
            ],
            [
                'id'    => 58,
                'title' => 'slide_edit',
            ],
            [
                'id'    => 59,
                'title' => 'slide_show',
            ],
            [
                'id'    => 60,
                'title' => 'slide_delete',
            ],
            [
                'id'    => 61,
                'title' => 'slide_access',
            ],
            [
                'id'    => 62,
                'title' => 'website_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
