<?php

namespace App\Observers;

use App\Models\Donation;

class DonationObserver
{
    public function updated(Donation $donation)
    {
        if ($donation->isDirty('payment_verified') && $donation->payment_verified === 'approved') {
            $campaign = $donation->campaign;

            if ($donation->type === 'financial' && $donation->amount) {
                $campaign->collected_amount += $donation->amount;
            }

            if ($donation->type === 'goods' && $donation->item_quantity) {
                $campaign->collected_items += $donation->item_quantity;
            }

            if ($donation->type === 'emotional' && $donation->session_count) {
                $campaign->collected_sessions += $donation->session_count;
            }

            $campaign->save();
        }
    }
}

