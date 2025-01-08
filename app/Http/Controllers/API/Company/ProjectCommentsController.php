<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreProjectCommentsRequest;
use App\Models\ProjectComment;
use App\Traits\ApiResponse;

class ProjectCommentsController extends Controller
{
    use ApiResponse;

    public function addComment(StoreProjectCommentsRequest $request)
    {
        $validatedData = $request->validated();
        $comment = ProjectComment::create($validatedData);
        return $this->success(200, 'Comment Added Successfully' . $comment);
    }

    public function getComments(int $projectId)
    {
        $comments = ProjectComment::where('project_id', $projectId)->get();
        return $this->success(200, 'Notes Retrieved Successfully', $comments);
    }
}
