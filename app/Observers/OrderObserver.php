<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Order;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

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
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

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

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
