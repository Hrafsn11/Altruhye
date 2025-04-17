<?php

namespace App\Notifications;

use App\Models\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class CampaignStatusNotification extends Notification
{
    use Queueable;

    protected $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    // hanya kirim ke database
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Campaign kamu telah di-' . $this->campaign->status,
            'message' => 'Campaign "' . $this->campaign->title . '" sekarang berstatus: ' . $this->campaign->status,
            'campaign_id' => $this->campaign->id,
            'url' => route('campaigns.show', ['campaign' => $this->campaign->id]),
        ];
    }
}
