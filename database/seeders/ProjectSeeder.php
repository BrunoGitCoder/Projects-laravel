<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(3)->create();

        foreach (User::all() as $user) {
            Project::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
