<?php

namespace App\Http\Controllers\API\Company\reviewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Reviewer\ReviewerProjectRequest;
use App\Models\Project;
use App\Traits\ApiResponse;


class ReviewerProjectController extends Controller
{
    use ApiResponse;

    public function update($projectID,ReviewerProjectRequest $request)  {
        $project=Project::findOrFail($projectID);
        $project->update(['reviewer_id' => $request->reviewer_id]);
        return response()->json(['message'=>'Reviewer Assigned to this Project successfully']);
    }
}
