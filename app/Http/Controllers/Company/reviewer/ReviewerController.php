<?php

namespace App\Http\Controllers\Company\reviewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthReviewer\RegisterReviewerRequest;
use App\Http\Requests\Company\Inspector\UpdateTeamRequest;
use App\Models\Reviewer;
use App\Traits\ApiResponse;
use App\Traits\FileControl;
use Illuminate\Http\Request;
use App\Traits\AuthUserTrait;

class ReviewerController extends Controller
{
    use ApiResponse, FileControl;
    public function index(){
        $id=1;
        $reviewers = Reviewer::with('city')->select('id', 'username','city_id')->where('company_id',$id)->get();
        return $this->success(200,"All Reviewers data",$reviewers);
    }

    public function store(RegisterReviewerRequest $request){
        $data = $request->validated();
        $data['certificate'] = $this->uploadFiles($data['certificate'], 'Certifications/Reviewers')[0];
        $data['company_id'] = 1;
        $reviewer = Reviewer::create($data);

        return $this->success(201,"Reviewer created successfully",$reviewer);
    }

    public function show($id){
        $reviewer = Reviewer::find($id);
        if (!$reviewer) {
            return $this->failed(404, "Reviewer not found");
            }
            return $this->success(200,"Reviewer data",$reviewer);
            }


        public function update(UpdateTeamRequest $request, $id){
            $reviewer = Reviewer::find($id);
            if (!$reviewer) {
                return $this->failed(404, "Reviewer not found");
                }
                $reviewer->update($request->validated());
                return $this->success(200,"Reviewer updated successfully",$reviewer);
            }


            public function destroy($id){
                $reviewer = Reviewer::find($id);
                if (!$reviewer) {
                    return $this->failed(404, "Reviewer not found");
                    }
                    $reviewer->company_id = null;
                    $reviewer->save();
                    return $this->success(200,"Reviewer deleted successfully");
                    }
}
