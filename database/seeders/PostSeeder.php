<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Post::create(
            [
                'judul' => 'Judul Pertama',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-pertama',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Kedua',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-kedua',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Ketiga',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-ketiga',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Keempat',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-keempat',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Kelima',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-kelima',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Keenam',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-keenam',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Ketujuh',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-ketujuh',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Kedelapan',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-kedelapan',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Kesembilan',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-kesembilan',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );

        Post::create(
            [
                'judul' => 'Judul Kesepuluh',
                'image' => 'https://avatars.githubusercontent.com/u/55313981?v=4',
                'sub' => 'judul-kesepuluh',
                'desc' => 'Lorem',
                'id_user' => '1',

            ],
        );
    }
}
