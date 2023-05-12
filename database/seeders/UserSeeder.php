<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Ilham Ibnu Ahmad',
                'image' => '1683859134.jpg',
                'tag' => 'Web Developer',
                'desc' => 'Saya merupakan mahasiswa aktif Politeknik Negeri Jember yang senang pembelajaran dan pengembangan teknologi. Saya juga memiliki ketertarikan pada bidang web development dan mobile development. Saya juga memiliki ketertarikan pada bidang web development dan mobile development.',
                'phone' => '085156156156',
                'address' => 'Jl. Raya Cikarang - Cibarusah No. 1',
                'password' => bcrypt('12345678'),
                'email' => 'ilhamibnuahmad@gmail.com',
            ],
        );
    }
}
