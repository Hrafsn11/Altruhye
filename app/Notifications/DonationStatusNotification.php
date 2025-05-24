<?php

namespace App\Notifications;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class DonationStatusNotification extends Notification
{
    use Queueable;

    public $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    public function via($notifiable)
    {
        return ['database']; // Simpan ke database
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Status Donasi Diperbarui',
            'message' => 'Donasi Anda untuk campaign ID #' . $this->donation->campaign_id . ' telah ' . $this->donation->payment_verified . '.',
            'donation_id' => $this->donation->id,
            'campaign_id' => $this->donation->campaign_id,
            'status' => $this->donation->payment_verified,
        ];
    }
}
