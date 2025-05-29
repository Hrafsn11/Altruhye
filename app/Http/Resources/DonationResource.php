<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'campaign_id' => $this->campaign_id,
            'user_id' => $this->user_id,
            'donor_name' => $this->donor_name,
            'type' => $this->type,
            'amount' => $this->amount,
            'item_description' => $this->item_description,
            'item_quantity' => $this->item_quantity,
            'initial_message' => $this->initial_message,
            'session_count' => $this->session_count,
            'payment_proof_url' => $this->payment_proof ? asset('storage/' . $this->payment_proof) : null,
            'payment_verified' => $this->payment_verified,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'campaign' => $this->whenLoaded('campaign'),
        ];
    }
}
