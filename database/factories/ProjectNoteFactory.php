<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Project;
use App\Models\ProjectNote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectNoteFactory extends Factory
{
    protected $model = ProjectNote::class;

    public function definition(): array
    {
        return [
            'note' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'project_id' => Project::factory(),
        ];
    }
}
