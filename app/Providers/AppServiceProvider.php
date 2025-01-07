<?php

namespace App\Providers;

use App\Models\Card;
use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Property;
use App\Models\Reviewer;
use App\Models\Terms;
use App\Observers\CardObserver;
use App\Observers\ClientObserver;
use App\Observers\CompanyObserver;
use App\Observers\InspectorObserver;
use App\Observers\OfferObserver;
use App\Observers\OrderObserver;
use App\Observers\PaymentObserver;
use App\Observers\ProjectObserver;
use App\Observers\PropertyObserver;
use App\Observers\ReviewerObserver;
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
        Company::observe(CompanyObserver::class);
        Inspector::observe(InspectorObserver::class);
        Reviewer::observe(ReviewerObserver::class);
        Project::observe(ProjectObserver::class);
        Payment::observe(PaymentObserver::class);
        Card::observe(CardObserver::class);
        Property::observe(PropertyObserver::class);
        Terms::observe(TermsObserver::class);
    }
}
