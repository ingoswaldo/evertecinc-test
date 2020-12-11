<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->deleteUsers();
        $this->insertUsers();
    }

    private function deleteUsers()
    {
        Role::query()->delete();
        User::query()->delete();
    }

    private function insertUsers()
    {
        $role = Role::query()->create([
            'name' => 'superadmin',
            'slug' => 'super',
        ]);

        $user = User::query()->create([
            'name'              => 'Super',
            'email'             => 'super@super.com',
            'password'          => bcrypt('password'),
            'phone'             => '1234567890',
            'state_id'          => 2,
            'city'              => 'Medellin',
            'address'           => 'address',
            'email_verified_at' => now()
        ]);

        $user->attachRole($role);
    }
}
