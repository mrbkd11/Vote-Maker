<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::factory(10)->create();
       // \App\Models\Admin::factory(1)->create();
      //  \App\Models\Vote::factory(1)->create();
    //    \App\Models\Result::factory(1)->create();

        $user = \App\Models\User::factory()->create([
          'name' => 'Test User2',
             'email' => 'test2@example.com',
     ]);
//      $admin = \App\Models\Admin::factory()->create([
//           'name' => 'Test User1',
//              'email' => 'test1@example.com',
//             ]);
//        $vote = \App\Models\Vote::factory()->create([
// 'admin_id' => $admin->id 
//  ]); \App\Models\Result::factory()->create([
// 'vote_id' => $vote->id ,
// 'user_id' => $user->id
//  ]);
 
}}
    

