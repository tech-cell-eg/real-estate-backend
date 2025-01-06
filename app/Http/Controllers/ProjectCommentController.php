<?php

namespace App\Http\Controllers;

use App\Models\ProjectComment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProjectCommentController extends Controller
{
    use ApiResponse;

    function show($id) {
        $comments = ProjectComment::where('project_id', $id)->get();
        return $this->success(200, 'all comments!', $comments);
    }

    function store(Request $request ,$id) {
        $guards = ['company', 'inspector', 'client'];

        foreach ($guards as $guard) {
            if (auth('api-'.$guard)->check()) {
            $comment = ProjectComment::create([
                'project_id' => $id,
                'writer_id' => auth('api-'. $guard)->id(),
                'writer_type' => $guard,
                'comment' => $request->comment
                ]);
                return $this->success(200, 'comment send!', $comment);
            }
        }
        return $this->failed(403, 'not allowed!');
    }
}