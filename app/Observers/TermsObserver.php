<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Terms;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class TermsObserver
{
    /**
     * Handle the Terms "created" event.
     */
    public function created(Terms $terms): void
    {
        //
    }

    /**
     * Handle the Terms "updated" event.
     */
    public function updated(Terms $terms): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "الشروط والاحكام";
        $data["message"] = "لقد حدث تغيير في الشروط والاحكام";
        $data["this"] = $terms;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Terms "deleted" event.
     */
    public function deleted(Terms $terms): void
    {
        //
    }

    /**
     * Handle the Terms "restored" event.
     */
    public function restored(Terms $terms): void
    {
        //
    }

    /**
     * Handle the Terms "force deleted" event.
     */
    public function forceDeleted(Terms $terms): void
    {
        //
    }
}
