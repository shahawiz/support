<div class="footer-social text-center mt-5 footer">
    <ul>
        @if($facebook)
        <li class="footer-social__list-item">
            <a rel="nofollow" href="{{$facebook}}"><i class="fa fa-2x fa-facebook"></i></a>
          </li>
         @endif
         @if($twitter)
        <li class="footer-social__list-item">
            <a rel="nofollow" href="{{$twitter}}"><i class="fa fa-2x fa-twitter"></i></a>
        </li>
        @endif
        @if($linkedin)
        <li class="footer-social__list-item">
          <a rel="nofollow" href="{{$linkedin}}"><i class="fa fa-2x fa-linkedin"></i></a>
        </li>
        @endif
        <br><br><span class="text-center">&copy; {{ date('Y') }} {{ $copyrights }}. All copyrights reserved.</span>

    </ul>

  </div>

<audio id="notifiy_sound" >
<source src="{{asset('assets/new.mp3')}}" type="audio/mpeg" >
  </audio>

<script defer src="{{asset('js/notifiy.js')}}"></script>
