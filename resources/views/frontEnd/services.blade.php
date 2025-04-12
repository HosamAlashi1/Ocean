@extends('frontEnd.layouts.master')
@section('title','Services | ' . (App::getLocale() == 'ar' ? $service->name_ar : $service->name_en))
@section('description',App::getLocale() == 'ar' ? $service->desc_ar : $service->desc_en)
@section('css')
    <style>
        .pagination-container {
            display: flex;
            justify-content: center; /* وضع الترقيم في الوسط */
            margin: 20px 0;
        }

        .pagination {
            display: inline-flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #21d0ed; /* اللون الأساسي */
            background-color: transparent; /* إزالة الخلفية */
            border: none; /* إزالة الحدود */
            font-weight: bold; /* جعل النص أكثر وضوحًا */
            transition: all 0.3s ease;
        }

        .pagination li a:hover {
            color: #fff; /* لون النص عند التحويم */
            background-color: #21d0ed; /* اللون الأساسي عند التحويم */
            border-radius: 50%; /* جعل الروابط مستديرة قليلاً */
        }

        .pagination li.active span {
            color: #fff; /* لون النص للصفحة النشطة */
            background-color: #21d0ed; /* اللون الأساسي للصفحة النشطة */
            border-radius: 50%;
        }

        .solution-section {
            margin-bottom: 60px;
        }
    </style>
@endsection
    @section('content')
    <section class="content-section">
      <div class="container">
        <h2 class="page-title">{{ App::getLocale() == 'ar' ? $service->name_ar : $service->name_en }}</h2>
        <p class="page-pargh">
            {{ App::getLocale() == 'ar' ? $service->desc_ar : $service->desc_en }}
        </p>
        <div class="service-section">
          <div class="service-content">
            <h3 class="service-title">
               {{ App::getLocale() == 'ar' ? $service->title_ar : $service->title_en }}
            </h3>
            <div style="color: #fff">
                {!!  App::getLocale() == 'ar' ? $service->content_ar : $service->content_en !!}
            </div>
          </div>
          <div class="service-img">
            <figure>
              <img src="{{asset('frontEnd/images/programming.gif')}}" alt="{{ App::getLocale() == 'ar' ? $service->title_ar : $service->title_en }}" srcset="" />
            </figure>
          </div>
        </div>

{{--          @if($solution_services->count() > 0)--}}
{{--        <div class="solution-section">--}}
{{--          <h5 class="solution-head" style="margin-bottom: 20px !important;">{{__('front.Innovative Software Solutions')}}</h5>--}}
{{--            <div style="color: #fff " class="mb-5" >--}}
{{--                {!!  App::getLocale() == 'ar' ? $service->content_ar : $service->content_en !!}--}}
{{--            </div>--}}
{{--          <div class="solution-cont">--}}
{{--              @foreach($solution_services as $solution_service)--}}
{{--            <div class="solution-item">--}}
{{--              <h6 class="solution-title">--}}
{{--                  {{ App::getLocale() == 'ar' ? $solution_service->title_ar : $solution_service->title_en }}--}}
{{--              </h6>--}}
{{--              <p class="solution-pargh">--}}
{{--                  {{ App::getLocale() == 'ar' ? $solution_service->desc_ar : $solution_service->desc_en }}--}}
{{--              </p>--}}
{{--            </div>--}}
{{--              @endforeach--}}

{{--          </div>--}}
{{--        </div>--}}
{{--          @endif--}}
          @foreach($service_details as $service_detail)
              <div class="solution-section">
                  <h5 class="solution-head" style="margin-bottom: 20px !important;">{{App::getLocale() == 'ar' ? $service_detail->title_ar : $service_detail->title_en}}</h5>
                  <div style="color: #fff " class="mb-5" >
                      {{  App::getLocale() == 'ar' ? $service_detail->desc_ar : $service_detail->desc_en }}
                  </div>
                  <div class="solution-cont">
                      @foreach($service_detail->softwareSolutionServices as $solution_service)
                          <div class="solution-item">
                              <h6 class="solution-title">
                                  {{ App::getLocale() == 'ar' ? $solution_service->title_ar : $solution_service->title_en }}
                              </h6>
                              <p class="solution-pargh">
                                  {{ App::getLocale() == 'ar' ? $solution_service->desc_ar : $solution_service->desc_en }}
                              </p>
                          </div>
                      @endforeach

                  </div>
              </div>
            @endforeach
          @if($works->count() > 0)
        <div class="rest-work-secction">

          <h6 class="rest-work-head">{{__('front.rest of the work')}}</h6>
          <div class="work-tab">
              @foreach($works as $work)
                  <a  class="work-item">
                      <figure>
                          <img loding="lazy" src="{{asset($work->images->first()->image)}}" alt="icon" />
                      </figure>
                  </a>
              @endforeach
          </div>
                <div class="pagination-container page-title">
                    {{ $works->links('pagination::bootstrap-4') }}
                </div>
        </div>
          @endif
      </div>
    </section>
@endsection
