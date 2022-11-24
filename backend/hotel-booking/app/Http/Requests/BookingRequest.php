<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'hotel_id' => 'required|exists:hotels,id',
            'user_name' => 'required|string',
            'user_mobile' => 'required|string',
            'user_email' => 'required|email',
            'start_date' => 'required|before_or_equal:end_date',
            'end_date' => 'required|after_or_equal:start_date',
//            'start_date' => 'required',
//            'end_date' => 'required',
            'number_guests' => 'required',
            'notes' => 'nullable',
        ];
    }

    public function messages()
    {
        return [];
    }
}
