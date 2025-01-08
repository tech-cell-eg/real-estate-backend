<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use App\Models\Reviewer;
use App\Models\Terms;
use App\Notifications\ClientNotification;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TermsObserver
{
    public function updated(Terms $terms): void
    {
        
        $data["title"] = "الشروط والاحكام";
        $data["message"] = "لقد حدث تغيير في الشروط والاحكام";
        $data["this"] = $terms;

        $clients = Client::all();
        $companys = Company::all();
        $inspectors = Inspector::all();
        $reviewers = Reviewer::all();

        // Merge all users into a single collection
        $all = $clients->merge($inspectors)->merge($reviewers)->merge($companys);

        // Send the notification
        Notification::send($all, new GeneralNotification($data));
    }

}
