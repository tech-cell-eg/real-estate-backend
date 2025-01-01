<?php

namespace App\Observers;

use App\Models\Card;
use App\Models\Client;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class CardObserver
{

    public function created(Card $card): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "بطاقة مصرفية جديدة";
        $data["message"] = "لقد تم اضافة بطاقة مصرفية جديدة ";
        $data["this"] = $card;

        $client->notify(new ClientNotification($data));
    }

    public function deleted(Card $card): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "بطاقة مصرفية محذوفه";
        $data["message"] = "لقد تم حذف بطاقة مصرفية من حسابك ";
        $data["this"] = $card;

        $client->notify(new ClientNotification($data));
    }
}
