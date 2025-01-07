<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Project;
use App\Models\ProjectNote;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Http\Request;

class InspectorProjectsController extends Controller
{
    use ApiResponse, FileControl;

    function filterProject($data) {
        return [
            'project_id' => $data->id,
            'property' => $data->property,
            'company' => $data->company,
            'price' => $data->price,
        ];
    }

    function index() {
        $projects = Project::with('company', 'property')
            ->where('inspector_id', '!=', null)
            ->where('inspector-status', 'accepted')
            ->where('inspector_id', auth('api-inspector')->id())->get();

            $data = [];
            foreach ($projects as $project) {
                $data[] = $this->filterProject($project);
            }
        return $this->success(200, 'all Projects', $data);
    }

    function show($id) {
        $project = Project::findOrFail($id);

        $data = $this->filterProject($project);

        return $this->success(200, 'project found!', $data);
    }

    function update(Request $request, $id) {
        $project = Project::findOrFail($id);

        if($request->has('note') || $request->has('file')) {
            ProjectNote::create([
                'project_id' => $project->id,
                'note' => $request->note
            ]);
            $filePath = $this->uploadFiles($request->file, 'uplaods/')[0];
            File::create([
                'property_id', $project->property->id,
                'path' => $filePath,
                'url' => env("APP_URL") . '/storage/' . $filePath
            ]);
            return $this->success(200, 'updated!');
        }
        
        return $this->failed(402, 'you can update note and file only!');
    }
}
