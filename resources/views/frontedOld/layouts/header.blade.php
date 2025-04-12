<!-- Navbar -->
@php
    $data = \App\Models\Setting::whereIn('key_id', ['instagram', 'twitter','facebook', 'Linkedin','youtube'])->pluck('value', 'key_id')->toArray();
@endphp
<nav class="heading-container">
    <a class="navbar-brand" href="{{route('front.index')}}"><img src="{{asset('img/black logo.svg')}}"/></a>
    <div class="navbar-right">

        <a href="{{route('front.contact')}}" class="btn btn-info heading-button">
            {{__('front.Connect with us')}}
        </a>
        <div class="switch">
            <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox" onchange="toggleLanguage()"
                {{ app()->getLocale() === 'ar' ? 'checked' : '' }}>
            <label for="language-toggle"></label>
            <span class="on">EN</span>
            <span class="off">AR</span>
        </div>

        <div class="dropup">
            <img src="{{asset('img/Frame.svg')}}" alt="icon" class="dropbtn" />
            <div class="dropup-content">
                <div class="menu-head">
                    <div class="switch-menu">
                        <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox" onchange="toggleLanguage()">
                        <label for="language-toggle"></label>
                        <span class="on">EN</span>
                        <span class="off">AR</span>
                    </div>
                    <form id="form" action="{{route('front.contact')}}" method="get">
                        @csrf
                        <button class="heading-button"><img src="{{asset('img/ArrowRight.svg')}}" class="menu-button" alt="icon"/>{{__('front.Start A New Project')}}</button>
                    </form>
                    <div class="close-icon" onclick="closeDropup()">X</div>
                </div>
                <a href="{{route('front.index')}}">{{__('front.Home')}}</a>
                <a href="{{route('front.services')}}">{{__('front.Services')}}</a>
                <a href="{{route('front.services')}}">{{__('front.Works')}}</a>
                <a href="{{route('front.about')}}">{{__('front.About Us')}}</a>
                <a href="{{route('front.blogs')}}">{{__('front.Blogs')}}</a>
                <a href="{{route('front.contact')}}">{{__('front.Contact Us')}}</a>
{{--                <a href="{{route('front.terms')}}">{{__('front.Terms & Conditions')}}</a>--}}
                <p class="menu-follow">Follow us on</p>
                <div class="social-icons-menu">
                    <a href="{{$data['instagram']}}" target="_blank"><img src="{{asset('img/InstagramIcon1.svg')}}" alt="Instagram"></a>
                    <a href="{{$data['facebook']}}" target="_blank"><img src="{{asset('img/FacebookIcon1.svg')}}" alt="Facebook"></a>
                    <a href="{{$data['Linkedin']}}" target="_blank"><img src="{{asset('img/LinkedinIcon1.svg')}}" alt="LinkedIn"></a>
                    <a href="{{$data['twitter']}}" target="_blank"><img src="{{asset('img/X1.svg')}}" alt="Twitter"></a>
                    <a href="{{$data['youtube']}}" target="_blank"><img src="{{asset('img/YoutubeIcon1.svg')}}" alt="YouTube"></a>
                </div>
            </div>
        </div>
    </div>
</nav>
