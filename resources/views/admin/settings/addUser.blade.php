@extends('layouts.app')
@section('title','Admin | Add User')

@section('content')
<script src="{{asset('assets/passcheck/password.min.js')}}"></script>
<script src="{{asset('assets/passcheck/password.min.css')}}"></script>

<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard <i class="fa fa-chevron-right"></i>Add {{$pageName}}s

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <section class="services py-1 bg-light1 text-center">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12">


                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    <form method="POST" action="{{ route('admin_createUser') }}">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>


                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                                            <div class="col-md-8">
                                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                                                <small>e.g. +1 541 754 3010</small>
                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>


                                    </div>
                                    <!-- 2nd Col -->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                            <div class="col-md-6">
                                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                                @if ($errors->has('city'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="state" class="col-md-4 col-form-label text-md-right">State/Region</label>

                                            <div class="col-md-6">
                                                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" required autofocus>

                                                @if ($errors->has('state'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('state') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="zip" class="col-md-4 col-form-label text-md-right">Zip Code</label>

                                            <div class="col-md-6">
                                                <input id="zip" type="number" class="form-control{{ $errors->has('zio') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip') }}" required autofocus>

                                                @if ($errors->has('zip'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('zip') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                  <select class="form-control" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" id="country" required autofocus>
                                                      @foreach ($countries as $country)
                                                  <option value="{{$country}}">{{$country}}</option>
                                                      @endforeach

                                                  </select>
                                                </div>

                                                @if ($errors->has('country'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('country') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>


                                    </div>
                                </div>
                <hr/>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-3">
                                            <button type="submit" class="btn btn-primary ">
                                                Save User
                                            </button>
                                        </div>
                                    </div>

                                    </form>

                                </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="{{asset('assets/phone/js/intlTelInput.js')}}"></script>
<script>
var input = document.querySelector("#phone");
window.intlTelInput(input, {
  initialCountry: "auto",
  nationalMode:false,
  autoHideDialCode:true,
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  },
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js" // just for formatting/placeholders etc
});
$('#password').password({   showPercent: true,strongPass: ' Yup, you made it 😁',showPercent: true,
  showText: true,animate: true,
});

</script>
@endsection
