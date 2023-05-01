<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\ConnectRelationshipsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password'=>bcrypt('admin'),
        // ]);

        Model::unguard();

            $this->call(PermissionsTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(ConnectRelationshipsSeeder::class);
            $this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
