@extends('layouts.app')
@section('title', 'Change Profile Picture')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Change Avatar</div>

                <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Success</strong> {{session('status')}}
                        </div>
                    @endif



                    <form method="POST" enctype="multipart/form-data" action="{{ route('update_avatar') }}">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                                <div class="row">

                                 <div class="col-md-12 text-center">
                            <div class="form-group">
                            <img src="{{asset('images/avatars/'."$user->avatar")}}" style="width: 160px;" class="img-fluid rounded-circle" alt="">
                            <h5 id="username" style="margin:0 auto">{{$user->name}}</h5>
                        </div>
                        </div>

                    </div>
            <div class="row">
                <div class="col-md-12 text-center ">
                    <br>
                        <input type="file" name="image" class="text-center center-block well well-sm">
                </div>
            </div>





                    </div>
                </div>
<hr/>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn btn-primary ">
                                 Change Avatar
                            </button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
