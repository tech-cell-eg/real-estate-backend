<?php

namespace App\Http\Controllers\Company\inspector;
use App\Http\Requests\API\AuthInspector\RegisterInspectorRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Inspector\UpdateTeamRequest;
use App\Models\Inspector;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Http\Request;

class InspectorController extends Controller
{
    use ApiResponse, FileControl;
    public function index(){
        $id=1;
        $inspectors = Inspector::with('city')->select('id', 'username','city_id')->where('company_id',$id)->get();
        return $this->success(200,"All inspectors data",$inspectors);
    }

    public function store(RegisterInspectorRequest $request){
        $data = $request->validated();
        $data['delegation'] = $this->uploadFiles($data['delegation'], 'Delegations')[0];
        $data['company_id'] = 1;
        $inspector = Inspector::create($data);
        return $this->success(201,"Inspector created successfully",$inspector);
    }

    public function show($id){
        $inspector = Inspector::find($id);
        if (!$inspector) {
            return $this->failed(404, "Inspector not found");
            }
            return $this->success(200,"Inspector data",$inspector);
            }


        public function update(UpdateTeamRequest $request, $id){
            $inspector = Inspector::find($id);
            if (!$inspector) {
                return $this->failed(404, "Inspector not found");
                }
                $inspector->update($request->validated());
                return $this->success(200,"Inspector updated successfully",$inspector);
            }


            public function destroy($id){
                $inspector = Inspector::find($id);
                if (!$inspector) {
                    return $this->failed(404, "Inspector not found");
                    }
                    $inspector->company_id = null;
                    $inspector->save();
                    return $this->success(200,"Inspector deleted successfully");
                    }
        }