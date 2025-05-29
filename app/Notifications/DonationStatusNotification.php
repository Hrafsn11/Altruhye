<?php

namespace App\Notifications;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage; // Pastikan ini tidak terpakai jika tidak dibutuhkan
use Illuminate\Support\Str;

class DonationStatusNotification extends Notification implements ShouldQueue
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
        $status = $this->donation->payment_verified; // e.g., 'verified', 'failed', 'pending', 'diterima', 'gagal', 'diproses'
        $campaignTitle = $this->donation->campaign ? $this->donation->campaign->title : 'Kampanye Tidak Diketahui';
        $campaignSlug = $this->donation->campaign ? $this->donation->campaign->slug : null;

        $message = '';
        $type = 'info'; // Default type
        $icon = 'heroicon-o-information-circle'; // Default icon (Heroicons v2 outline)
        $title = 'Update Status Donasi';

        // Normalisasi status ke lowercase untuk perbandingan yang konsisten
        $normalizedStatus = Str::lower($status);

        switch ($normalizedStatus) {
            case 'verified':
            case 'berhasil':
            case 'diterima':
            case 'success': // Menambahkan variasi umum
                $message = 'Pembayaran donasi Anda untuk kampanye "' . $campaignTitle . '" telah berhasil diverifikasi.';
                $type = 'success';
                $icon = 'heroicon-o-check-circle';
                $title = 'Donasi Terverifikasi';
                break;
            case 'failed':
            case 'gagal':
            case 'ditolak':
            case 'error': // Menambahkan variasi umum
                $message = 'Pembayaran donasi Anda untuk kampanye "' . $campaignTitle . '" gagal diproses.';
                $type = 'error';
                $icon = 'heroicon-o-x-circle';
                $title = 'Donasi Gagal';
                break;
            case 'pending':
            case 'diproses':
            case 'warning': // Menambahkan variasi umum
                $message = 'Pembayaran donasi Anda untuk kampanye "' . $campaignTitle . '" sedang menunggu verifikasi.';
                $type = 'warning';
                $icon = 'heroicon-o-clock'; // Mengganti dari exclamation menjadi clock untuk pending
                $title = 'Donasi Menunggu Verifikasi';
                break;
            default:
                $message = 'Status donasi Anda untuk kampanye "' . $campaignTitle . '" adalah: ' . htmlspecialchars($status) . '.';
                // Icon and type remain default info
                break;
        }

        $link = '#';
        if ($campaignSlug) {
            try {
                $link = route('campaigns.show', $campaignSlug);
            } catch (\Exception $e) { // Removed extra backslash
                // Log error or handle missing route gracefully
                // Log::error("Failed to generate route for campaign slug: {$campaignSlug} - " . $e->getMessage());
                $link = '#'; // Fallback if route generation fails
            }
        }

        return [
            'title' => $title,
            'message' => $message,
            'donation_id' => $this->donation->id,
            'campaign_id' => $this->donation->campaign_id,
            'campaign_slug' => $campaignSlug,
            'status_raw' => $status, // Status asli jika diperlukan
            'type' => $type, // success, error, warning, info
            'icon' => $icon, // Nama ikon Heroicon (misalnya, heroicon-o-check-circle)
            'link' => $link, // URL untuk mengarahkan pengguna
            'timestamp' => now()->toIso8601String(), // Menambahkan timestamp
        ];
    }
}
