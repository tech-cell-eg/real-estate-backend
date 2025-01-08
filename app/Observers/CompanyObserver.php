<?php

namespace App\Observers;

use App\Models\Company;
use App\Notifications\CompanyNotification;

class CompanyObserver
{
    public function created(Company $company): void
    {
        $data = [
            "title" => "مرحبا بك يا $company->username في موقع قيم",
            "message" => "يمكنك مشاهدة جميع التنبيهات من هنا",
            "this" => $company
        ];
        $company->notify(new CompanyNotification($data));
    }

    public function updated(Company $company): void
    {
        if($company->isDirty('password')) {
            $data = [
                "title" => 'تغيرت كلمه المرور',
                "message" => "لقد تم تغيير كلمه مرور الحساب في $company->updated_at",
                "this" => $company
            ];
            $company->notify(new CompanyNotification($data));
        } else {
            $data = [
                "title" => 'لقد حدث تغيير في حسابك',
                "message" => "لقد تم تحديث بيانات الحساب في  $company->updated_at",
                "this" => $company
            ];
            $company->notify(new CompanyNotification($data));
        }
    }
}
