<?php

namespace App\Observers;

use App\Models\Reviewer;
use App\Notifications\ReviewerNotification;

class ReviewerObserver
{
    public function created(Reviewer $reviewer): void
    {
        $data = [
            "title" => "مرحبا بك يا $reviewer->username في موقع قيم",
            "message" => "يمكنك مشاهدة جميع التنبيهات من هنا",
            "this" => $reviewer,
        ];
        $reviewer->notify(new ReviewerNotification($data));
    }

    public function updated(Reviewer $reviewer): void
    {
        if ($reviewer->isDirty('password')) {
            $data = [
                "title" => 'تغيرت كلمة المرور',
                "message" => "لقد تم تغيير كلمة مرور الحساب في $reviewer->updated_at",
                "this" => $reviewer,
            ];
            $reviewer->notify(new ReviewerNotification($data));
        } else {
            $data = [
                "title" => 'لقد حدث تغيير في حسابك',
                "message" => "لقد تم تحديث بيانات الحساب في $reviewer->updated_at",
                "this" => $reviewer,
            ];
            $reviewer->notify(new ReviewerNotification($data));
        }
    }
}
