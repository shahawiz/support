@extends('layouts.app')
@section('title', 'All Notifications')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Notifications</div>

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

                    <div class="col-sm-9 col-md-12">

                        <div class="list-group">
                                @if ($user->notifications->isEmpty())
                                <div class="empty text-center" >
                                    <i style="color:#80808045;" class="far fa-smile-beam fa-7x"></i>
                                    <br>
                                    <br>
                                <h5>There is no notifications there.</h5>
                                </div>


                            @else
                            @foreach ($user->notifications as $notification)
                            <a href="{{route('view_ticket',$notification->data['ticketSlug'])}}" class="list-group-item {{ $notification->read_at != NULL ? 'read' :'unread' }}">
                                    <img src="{{asset('images/avatars/'.getUserAvatar($notification->data['replyOwnerId']))}}" class="notification-img" />
                                    <span class="">{{$notification->data['msg']}} by <strong>{{getUserName($notification->data['replyOwnerId'])}}</strong></span>
                                    <span class="badge float-right "> <i class="fa fa-clock"></i>{{$notification->created_at->diffForHumans()}}</span>

                                    </a>
                            @endforeach
                            @endif

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
