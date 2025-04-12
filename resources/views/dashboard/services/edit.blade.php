
@extends('dashboard.layouts.master')
@section('title', __('general.Update service') )
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/app-assets/css/components.css') }}">

@endsection
@section('content')


    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('general.Update service')}}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('services.update',$service->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="name">{{__('general.title_ar')}}</label>
                                        <input
                                            value="{{old('title_ar',$service->title_ar)}}"
                                            name="title_ar"
                                            type="text"
                                            id="name"
                                            class="form-control form-control-sm @error('title_ar') is-invalid @else {{ old('title_ar') ? 'is-valid' : '' }} @enderror"
                                            placeholder="john"
                                            required
                                        />
                                        @error('title_ar')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="name_ar">{{__('general.title_en')}}</label>
                                        <input
                                            value="{{old('title_ar',$service->title_en)}}"
                                            name="title_en"
                                            type="text"
                                            id="title_en"
                                            class="form-control form-control-sm @error('title_en') is-invalid @else {{ old('title_en') ? 'is-valid' : '' }} @enderror"
                                            placeholder="john"
                                            required
                                        />
                                        @error('title_en')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="customFile">{{__('general.Image')}}</label>
                                        <div class="custom-file">
                                            <input
                                                value="{{$service->image}}"
                                                name="photo"
                                                type="file"
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

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="desc">{{__('general.Description in english')}}</label>
                                        <div class="form-label-group mb-0">
                                            <textarea
                                                name="desc"
                                                data-length="1000"
                                                class="form-control char-textarea @error('desc') is-invalid @else {{ old('desc') ? 'is-valid' : '' }} @enderror"
                                                id="textarea-counter"
                                                rows="3"
                                                placeholder="We design intuitive, engaging mobile apps...">{{$service->desc_en}}</textarea>
                                        </div>
                                        @error('desc')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="desc_ar">{{__('general.Description in arabic')}}</label>
                                        <div class="form-label-group mb-0">
                                            <textarea
                                                name="desc_ar"
                                                data-length="1000"
                                                class="form-control char-textarea @error('desc_ar') is-invalid @else {{ old('desc_ar') ? 'is-valid' : '' }} @enderror"
                                                id="textarea-counter"
                                                rows="3"
                                                placeholder="We design intuitive, engaging mobile apps...">{{$service->desc_ar}}</textarea>
                                        </div>
                                        @error('desc_ar')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <div class="form-group col-md-12">
                                          <button type="submit" class="btn btn-primary mr-1">{{__('general.Update')}}</button>
                                        <button type="reset" class="btn btn-outline-secondary">{{__('general.Reset')}}</button>
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
    <script>
        document.getElementById('customFile').addEventListener('change', function (e) {
            // Get the selected file name
            var fileName = e.target.files[0] ? e.target.files[0].name : '{{__('general.Choose file')}} ';
            // Update the label text
            e.target.nextElementSibling.textContent = fileName;
        });
    </script>


@stop
