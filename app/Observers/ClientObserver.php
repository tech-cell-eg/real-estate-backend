<?php

namespace App\Observers;

use App\Models\Client;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class ClientObserver
{
    public function created(Client $client): void
    {
        $data["title"] = "مرحبا بك في موقع قيم";
        $data["message"] = "يمكنك مشاهدة جميع التنبيهات من هنا";
        $data["this"] = $client;

        $client->notify(new ClientNotification($data));
    }

    public function updated(Client $client): void
    {
        $data["title"] = "لقد حدث تغيير في حسابك";
        $data["message"] = "لقد تم تحديث بيانات الحساب";
        $data["this"] = $client;

        $client->notify(new ClientNotification($data));
    }

}
