<?php

namespace App\Http\Controllers\API\Auth\RegisterReviewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthReviewer\RegisterReviewerRequest;
use App\Models\Reviewer;
use App\Traits\ApiResponse;
use App\Traits\AuthUserTrait;
use App\Traits\FileControl;

class RegisterController extends Controller
{
    use ApiResponse, FileControl, AuthUserTrait;

    /**
     * @throws \Exception
     */
    public function __invoke(RegisterReviewerRequest $request)
    {
        $data = $request->validated();
        $data['certificate'] = $this->uploadFiles($data['certificate'], 'Certifications/Reviewers')[0];
        $reviewer = Reviewer::create($data);
        $token = $reviewer->createToken("reviewer API Token")->plainTextToken;
        return $this->success(200, 'Reviewer created successfully', [
            'token' => $token,
            'reviewer' => $reviewer
        ]);
    }
}
