<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Order;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{

    public function created(Order $order): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "طلب جديد";
        $data["message"] = "لقد تم اضافة طلب جديد الى قائمة الطلبات";
        $data["this"] = $order;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $client = Client::find(auth('api-client')->id());

        if($order->status == "accepted") {
            $data["title"] = "طلب مقبول";
            $data["message"] = "لقد تم قبول طلب رقم $order->id";
            $data["this"] = $order;
        }

        if($order->status == "rejected") {
            $data["title"] = "طلب مرفوض";
            $data["message"] = "لقد تم رفض طلب رقم $order->id";
            $data["this"] = $order;
        }

        $client->notify(new ClientNotification($data));
    }
}
