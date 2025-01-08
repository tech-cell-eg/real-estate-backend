<?php

namespace Database\Factories;

use App\Models\ProjectComment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectCommentFactory extends Factory
{
    protected $model = ProjectComment::class;

    public function definition(): array
    {
        return [
            'project_id' => $this->faker->randomNumber(),
            'company_id' => $this->faker->randomNumber(),
            'inspector_id' => $this->faker->randomNumber(),
            'reviewer_id' => $this->faker->randomNumber(),
            'comment' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
