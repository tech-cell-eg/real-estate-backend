<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Offer;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class OfferObserver
{
    /**
     * Handle the Offer "created" event.
     */
    public function created(Offer $offer): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "عرض جديد";
        $data["message"] = "لقد تم اضافة عرض جديد الى قائمة العروض";
        $data["this"] = $offer;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Offer "updated" event.
     */
    public function updated(Offer $offer): void
    {
        //
    }

    /**
     * Handle the Offer "deleted" event.
     */
    public function deleted(Offer $offer): void
    {
        //
    }

    /**
     * Handle the Offer "restored" event.
     */
    public function restored(Offer $offer): void
    {
        //
    }

    /**
     * Handle the Offer "force deleted" event.
     */
    public function forceDeleted(Offer $offer): void
    {
        //
    }
}
