<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'type' => $this->type,
            'target_amount' => $this->target_amount,
            'target_items' => $this->target_items,
            'target_sessions' => $this->target_sessions,
            'collected_amount' => $this->collected_amount,
            'collected_items' => $this->collected_items,
            'collected_sessions' => $this->collected_sessions,
            'status' => $this->status,
            'gambar_url' => $this->gambar ? asset('storage/' . $this->gambar) : null,
            'progress_percent' => $this->progressPercent(),
            'display_target' => $this->displayTarget(),
            'display_collected' => $this->displayCollected(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
