<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Terms;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class TermsObserver
{
    public function updated(Terms $terms): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "الشروط والاحكام";
        $data["message"] = "لقد حدث تغيير في الشروط والاحكام";
        $data["this"] = $terms;

        // $client->notify(new ClientNotification($data));
    }

}
