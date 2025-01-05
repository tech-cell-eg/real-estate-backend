<?php

namespace App\Http\Controllers\Company\reviewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Reviewer\ReviewerProjectRequest;
use App\Models\Reviewer;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewerCompanyController extends Controller
{
    use ApiResponse;
    public function update(Request $request)  {
        $reviewerId = $request->query('reviewer_id');
        $reviewer = Reviewer::findOrFail($reviewerId);
        $companyId=Auth::user()->id; 
        $reviewer->update(['company_id' => $companyId]);

        return $this->success(200,'Reviewer Assigned to the company successfully');

    }
}
