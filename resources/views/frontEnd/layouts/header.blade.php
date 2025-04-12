@php
    $services = \App\Models\Service::all();
@endphp
<header id="header" class="header-section">
    <div class="container">
        <div class="header">
            <a href="{{url('/#')}}" class="logo">
                <img loding="lazy" src="{{asset('frontEnd/images/logo.svg')}}" />
            </a>
            <div class="overlay"></div>
            <nav class="navbar" id="fixedNavbar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'front.index' ? 'active' : '' }}" href="{{url(app()->getLocale().'/#')}}"> {{__('front.Home')}} </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url(app()->getLocale().'/#services')}}" class="nav-link drop-link {{ request()->is('*service*') ? 'active' : '' }} "> {{__('front.Services')}} </a>
                        <div class="drop-down"
                             style="min-width: 180px"
                        >
                            @foreach($services as $service)
                                <a href="{{route('front.service.show', ['id'=> $service->id , 'name' => $service->name_en ])}}"> {{app()->getLocale() == 'ar' ? $service->name_ar : $service->name_en }} </a>
                            @endforeach

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(app()->getLocale().'/#work') }}"> {{__('front.PROJECTS')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'front.about' ? 'active' : '' }} " href="{{route('front.about')}}"> {{__('front.About Us')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'front.blogs' ? 'active' : '' }}" href="{{route('front.blogs' )}}"> {{__('front.Blogs')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'front.contact' ? 'active' : '' }}" href="{{route('front.contact' )}}"> {{__('front.Contact Us')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(app()->getLocale().'/#FAQs') }}">{{__('front.FAQs')}}</a>
                    </li>
                </ul>
            </nav>
            <div class="header-btn">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode != LaravelLocalization::getCurrentLocale())

                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar') }}" class="lang-ancor">
                            {{ LaravelLocalization::getCurrentLocale() === 'ar' ? 'EN' : 'AR' }}
                        </a>
                    @endif
                @endforeach

                <button class="menu-btn">
              <span class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
              </span>
                </button>
            </div>
        </div>
    </div>
</header>
