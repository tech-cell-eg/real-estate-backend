<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        foreach ($projects as $project) {
            for ($i=0; $i < 5; $i++) { 
                ProjectComment::create([
                    'project_id' => $project->id,
                    'writer_id' => round(rand(1,3)),
                    'writer_type' => fake()->randomElement(['company', 'inspector']),
                    'comment' => fake()->paragraph()
                ]);
            }
        }
    }
}
