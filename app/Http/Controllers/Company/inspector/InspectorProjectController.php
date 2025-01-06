<?php

namespace App\Http\Controllers\Company\inspector;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Inspector\InspectorProjectRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class InspectorProjectController extends Controller
{
    public function update($projectID,InspectorProjectRequest $request)  {
        $project=Order::findOrFail($projectID);
        $project->update($request->all());
        return response()->json(['message'=>'Inspector Assigned to this Project successfully']);
    }
}
