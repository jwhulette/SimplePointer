<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class RoomRequest extends FormRequest
{
    public const int ROOM_NAME_LENGTH = 255;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,string|array<int,string>>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:' . self::ROOM_NAME_LENGTH,
            'card_set' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string,string>
     */
    #[Override]
    public function messages(): array
    {
        return [
            'name.required'     => 'A room name is required',
            'card_set.required' => 'A card set is required',
        ];
    }
}
