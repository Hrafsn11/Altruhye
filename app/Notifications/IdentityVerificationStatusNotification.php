<?php

namespace App\Notifications;

use App\Models\IdentityVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdentityVerificationStatusNotification extends Notification
{
    use Queueable;

    protected $verification;

    public function __construct(IdentityVerification $verification)
    {
        $this->verification = $verification;
    }

    public function via($notifiable)
    {
        return ['database']; 
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Status Verifikasi Identitas Diperbarui',
            'message' => 'Verifikasi identitas Anda untuk ID telah diverifikasi admin menjadi '.$this->verification->status,
            'status' => $this->verification->status,
            
        ];
    }
           
    
}
