<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id' => Role::AUTHOR, 'name' => 'author', 'guard_name' => 'web']);
        Role::create(['id' => Role::EDITOR, 'name' => 'editor', 'guard_name' => 'web']);
        Role::create(['id' => Role::ADMIN,  'name' => 'admin', 'guard_name' => 'web']);
    }
}
