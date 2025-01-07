<?php

namespace App\Http\Controllers\API\Company\inspector;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthInspector\RegisterInspectorRequest;
use App\Http\Requests\Company\Inspector\UpdateTeamRequest;
use App\Models\Inspector;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectorController extends Controller
{
    use ApiResponse, FileControl;

    public function index()
    {
        $companyId = auth('api-company')->user()->id;
        $inspectors = Inspector::with('city')->select('id', 'username', 'city_id')->where('company_id', $companyId)->get();
        return $this->success(200, "All inspectors data", $inspectors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'inspector_id' => 'required|exists:inspectors,id'
        ]);
        $inspectorID = $request->inspector_id;
        $companyID = auth('api-company')->user()->id;
        $inspector = Inspector::where('id' , $inspectorID)->update(['company_id' => $companyID]);
        return $this->success(201, "Inspector added successfully", $inspector);
    }

    public function show($id)
    {
        $inspector = Inspector::find($id);
        if (!$inspector) {
            return $this->failed(404, "Inspector not found");
        }
        return $this->success(200, "Inspector data", $inspector);
    }

    public function destroy($id)
    {
        $inspector = Inspector::find($id);
        if (!$inspector) {
            return $this->failed(404, "Inspector not found");
        }
        $inspector->company_id = null;
        $inspector->save();
        return $this->success(200, "Inspector deleted successfully");
    }
}