<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change to false if you want to restrict access
    }

    public function rules(): array
    {
        $rules =  [
            'service_id' => 'required|exists:services,id',
        ];
        if ($this->route()->getName() === 'work.update') {
            $rules['photo'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        return $rules;
    }

    public function messages()
    {
        return [

            'service_id.required' => trans('validation.required', ['attribute' => trans('validation.attributes.service_id')]),
            'service_id.exists' => trans('validation.exists', ['attribute' => trans('validation.attributes.service_id')]),

            'required' => trans('validation.required', ['attribute' => trans('validation.attributes.photo')]),
            'photo.image' => trans('validation.image', ['attribute' => trans('validation.attributes.photo')]),
            'photo.mimes' => trans('validation.mimes', ['attribute' => trans('validation.attributes.photo')]),
            'photo.max' => trans('validation.max', ['attribute' => trans('validation.attributes.photo'), 'max' => 2]),
        ];
    }

}
