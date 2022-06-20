<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('comments')->insert([
        //     'name' => 'Marc',
        //     'email' => 'marc@gmail.com'
        // ]);
        // DB::table('comments')->insert([
        //     'name' => 'Xavi',
        //     'email' => 'xavi@clicko.es'
        // ]);
        // DB::table('comments')->insert([
        //     'name' => 'Adam',
        //     'email' => 'adam@yahoo.es'
        // ]);
        // DB::table('comments')->insert([
        //     'name' => 'Raisa',
        //     'email' => 'raisa@hotmail.com'
        // ]);
        // DB::table('comments')->insert([
        //     'name' => 'Berta',
        //     'email' => 'berta@outlook.com',
        // ]);

        Comment::factory()->count(10)->create();

    }
}
