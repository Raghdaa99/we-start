<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rule = 'required|image|mimes:png,jpg,jpeg';
        if($this->method() == 'PUT') {
            $rule = 'nullable|image|mimes:png,jpg,jpeg';
        }
        return [
            'title' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'status' => 'required|string|in:active,draft',
            'description' => 'string',
            'image' => $rule,
        ];
    }
    public function messages()
    {
        return [];
    }
}
