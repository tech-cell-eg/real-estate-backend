<?php

namespace App\Observers;

use App\Models\Client;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     */
    public function created(Client $client): void
    {
        $data["title"] = "مرحبا بك في موقع قيم";
        $data["message"] = "يمكنك مشاهدة جميع التنبيهات من هنا";
        $data["this"] = $client;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Client "updated" event.
     */
    public function updated(Client $client): void
    {
        $data["title"] = "لقد حدث تغيير في حسابك";
        $data["message"] = "لقد تم تحديث بيانات الحساب";
        $data["this"] = $client;

        $client->notify(new ClientNotification($data));
    }

    public function deleted(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "restored" event.
     */
    public function restored(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     */
    public function forceDeleted(Client $client): void
    {
        //
    }
}
