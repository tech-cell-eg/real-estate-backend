<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Payment;
use App\Notifications\ClientNotification;
use Illuminate\Support\Facades\Auth;

class PaymentObserver
{
    /**
     * Handle the Payment "created" event.
     */
    public function created(Payment $payment): void
    {
        $client = Client::find(auth('api-client')->id());

        $data["title"] = "فاتورة جديدة";
        $data["message"] = "تم اضافة فاتورة جديدة الى قائمة المدفوعات";
        $data["this"] = $payment;

        // $client->notify(new ClientNotification($data));
    }

}
