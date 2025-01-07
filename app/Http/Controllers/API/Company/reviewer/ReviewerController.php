<?php

namespace App\Http\Controllers\API\Company\reviewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthReviewer\RegisterReviewerRequest;
use App\Http\Requests\Company\Inspector\UpdateTeamRequest;
use App\Models\Reviewer;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Support\Facades\Auth;

class ReviewerController extends Controller
{
    use ApiResponse, FileControl;

    public function index()
    {
        $id = auth('api-company')->user()->id;
        $reviewers = Reviewer::with('city')->select('id', 'username', 'city_id')->where('company_id', $id)->get();
        return $this->success(200, "All Reviewers data", $reviewers);
    }

    public function show($id)
    {
        $reviewer = Reviewer::find($id);
        if (!$reviewer) {
            return $this->failed(404, "Reviewer not found");
        }
        return $this->success(200, "Reviewer data", $reviewer);
    }

    public function destroy($id)
    {
        $reviewer = Reviewer::find($id);
        if (!$reviewer) {
            return $this->failed(404, "Reviewer not found");
        }
        $reviewer->company_id = null;
        $reviewer->save();
        return $this->success(200, "Reviewer deleted successfully");
    }
}
