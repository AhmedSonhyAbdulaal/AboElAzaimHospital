<?php

namespace App\Http\Resources\WorkShopRelation;

use App\Models\Price;
use App\Models\WorkShop;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Index extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $w = WorkShop::find($this->work_shop_id);
        return [
            'price' => Price::find($this->price_id)->price,
            'name' => $w->name,
            'is_primary' => $w->is_primary,
        ];
    }
}
