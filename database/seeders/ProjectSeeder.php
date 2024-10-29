<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            Project::create([
                'title' => fake()->sentence(),
                'description'=> fake()->sentence(),
                'src'=> fake()->url(),
                'visible'=> fake()->boolean(70),
            ]);
        }
    }
}
