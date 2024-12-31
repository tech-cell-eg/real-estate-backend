<?php

namespace App\Observers;

use App\Models\Card;
use App\Models\Client;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class CardObserver
{
    /**
     * Handle the Card "created" event.
     */
    public function created(Card $card): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "بطاقة مصرفية جديدة";
        $data["message"] = "لقد تم اضافة بطاقة مصرفية جديدة ";
        $data["this"] = $card;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Card "updated" event.
     */
    public function updated(Card $card): void
    {
        //
    }

    /**
     * Handle the Card "deleted" event.
     */
    public function deleted(Card $card): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "بطاقة مصرفية محذوفه";
        $data["message"] = "لقد تم حذف بطاقة مصرفية من حسابك ";
        $data["this"] = $card;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Card "restored" event.
     */
    public function restored(Card $card): void
    {
        //
    }

    /**
     * Handle the Card "force deleted" event.
     */
    public function forceDeleted(Card $card): void
    {
        //
    }
}
