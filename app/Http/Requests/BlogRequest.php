<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255|min:4',
            'title_ar' => 'required|string|max:255|min:4',
            'desc' => 'required|string|min:10',
            'desc_ar' => 'required|string|min:10',
            'content' => 'required|string',
            'content_ar' => 'required|string',
            'date' => 'required|date',
            'by' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|exists:tags,id',
            'details' => 'nullable|array',
            'details.*.url' => 'nullable|url|max:2048',
            'details.*.key_url_en' => 'nullable|string|max:255',
            'details.*.key_url_ar' => 'nullable|string|max:255',
        ];

        if ($this->route()->getName() === 'blog.update') {
            $rules['photo'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            // Title (EN)
            'title.required' => trans('validation.required', ['attribute' => trans('validation.attributes.title')]),
            'title.string' => trans('validation.string', ['attribute' => trans('validation.attributes.title')]),
            'title.max' => trans('validation.max', ['attribute' => trans('validation.attributes.title'), 'max' => 255]),
            'title.min' => trans('validation.min', ['attribute' => trans('validation.attributes.title'), 'min' => 4]),

            // Title (AR)
            'title_ar.required' => trans('validation.required', ['attribute' => trans('validation.attributes.title_ar')]),
            'title_ar.string' => trans('validation.string', ['attribute' => trans('validation.attributes.title_ar')]),
            'title_ar.max' => trans('validation.max', ['attribute' => trans('validation.attributes.title_ar'), 'max' => 255]),
            'title_ar.min' => trans('validation.min', ['attribute' => trans('validation.attributes.title_ar'), 'min' => 4]),

            // Description (EN)
            'desc.required' => trans('validation.required', ['attribute' => trans('validation.attributes.desc')]),
            'desc.string' => trans('validation.string', ['attribute' => trans('validation.attributes.desc')]),
            'desc.min' => trans('validation.min', ['attribute' => trans('validation.attributes.desc'), 'min' => 10]),

            // Description (AR)
            'desc_ar.required' => trans('validation.required', ['attribute' => trans('validation.attributes.desc_ar')]),
            'desc_ar.string' => trans('validation.string', ['attribute' => trans('validation.attributes.desc_ar')]),
            'desc_ar.min' => trans('validation.min', ['attribute' => trans('validation.attributes.desc_ar'), 'min' => 10]),

            // Content (EN)
            'content.required' => trans('validation.required', ['attribute' => trans('validation.attributes.content')]),
            'content.string' => trans('validation.string', ['attribute' => trans('validation.attributes.content')]),

            // Content (AR)
            'content_ar.required' => trans('validation.required', ['attribute' => trans('validation.attributes.content_ar')]),
            'content_ar.string' => trans('validation.string', ['attribute' => trans('validation.attributes.content_ar')]),

            // Date
            'date.required' => trans('validation.required', ['attribute' => trans('validation.attributes.date')]),
            'date.date' => trans('validation.date', ['attribute' => trans('validation.attributes.date')]),

            // Author
            'by.required' => trans('validation.required', ['attribute' => trans('validation.attributes.by')]),
            'by.string' => trans('validation.string', ['attribute' => trans('validation.attributes.by')]),
            'by.max' => trans('validation.max', ['attribute' => trans('validation.attributes.by'), 'max' => 255]),

            // Tags
            'tags.array' => trans('validation.array', ['attribute' => trans('validation.attributes.tags')]),
            'tags.*.exists' => trans('validation.exists', ['attribute' => trans('validation.attributes.tags')]),

            // Details
            'details.array' => trans('validation.array', ['attribute' => trans('validation.attributes.details')]),
            'details.*.url.url' => trans('validation.url', ['attribute' => trans('validation.attributes.details_url')]),
            'details.*.url.max' => trans('validation.max', ['attribute' => trans('validation.attributes.details_url'), 'max' => 2048]),
            'details.*.key_url_en.max' => trans('validation.max', ['attribute' => trans('validation.attributes.key_url_en'), 'max' => 255]),
            'details.*.key_url_ar.max' => trans('validation.max', ['attribute' => trans('validation.attributes.key_url_ar'), 'max' => 255]),

            // Image
            'photo.required' => trans('validation.required', ['attribute' => trans('validation.attributes.photo')]),
            'photo.image' => trans('validation.image', ['attribute' => trans('validation.attributes.photo')]),
            'photo.mimes' => trans('validation.mimes', ['attribute' => trans('validation.attributes.photo')]),
            'photo.max' => trans('validation.max', ['attribute' => trans('validation.attributes.photo'), 'max' => 2048]),
        ];
    }


    /**
     * Add conditional validation logic for blog details.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $details = $this->input('details', []);

            foreach ($details as $index => $detail) {
                $url = $detail['url'] ?? null;
                $keyEn = $detail['key_url_en'] ?? null;
                $keyAr = $detail['key_url_ar'] ?? null;

                $filled = array_filter([$url, $keyEn, $keyAr]);

                // If any field is filled, all are required
                if (!empty($filled) && (empty($url) || empty($keyEn) || empty($keyAr))) {
                    if (empty($url)) {
                        $validator->errors()->add("details.$index.url", __('validation.required', [
                            'attribute' => __('validation.attributes.details_url')
                        ]));
                    }
                    if (empty($keyEn)) {
                        $validator->errors()->add("details.$index.key_url_en", __('validation.required', [
                            'attribute' => __('validation.attributes.key_url_en')
                        ]));
                    }
                    if (empty($keyAr)) {
                        $validator->errors()->add("details.$index.key_url_ar", __('validation.required', [
                            'attribute' => __('validation.attributes.key_url_ar')
                        ]));
                    }
                }
            }
        });
    }

}
