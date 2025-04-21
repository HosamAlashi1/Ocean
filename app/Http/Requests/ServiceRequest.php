<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $rules =  [
            'desc' => 'required|string|min:10',
            'desc_ar' => 'required|string|min:10',
            'title_ar' => 'required',
            'title_en' => 'required',
        ];

        if ($this->route()->getName() === 'services.update') {
            $rules['photo'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg';
        } else {
            $rules['title_ar'] .= '|unique:services,title_ar';
            $rules['title_en'] .= '|unique:services,title_en';
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required', ['attribute' => trans('validation.attributes.photo')]),
            'photo.image' => trans('validation.image', ['attribute' => trans('validation.attributes.photo')]),
            'photo.mimes' => trans('validation.mimes', ['attribute' => trans('validation.attributes.photo')]),
            'photo.max' => trans('validation.max', ['attribute' => trans('validation.attributes.photo'), 'max' => 2]),
        ];
    }

}
