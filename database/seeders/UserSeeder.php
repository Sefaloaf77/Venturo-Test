<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Superadmin
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'jabatan' => 'superadmin',
            'role' => 'superadmin',
            'password' => bcrypt('superadmin'),
        ]);

        // Admin
        User::create([
            'name' => 'Sukiman',
            'email' => 'sukiman@gmail.com',
            'jabatan' => 'Front Office',
            'role' => 'admin',
            'password' => bcrypt('sukiman'),
        ]);
        User::create([
            'name' => 'Aprilia Lailatul',
            'email' => 'aprilia@gmail.com',
            'jabatan' => 'Academic Service',
            'role' => 'admin',
            'password' => bcrypt('aprilia'),
        ]);
        User::create([
            'name' => 'Amalia Adhitya',
            'email' => 'amalia@gmail.com',
            'jabatan' => 'Student Service',
            'role' => 'admin',
            'password' => bcrypt('amalia'),
        ]);
        User::create([
            'name' => 'Raddhin Karima',
            'email' => 'raddhin@gmail.com',
            'jabatan' => 'Financial Service',
            'role' => 'admin',
            'password' => bcrypt('raddhin'),
        ]);
        User::create([
            'name' => 'Sultoni Arif',
            'email' => 'sultoni@gmail.com',
            'jabatan' => 'Student Service',
            'role' => 'admin',
            'password' => bcrypt('sultoni'),
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Kevin',
            'email' => 'Kevin@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('kevin'),
        ]);
        User::create([
            'name' => 'Ava',
            'email' => 'Ava@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('ava123'),
        ]);
        User::create([
            'name' => 'Rizma',
            'email' => 'Rizma@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('rizma'),
        ]);
        User::create([
            'name' => 'Aurel',
            'email' => 'Aurel@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('aurel'),
        ]);
        User::create([
            'name' => 'salsa',
            'email' => 'Salsa@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('salsa'),
        ]);
        User::create([
            'name' => 'Ammar',
            'email' => 'Ammar@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('sultoni'),
        ]);
        User::create([
            'name' => 'Tiara',
            'email' => 'Tiara@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('tiara'),
        ]);
        User::create([
            'name' => 'Kesya',
            'email' => 'Kesya@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('kesya'),
        ]);
        User::create([
            'name' => 'Faza',
            'email' => 'Faza@gmail.com',
            'jabatan' => null,
            'role' => 'mahasiswa',
            'password' => bcrypt('faza123'),
        ]);
    }
}
