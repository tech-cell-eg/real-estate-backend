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
        $clientId = Auth::user()->id;
        $client = Client::find($clientId);

        $data["title"] = "فاتورة جديدة";
        $data["message"] = "تم اضافة فاتورة جديدة الى قائمة المدفوعات";
        $data["this"] = $payment;

        $client->notify(new ClientNotification($data));
    }

    /**
     * Handle the Payment "updated" event.
     */
    public function updated(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "deleted" event.
     */
    public function deleted(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     */
    public function restored(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     */
    public function forceDeleted(Payment $payment): void
    {
        //
    }
}
