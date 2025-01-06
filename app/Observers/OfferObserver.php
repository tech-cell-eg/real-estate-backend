<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Offer;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class OfferObserver
{

    public function created(Offer $offer): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "عرض جديد";
        $data["message"] = "لقد تم اضافة عرض جديد الى قائمة العروض";
        $data["this"] = $offer;

        // $client->notify(new ClientNotification($data));
    }
}
