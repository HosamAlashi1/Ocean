
@extends('dashboard.layouts.master')
@section('title', __('general.Add Blog') )
@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link href="{{ asset('dashboard/css/SumoSelect.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .blog-detail-box {
            background-color: #f8f9fa;
            border: 1px solid #e4e6ef;
            border-radius: 8px;
            padding: 35px 15px 15px 15px;
            margin-bottom: 12px;
            position: relative;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease-in-out;
        }

        .blog-detail-box.show {
            opacity: 1;
            transform: translateY(0);
        }

        .blog-detail-box:hover {
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .blog-detail-box .btn-danger {
            box-shadow: 0 2px 4px rgba(255, 0, 0, 0.15);
            transition: transform 0.2s ease-in-out;
        }

        .blog-detail-box .btn-danger:hover {
            transform: scale(1.05);
        }


    </style>

    <style>
        .ck-editor__editable_inline{
            height: 450px;
        }
        .section-divider {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .section-divider .border-top {
            border-top: 1px solid #dee2e6;
            height: 1px;
        }

    </style>
@endsection
@section('content')


    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('general.Add Blog')}}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="title">{{__('general.Title in english')}}</label>
                                            <textarea
                                                name="title"
                                                type="text"
                                                id="title"
                                                class="form-control char-textarea @error('title') is-invalid @else {{ old('title') ? 'is-valid' : '' }} @enderror"
                                                placeholder="Title"
                                                required
                                            >{{ old('title') }}</textarea>
                                            @error('title')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="title_ar">{{__('general.Title in arabic')}}</label>
                                            <textarea
                                                name="title_ar"
                                                type="text"
                                                id="title_ar"
                                                class="form-control char-textarea @error('title_ar') is-invalid @else {{ old('title_ar') ? 'is-valid' : '' }} @enderror"
                                                placeholder="العنوان "
                                                required
                                            >{{ old('title_ar') }}</textarea>
                                            @error('title_ar')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="desc">
                                                {{__('general.Description in english')}}
                                            </label>
                                            <textarea
                                                name="desc"
                                                type="text"
                                                id="desc"
                                                class="form-control char-textarea @error('desc') is-invalid @else {{ old('desc') ? 'is-valid' : '' }} @enderror"
                                                placeholder="Description.."
                                            >{{ old('desc') }}</textarea>
                                            @error('desc')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="desc_ar">
                                                {{__('general.Description in arabic')}}
                                            </label>
                                            <textarea
                                                name="desc_ar"
                                                type="text"
                                                id="desc_ar"
                                                class="form-control char-textarea @error('desc_ar') is-invalid @else {{ old('desc_ar') ? 'is-valid' : '' }} @enderror"
                                                placeholder="{{__('general.Description in arabic')}}.."
                                            >{{ old('desc_ar') }}</textarea>
                                            @error('desc_ar')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="by">{{__('general.By')}}</label>
                                            <input
                                                value="{{ old('by') }}"
                                                name="by"
                                                type="text"
                                                id="by"
                                                class="form-control form-control-sm @error('by') is-invalid @else {{ old('by') ? 'is-valid' : '' }} @enderror"
                                                placeholder="Gwen Stacy"
                                                required
                                            />
                                            @error('by')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="fp-human-friendly">{{__('general.Date')}}</label>
                                            <input
                                                value="{{ old('date') }}"
                                                name="date"
                                                type="text"
                                                id="fp-human-friendly"
                                                class="form-control flatpickr-human-friendly form-control-sm @error('date') is-invalid @else {{ old('date') ? 'is-valid' : '' }} @enderror"
                                                placeholder="October 14, 2020"
                                                required
                                            />
                                            @error('date')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="customFile">{{__('general.Image')}}</label>
                                            <small class="text-muted">({{ __('general.Optional') }})</small>
                                            <div class="custom-file">
                                                <input
                                                    name="photo"
                                                    type="file"
                                                    multiple
                                                    class="custom-file-input @error('photo') is-invalid @else {{ old('photo') ? 'is-valid' : '' }} @enderror"
                                                    id="customFile"
                                                />
                                                <label class="custom-file-label" for="customFile">{{__('general.Choose file')}}</label>
                                            </div>
                                            @error('photo')
                                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12" id="content-area1" style="display: {{ old('way_to_add_blog') === 'short_link' ? 'none' : 'block' }};">
                                        <div class="form-group">
                                            <label for="content">{{__('general.Content in english')}}</label>
                                            <textarea name="content" id="editor1" class="editor form-control">{{ old('content') }}</textarea>
                                        </div>
                                    </div>

                                   <div class="col-12" id="content-area2" style="display: {{ old('way_to_add_blog') === 'short_link' ? 'none' : 'block' }};">
                                       <div class="form-group">
                                           <label for="content">{{__('general.Content in arabic')}}</label>
                                           <textarea name="content_ar" id="editor2" class="editor form-control">{{ old('content_ar') }}</textarea>
                                       </div>
                                   </div>

                                    <div class="col-12 mt-4 mb-2">
                                        <div class="section-divider d-flex align-items-center mb-3">
                                            <span class="text-muted fw-bold me-2">{{ __('general.More Information') }}</span>
                                            <div class="flex-grow-1 border-top"></div>
                                        </div>

                                        {{-- Tags --}}
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tags" class="col-form-label-sm">{{ __('general.tags') }}</label>
                                                    <select
                                                        name="tags[]"
                                                        multiple
                                                        class="form-control testselect2 mb-1"
                                                        id="tags">
                                                        @foreach($tags as $tag)
                                                            <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                                                {{ App::getLocale() == 'ar' ? $tag->title_ar : $tag->title_en }}
                                                            </option>
                                                        @endforeach
                                                        <option value="add_new_tag" data-class="add-new-tag-option">+ {{ __('general.Add New Tag') }}</option>
                                                    </select>
                                                    @error('tags')
                                                    <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Blog Details --}}
                                        <div id="blog-details-container">
                                            @if(old('details'))
                                                @foreach(old('details') as $index => $detail)
                                                    <div class="blog-detail-box position-relative show mb-2" data-index="{{ $index }}">
                                                        <div class="row">
                                                            <div class="col-md-4 mb-2">
                                                                <label class="form-label-sm text-muted">{{ __('general.URL') }}</label>
                                                                <input type="url" name="details[{{ $index }}][url]"
                                                                       value="{{ $detail['url'] ?? '' }}"
                                                                       class="form-control form-control-sm @error("details.$index.url") is-invalid @enderror"
                                                                       placeholder="https://example.com">
                                                                @error("details.$index.url")
                                                                <span class="text-danger small d-block">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label class="form-label-sm text-muted">{{ __('general.Key (English)') }}</label>
                                                                <input type="text" name="details[{{ $index }}][key_url_en]"
                                                                       value="{{ $detail['key_url_en'] ?? '' }}"
                                                                       class="form-control form-control-sm @error("details.$index.key_url_en") is-invalid @enderror"
                                                                       placeholder="english-key">
                                                                @error("details.$index.key_url_en")
                                                                <span class="text-danger small d-block">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label class="form-label-sm text-muted">{{ __('general.Key (Arabic)') }}</label>
                                                                <input type="text" name="details[{{ $index }}][key_url_ar]"
                                                                       value="{{ $detail['key_url_ar'] ?? '' }}"
                                                                       class="form-control form-control-sm @error("details.$index.key_url_ar") is-invalid @enderror"
                                                                       placeholder="arabic-key">
                                                                @error("details.$index.key_url_ar")
                                                                <span class="text-danger small d-block">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                                onclick="removeBlogDetailRow(this)">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                                <script>
                                                    blogDetailIndex = {{ count(old('details')) }};
                                                </script>
                                            @endif
                                        </div>

                                        <div class="d-flex justify-content-end mt-2">
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addBlogDetailRow()">
                                                <i class="bi bi-plus-circle me-1"></i> {{ __('general.Add Detail') }}
                                            </button>
                                        </div>
                                    </div>



                                    <div class="modal-footer">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary mr-1">{{__('general.Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-secondary">{{__('general.Reset')}}</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('js')

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.2.7/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@3.2.7/js/froala_editor.pkgd.min.js"></script>
    <!-- Load SlimSelect JS -->
    <script src="{{URL::asset('dashboard/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('dashboard/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script>
        new FroalaEditor('#editor2', {
            language: 'ar',  // تعيين اللغة إلى العربية
            direction: 'rtl', // تعيين الاتجاه من اليمين لليسار
            // pluginsEnabled: ['image', 'link', 'video', 'table', 'lists', 'align', 'emoticons', 'wordpaste'],
            // toolbarButtons: ['bold', 'italic', 'underline', '|', 'formatOL', 'formatUL', '|', 'link', 'image', 'video'],
            imageUploadURL: "{{ route('blog.ckeditor.upload', ['_token' => csrf_token()]) }}",  // رابط رفع الصور
            imageUploadParams: {
                id: 'editor2',  // معرف المحرر
                _token: '{{ csrf_token() }}'
            },
            imageUploadMethod: 'POST', // تحديد طريقة رفع الصور
            imageUploadRemoteUrls: true, // السماح برفع الصور عبر روابط الإنترنت
            height: 200, // تحديد الارتفاع
            attribution: false,  // تعطيل الشريط
            // heightMin: 300, // تحديد الارتفاع الأدنى
        });

    </script>
    <script>
        new FroalaEditor('#editor1', {

            imageUploadURL: "{{ route('blog.ckeditor.upload', ['_token' => csrf_token()]) }}",  // رابط رفع الصور
            imageUploadParams: {
                id: 'editor1',  // معرف المحرر
                _token: '{{ csrf_token() }}'
            },
            imageUploadMethod: 'POST', // تحديد طريقة رفع الصور
            imageUploadRemoteUrls: true, // السماح برفع الصور عبر روابط الإنترنت
            height: 200, // تحديد الارتفاع
            attribution: false,  // تعطيل الشريط
            // heightMin: 300, // تحديد الارتفاع الأدنى
        });

    </script>

