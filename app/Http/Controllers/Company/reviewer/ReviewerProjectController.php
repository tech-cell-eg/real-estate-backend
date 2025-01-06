<?php

namespace App\Http\Controllers\Company\reviewer;

use App\Http\Controllers\Controller;

use App\Http\Requests\Company\Reviewer\ReviewerProjectRequest;
use App\Models\Order;
use App\Traits\ApiResponse;



class ReviewerProjectController extends Controller
{
    use ApiResponse;

    public function update($projectID,ReviewerProjectRequest $request)  {
        $project=Order::findOrFail($projectID);
        $project->update($request->validated());
        return response()->json(['message'=>'Reviewer Assigned to this Project successfully']);
    }
}
