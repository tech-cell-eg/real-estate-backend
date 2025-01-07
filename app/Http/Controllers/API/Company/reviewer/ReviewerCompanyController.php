<?php

namespace App\Http\Controllers\API\Company\reviewer;

use App\Http\Controllers\Controller;
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
        $companyId=auth('api-company')->user()->id;
        $reviewer->update(['company_id' => $companyId]);

        return $this->success(200,'Reviewer Assigned to the company successfully');

    }
}
