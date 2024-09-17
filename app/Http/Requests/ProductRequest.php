<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
        'model'=>'required',
        'display'=>'required',
        'memory'=>'required',
        'cpu'=>'required',
        'storage'=>'required',
        'battery'=>'required',
        'weight'=>'required',
        'feature'=>'required',
        'warranty'=>'required',
        'discount'=>'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'condition' => 'required|in:default,new,hot',
        'status'=>'required|in:active,inactive',
        'category_id'=>'required',
        'brand_id'=>'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,webp,avif'
           ]
        ;
    }
}
