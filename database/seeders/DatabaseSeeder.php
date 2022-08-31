<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->users());
    }

    private function users()
    {
        return [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt(123),
                'created_at' => now()
            ]
        ];
    }
}
