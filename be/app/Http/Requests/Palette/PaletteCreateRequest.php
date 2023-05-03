<?php

namespace App\Http\Requests\Palette;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaletteCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string'],
            'palettes' => ['required', 'array', 'min:1'],
            'palettes.*' => ['regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'public' => ['boolean'],
        ];
    }
}
