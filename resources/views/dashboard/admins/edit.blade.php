
@extends('dashboard.layouts.master')
@section('title', __('general.Update Admin') )
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
                        <h4 class="card-title">{{__('general.Update Admin')}} </h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('admins.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="name">{{__('general.Name in english')}}</label>
                                        <input
                                            value="{{$admin->name_en}}"
                                            name="name"
                                            type="text"
                                            id="name"
                                            class="form-control form-control-sm @error('name') is-invalid @else {{ old('name') ? 'is-valid' : '' }} @enderror"
                                            placeholder="john"
                                            required
                                        />
                                        @error('name')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="name_ar">{{__('general.Name in arabic')}}</label>
                                        <input
                                            value="{{$admin->name_ar}}"
                                            name="name_ar"
                                            type="text"
                                            id="name_ar"
                                            class="form-control form-control-sm @error('name_ar') is-invalid @else {{ old('name_ar') ? 'is-valid' : '' }} @enderror"
                                            placeholder="john"
                                            required
                                        />
                                        @error('name_ar')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="email">{{__('general.Email')}} </label>
                                        <input
                                            value="{{$admin->email}}"
                                            type="email"
                                            id="email"
                                            class="form-control form-control-sm @error('email') is-invalid @else {{ old('email') ? 'is-valid' : '' }} @enderror"
                                            name="email"
                                            placeholder="john@example.com"
                                            required
                                        />
                                        @error('email')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="password">{{__('general.Password')}} <small class="text-muted">({{ __('general.Optional') }})</small></label>
                                        <input
                                            name="password"
                                            type="password"
                                            id="password"
                                            class="form-control form-control-sm @error('password') is-invalid @else {{ old('password') ? 'is-valid' : '' }} @enderror"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        />
                                        @error('password')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="password_confirmation">{{__('general.Password confirmation')}}<small class="text-muted">({{ __('general.Optional') }})</small></label>
                                        <input
                                            type="password"
                                            id="password_confirmation"
                                            class="form-control form-control-sm @if(session('password_confirmation') && !session('errors')->has('password')) is-valid @endif"
                                            name="password_confirmation"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        />
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="customFile">{{__('general.Image')}} <small class="text-muted">({{ __('general.Optional') }})</small></label>
                                        <div class="custom-file">
                                            <input
                                                value="{{ old('photo') }}"
                                                name="photo"
                                                type="file"
                                                class="custom-file-input @error('photo') is-invalid @else {{ old('photo') ? 'is-valid' : '' }} @enderror"
                                                id="customFile"
                                            />
                                            <label class="custom-file-label" for="customFile">{{__('general.Choose file')}} </label>
                                        </div>
                                        @error('photo')
                                        <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary mr-1">{{__('general.Update')}} </button>
                                        <button type="reset" class="btn btn-outline-secondary">{{__('general.Reset')}} </button>
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
