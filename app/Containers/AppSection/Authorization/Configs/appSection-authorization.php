<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AppSection Section Authorization Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Admin Data Seeder
    |--------------------------------------------------------------------------
    |
    | This role is used across the app as the main authority e.g. super admin role
    | WARNING: Do not override this directly into the database. 
    |
    | Recommended: Modify the config and Reseeding.
    |
    */

    'admin_role' => env('ADMIN_ROLE', 'admin'),
    'username' => 'admin',
    'email' => 'admin@admin.com',
    'name' => 'Super Admin'
];
