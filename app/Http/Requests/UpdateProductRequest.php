<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        $id = $this->segment(2);
        return [
            'cate_id' => 'required',
            'product_name' => ['required','max:30', Rule::unique('products')->ignore($id)],
            'price' => 'required',
            // 'img_cover' => ['image', Rule::requiredIf(empty(request('image_url')))],
            'quantity' => 'required',
        ];
    }
}
