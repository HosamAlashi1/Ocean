<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'service_id' => 'required|exists:services,id',
        ];

        $fileRule = 'file|mimetypes:image/jpeg,image/png,image/gif,image/svg+xml,video/mp4,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/x-flv,video/webm,video/3gpp,video/ogg,video/mpeg';

        if ($this->route()->getName() === 'work.update') {
            $rules['file'] = 'nullable|' . $fileRule;
        } else {
            $rules['file'] = 'required|' . $fileRule;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'service_id.required' => trans('validation.required', ['attribute' => trans('validation.attributes.service_id')]),
            'service_id.exists' => trans('validation.exists', ['attribute' => trans('validation.attributes.service_id')]),

            'file.required' => trans('validation.required', ['attribute' => trans('validation.attributes.file')]),
            'file.file' => trans('validation.file', ['attribute' => trans('validation.attributes.file')]),
            'file.mimetypes' => trans('validation.mimetypes', ['attribute' => trans('validation.attributes.file')]),
//            'file.max' => trans('validation.max', ['attribute' => trans('validation.attributes.file'), 'max' => 20]),
        ];
    }
}
