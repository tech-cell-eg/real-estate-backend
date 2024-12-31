<?php

namespace App\Providers;

use App\Models\Card;
use App\Models\Client;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Terms;
use App\Observers\CardObserver;
use App\Observers\ClientObserver;
use App\Observers\OfferObserver;
use App\Observers\OrderObserver;
use App\Observers\PaymentObserver;
use App\Observers\PropertyObserver;
use App\Observers\TermsObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Client::observe(ClientObserver::class);
        Payment::observe(PaymentObserver::class);
        Card::observe(CardObserver::class);
        Offer::observe(OfferObserver::class);
        Order::observe(OrderObserver::class);
        Property::observe(PropertyObserver::class);
        Terms::observe(TermsObserver::class);
    }
}
