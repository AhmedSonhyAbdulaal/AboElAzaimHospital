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
        $p = Price::find($this->price_id);
        return [
            'price' => $p?->price,
            'currancy_symbol' => $p?->symbol,
            'currancy_name' => $p?->currancy,
            'price' => $p?->price,
            'id' => $w->id,
            'nameAR' => $w->nameAR,
            'nameEN' => $w->nameEN,
            'is_primary' => $w->is_primary,
            // 'day' => $w->day,
        ];
    }
}
