<?php

namespace App\Observers;

use App\Models\Inspector;
use App\Notifications\InspectorNotification;

class InspectorObserver
{
    public function created(Inspector $inspector): void
    {
        $data = [
            "title" => "مرحبا بك يا $inspector->username في موقع قيم",
            "message" => "يمكنك مشاهدة جميع التنبيهات من هنا",
            "this" => $inspector,
        ];
        $inspector->notify(new InspectorNotification($data));
    }

    public function updated(Inspector $inspector): void
    {
        if ($inspector->isDirty('password')) {
            $data = [
                "title" => 'تغيرت كلمة المرور',
                "message" => "لقد تم تغيير كلمة مرور الحساب في $inspector->updated_at",
                "this" => $inspector,
            ];
            $inspector->notify(new InspectorNotification($data));
        } else {
            $data = [
                "title" => 'لقد حدث تغيير في حسابك',
                "message" => "لقد تم تحديث بيانات الحساب في $inspector->updated_at",
                "this" => $inspector,
            ];
            $inspector->notify(new InspectorNotification($data));
        }
    }
}
