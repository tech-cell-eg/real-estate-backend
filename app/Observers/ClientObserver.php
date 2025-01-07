<?php

namespace App\Observers;

use App\Models\Client;
use App\Notifications\ClientNotification;

class ClientObserver
{
    public function created(Client $client): void
    {
        $data = [
            "title" => "مرحبا بك يا $client->username في موقع قيم",
            "message" => "يمكنك مشاهدة جميع التنبيهات من هنا",
            "this" => $client
        ];
        $client->notify(new ClientNotification($data));
    }

    public function updated(Client $client): void
    {
        if ($client->isDirty('password')) {
            $data = [
                "title" => 'تغيرت كلمه المرور',
                "message" => "لقد تم تغيير كلمه مرور الحساب في $client->updated_at",
                "this" => $client
            ];
            $client->notify(new ClientNotification($data));
        } else {
            $data = [
                "title" => 'لقد حدث تغيير في حسابك',
                "message" => "لقد تم تحديث بيانات الحساب في  $client->updated_at",
                "this" => $client
            ];
            $client->notify(new ClientNotification($data));
        }
    }

}
