<?php

namespace App\Traits;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Reviewer;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

trait EmailExistTrait
{
    use ApiResponse;

    public array $models = [Company::class, Client::class, Inspector::class, Reviewer::class];
    public Authenticatable|JsonResponse|null $user;
    public string $userType;

    public function userExist($email): JsonResponse|array
    {
        foreach ($this->models as $model) {
            if ($result = $model::where('email', $email)->first()) {
                $this->userType = strtolower(class_basename($model));
                $this->user = $result;
                break;
            }
        }
        if (!$this->user) {
            return $this->failed(422, 'This email is not registered.');
        }
        return [
            'user' => $this->user,
            'userType' => $this->userType
        ];
    }
}