<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Palette\PaletteCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!request()->routeIs('palette', 'palette.*')) {
            $data['palettes'] = new PaletteCollection($this->palettes->load('likes'));
        }

        return $data;
    }
}
