<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Tag;
use App\Models\Thread;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Tag::factory(6)->create();
        Category::factory(5)
        ->has(
            Thread::factory(10)->hasComments(8)
        )
        ->create();
    // Tags -> Etiquetas
    $tag = Tag::all();

    Thread::all()->each(function ($thread) use ($tag){
        $tag = $tag->random(rand(1,6))->pluck('id')->toArray();

        $thread->tags()->attach($tag);
    });


        //\App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(5)->create();
        // \App\Models\Thread::factory(40)->create();
        //\App\Models\Tag::factory(60)->create();
        // \App\Models\Comment::factory(60)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
