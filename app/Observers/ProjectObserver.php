<?php

namespace App\Observers;

use App\Models\Project;
use App\Notifications\GeneralNotification;

class ProjectObserver
{
    public function created(Project $project): void
    {
        if (auth('api-client')->check()) 
        {
            $data = [
                'title' => 'عرض جديد',
                'message'=> "لقد تم تقديم عرض جديد من {$project->company->username} للعقار رقم {$project->property_id} بقيمة {$project->price} ريال",
                'this' => $project
            ];
            auth('api-client')->user->notify(new GeneralNotification($data));
        }
    }

    public function updated(Project $project): void
    {
        if($project->isDirty('report_id')) {
            if (auth('api-client')->check()) {
                $data = [
                    'title' => "التقرير جاهز",
                    "message" => "لقد قام المعاين {$project->inspector->username} برفع التقرير الخاص بالعقار رقم {$project->property_id}", 
                    "this" => $project
                ];
                auth('api-client')->user->notify(new GeneralNotification($data));
            }
        }
    }
}
