<?php

namespace App\Http\Controllers\API\Company\inspector;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Inspector\InspectorProjectRequest;
use App\Models\Order;
use App\Models\Project;

class InspectorProjectController extends Controller
{
    public function update($projectID, InspectorProjectRequest $request)
    {
        $project = Project::findOrFail($projectID);
        $project->update(['inspector_id' => $request->inspector_id]);
        return response()->json(['message' => 'Inspector Assigned to this Project successfully']);
    }
}
