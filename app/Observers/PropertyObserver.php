<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Property;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     */
    public function created(Property $property): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "عقار جديد";
        $data["message"] = "تم اضافة عقار جديد";
        $data["this"] = $property;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "عقار محدث";
        $data["message"] = "لقد تم تحديث بيانات العقار رقم $property->id";
        $data["this"] = $property;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "عقار محذوف";
        $data["message"] = "لقد تم حذف العقار رقم $property->id";
        $data["this"] = $property;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Property $property): void
    {
        //
    }
}
