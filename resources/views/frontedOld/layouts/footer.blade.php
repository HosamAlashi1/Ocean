@php
    $data = \App\Models\Setting::whereIn('key_id', ['instagram', 'twitter','facebook', 'Linkedin','youtube'])->pluck('value', 'key_id')->toArray();
@endphp
<footer class="footer">
    <div class="footer-content">
        <!-- Footer Navigation Links -->
        <div class="footer-links">
            <a href="{{route('front.services')}}" target="_blank">{{__('front.Works')}}</a>
            <a href="{{route('front.services')}}" target="_blank">{{__('front.Services')}}</a>
            <a href="{{route('front.contact')}}" target="_blank">{{__('front.Contact us')}}</a>
            <a href="#">Careers</a>
        </div>

        <!-- Social Media Icons -->
        <div class="social-icons">
            <a href="{{$data['instagram']}}" class="icon" target="_blank">
                <img src="{{asset('img/InstagramIcon.svg')}}" alt="Instagram Icon">
            </a>
            <a href="{{$data['facebook']}}" class="icon" target="_blank">
                <img src="{{asset('img/FacebookIcon.svg')}}" alt="Facebook Icon">
            </a>
            <a href="{{$data['Linkedin']}}" class="icon" target="_blank">
                <img src="{{asset('img/LinkedinIcon.svg')}}" alt="LinkedIn Icon">
            </a>
            <a href="{{$data['twitter']}}" class="icon" target="_blank">
                <img src="{{asset('img/X.svg')}}" alt="Twitter Icon">
            </a>
            <a href="{{$data['youtube']}}" class="icon" target="_blank">
                <img src="{{asset('img/YoutubeIcon.svg')}}" alt="YouTube Icon">
            </a>
        </div>

        <!-- Copyright and Legal Links -->
        <div class="footer-bottom">
            <span>Copyright © {{date('Y')}}</span>
            <a href="{{route('front.terms')}}" target="_blank">{{__('front.Terms & Conditions')}}</a>
            <a href="#">{{__('front.')}}Privacy</a>
        </div>
    </div>
</footer>


