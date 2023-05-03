<?php

namespace App\Http\Resources\Palette;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaletteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'palettes' => $this->palettes,
            'likes' => $this->likes,
        ];

        if (!request()->routeIs('user.get')) {
            $data['user'] = new UserResource($this->user);
        }

        return $data;
    }
}
