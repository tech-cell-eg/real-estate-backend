<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    public function __construct(private $data) {}

    public function via()
    {
        return ['database'];
    }

    public function toArray()
    {
        return [
            "title" => $this->data["title"],
            "message" => $this->data["message"],
            "this" => $this->data["this"]
        ];
    }
}
