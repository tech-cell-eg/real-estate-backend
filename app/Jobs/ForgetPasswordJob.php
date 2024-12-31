<?php

namespace App\Jobs;

use App\Mail\ForgetPasswordMail;
use App\Models\Client;
use App\Models\Company;
use App\Models\Inspector;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordJob implements ShouldQueue
{
    use Queueable, Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Client|Company|Inspector $user, public int $token)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new ForgetPasswordMail($this->user, $this->token));
    }
}
