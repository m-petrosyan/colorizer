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
        dd(request()->route()->getPrefix());
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!request()->routeIs('].get')) {
            $data['palettes'] = new PaletteCollection($this->palettes);
        }

        return $data;
    }
}
