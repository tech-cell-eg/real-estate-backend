<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Property;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class PropertyObserver
{

    public function created(Property $property): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "عقار جديد";
        $data["message"] = "تم اضافة عقار جديد";
        $data["this"] = $property;

        // $client->notify(new ClientNotification($data));
    }

    public function updated(Property $property): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "عقار محدث";
        $data["message"] = "لقد تم تحديث بيانات العقار رقم $property->id";
        $data["this"] = $property;

        // $client->notify(new ClientNotification($data));
    }

    public function deleted(Property $property): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "عقار محذوف";
        $data["message"] = "لقد تم حذف العقار رقم $property->id";
        $data["this"] = $property;

        // $client->notify(new ClientNotification($data));
    }

}
