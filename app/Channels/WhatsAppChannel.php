<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class WhatsAppChannel
{
	public function send($notifiable, Notification $notification)
	{
		$message = $notification->toWhatsApp($notifiable);

		$to = $notifiable->routeNotificationFor('WhatApp');
		$from = config('services.twilio.whatsapp_from');

		// dd(config('services'));

		$twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

		return $twilio->message->create('whatapp' . $to, [
			"from" => 'whatsapp:' . $from,
			"body" => $message->content
		]);
	}
}