{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create(document.querySelector('#editor1'), {--}}
{{--                ckfinder: {--}}
{{--                    uploadUrl: "{{ route('blog.ckeditor.upload', ['_token' => csrf_token()]) }}"--}}
{{--                }--}}
{{--            })--}}
{{--            .catch(error => {--}}
{{--                console.error(error);--}}
{{--            });--}}
{{--    </script>--}}
    <script>
        {{--ClassicEditor--}}
        {{--    .create(document.querySelector('#editor2'), {--}}
        {{--        ckfinder: {--}}
        {{--            uploadUrl: "{{ route('blog.ckeditor.upload', ['_token' => csrf_token()]) }}"--}}
        {{--        },--}}
        {{--        language: 'ar', // تعيين اللغة إلى العربية--}}
        {{--        direction: 'rtl'--}}
        {{--    })--}}

        {{--    .catch(error => {--}}
        {{--        console.error(error);--}}
        {{--    });--}}
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wayToAddBlogSelect = document.getElementById('way_to_add_blog');
            toggleShortLinkInput(wayToAddBlogSelect); // Call the function on load
        });

        function toggleShortLinkInput(selectElement) {
            const shortLinkInput = document.getElementById('short-link-input');
            const contentArea1 = document.getElementById('content-area1');
            const contentArea2 = document.getElementById('content-area2');

            if (selectElement.value === 'short_link') {
                shortLinkInput.style.display = 'block';
                contentArea1.style.display = 'none';
                contentArea2.style.display = 'none';
            } else {
                shortLinkInput.style.display = 'none';
                contentArea1.style.display = 'block';
                contentArea2.style.display = 'block';
            }
        }
    </script>

    <script>
        document.getElementById('customFile').addEventListener('change', function (e) {
            // Get the selected files
            var files = e.target.files;
            var fileNames = [];

            // Iterate through the files and add their names to the array
            for (var i = 0; i < files.length; i++) {
                fileNames.push(files[i].name);
            }

            // Join the file names into a single string, separated by commas
            var displayNames = fileNames.join(', ') || '{{__('general.Choose file')}} ';

            // Update the label text with the joined file names
            e.target.nextElementSibling.textContent = displayNames;
        });
    </script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

    @php
        $addNewTagText = '+ ' . __('general.Add New Tag');
    @endphp

    <script>
        $(document).ready(function () {
            const $tagSelect = $('#tags');
            const addNewTagText = @json($addNewTagText);

            // Initialize SumoSelect
            $tagSelect.SumoSelect({
                placeholder: "{{ __('general.Select a tag') }}",
                selectAll: true,
                okCancelInMulti: true,
                csvDispCount: 3
            });

            // Apply style to "Add New Tag" after rendering
            function styleAddNewTagOption() {
                $('.SumoSelect .optWrapper li').each(function () {
                    const $li = $(this);
                    if ($li.text().trim() === addNewTagText) {
                        $li.css({
                            'color': '#0d6efd' ,
                            'border-top': '1px solid #ddd',
                        });
                    }
                });
            }

            styleAddNewTagOption(); // First render

            $tagSelect.on('change', function () {
                let selectedValues = $(this).val();

                if (selectedValues && selectedValues.includes('add_new_tag')) {
                    // Remove it
                    selectedValues = selectedValues.filter(v => v !== 'add_new_tag');
                    $tagSelect.val(selectedValues);
                    $tagSelect[0].sumo.reload();
                    styleAddNewTagOption(); // Re-style

                    Swal.fire({
                        title: '{{ __("general.Add New Tag") }}',
                        html: `
                        <input id="swal-title-en" class="swal2-input" placeholder="{{ __("general.Tag Name (English)") }}">
                        <input id="swal-title-ar" class="swal2-input" placeholder="{{ __("general.Tag Name (Arabic)") }}">
                    `,
                        focusConfirm: false,
                        showCancelButton: true,
                        confirmButtonText: '{{ __("general.Save") }}',
                        cancelButtonText: '{{ __("general.Cancel") }}',
                        preConfirm: () => {
                            const titleEn = document.getElementById('swal-title-en').value.trim();
                            const titleAr = document.getElementById('swal-title-ar').value.trim();

                            if (!titleEn || !titleAr) {
                                Swal.showValidationMessage('{{ __("general.Both fields are required") }}');
                            }

                            return { title_en: titleEn, title_ar: titleAr };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route("tags.store") }}',
                                method: 'POST',
                                data: {
                                    title_en: result.value.title_en,
                                    title_ar: result.value.title_ar,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function (response) {
                                    // Add new option and reload
                                    const newOption = new Option(response.title, response.id, true, true);
                                    $tagSelect.append(newOption);
                                    $tagSelect[0].sumo.reload();
                                    styleAddNewTagOption(); // Re-style again after reload
                                },
                                error: function () {
                                    Swal.fire({
                                        icon: 'error',
                                        title: '{{ __("general.Error") }}',
                                        text: '{{ __("general.Failed to add tag") }}'
                                    });
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>

{{--    add blog details   --}}
    <script>
        let blogDetailIndex = 0;

        function addBlogDetailRow() {
            const row = $(`
        <div class="blog-detail-box position-relative show" data-index="${blogDetailIndex}">
    <div class="row">
        <div class="col-md-4 mb-2">
            <label class="form-label-sm text-muted">{{ __('general.URL') }}</label>
            <input type="url" name="details[${blogDetailIndex}][url]" class="form-control form-control-sm" placeholder="https://example.com">
        </div>
        <div class="col-md-4 mb-2">
            <label class="form-label-sm text-muted">{{ __('general.Key (English)') }}</label>
            <input type="text" name="details[${blogDetailIndex}][key_url_en]" class="form-control form-control-sm" placeholder="english-key">
        </div>
        <div class="col-md-4 mb-2">
            <label class="form-label-sm text-muted">{{ __('general.Key (Arabic)') }}</label>
            <input type="text" name="details[${blogDetailIndex}][key_url_ar]" class="form-control form-control-sm" placeholder="arabic-key">
        </div>
    </div>

    <!-- Button outside of .row, but still inside relative container -->
    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" onclick="removeBlogDetailRow(this)">
        <i class="bi bi-trash"></i>
    </button>
</div>
    `);

            $('#blog-details-container').append(row);
            setTimeout(() => {
                row.addClass('show'); // Trigger the CSS transition
            }, 100); // Small delay to apply the transition smoothly

            blogDetailIndex++;
        }

        function removeBlogDetailRow(btn) {
            const $row = $(btn).closest('.blog-detail-box');
            $row.removeClass('show');
            setTimeout(() => {
                $row.remove();
            }, 300); // Wait for transition to finish
        }

    </script>

@stop
