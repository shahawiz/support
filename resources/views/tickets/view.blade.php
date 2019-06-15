@extends('layouts.app')


@section('title','View Ticket #'.$ticket->id)
@section('content')
<link rel="stylesheet" href="{{asset('css/viewTicket-style.css')}}">

    <div class="container col-md-8 col-md-offset-2 mt-5">
<div class="row">
<div class="col-md-9 text-left">        <h3 class=""><i class="fas fa-ticket-alt"></i> {{ $ticket->title }}</h3><br>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<div class="col-md-3">
<div class="btn-group">
    @if(Auth::user()->user_role == 2 || Auth::user()->user_role == 3)
    @if($ticket->status != 'Solved')
    <a href="{{ route('mark_as_solved',$ticket->slug)}}" class="btn btn-success">Mark as Solved</a>
    @endif
    @endif
    @if(count($comments) < 1 && $ticket->user_id == Auth::user()->id)
    <a href="{{ action('TicketsController@edit',$ticket->slug)}}" class="btn btn-primary">Edit Ticket</a>
    @endif
</div>

</div>

</div>
        <div class="card">

            <div class="card-header ">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fas fa-clock"></i> <strong>Opened at :</strong> {{$ticket->created_at->diffForHumans()}}
                    </div>
                    <div class="col-md-2">
                            <p> <i class="fas fa-info"></i> <strong>Status</strong>:
                            @switch($ticket->status)
                                @case('Pending')
                                    <strong style="color:grey">Pending
                                    @break
                                @case('Answered')
                                     <strong style="color:midnightblue">Answered
                                    @break
                                @case('Solved')
                                   <strong style="color:green">Solved
                                    @break
                            @endswitch
                        </strong>
                            </p>

                    </div>

                    <div class="col-md-3">
                        <i class="fas fa-flag"></i> <strong>Priority :</strong>
                         @if ($ticket->priority === 'Low')
                             <span style="color:gray">
                         @elseif($ticket->priority === 'Noraml')
                             <span style="color:blue">
                         @elseif($ticket->priority === 'High')
                            <span style="color:darkred">
                         @elseif($ticket->priority === 'Very High')
                            <span style="color:red">
                         @endif
                         {{$ticket->priority}}</span>
                    </div>
                    <div class="col-md-4">
                            <i class="fas fa-building"></i> <strong>Department :</strong> {{$ticket->department->title}}
                            </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">

                    <ul class="comment-section">

                            <li class="comment user-comment">

                                <div class="info">
                                <a href="#">{{$ticket->user->name}}</a>
                                <h6 class="font-weight-bold " style="color: #2136bf;" >Client</h6>
                                <span> {{$ticket->created_at->diffForHumans()}} </span>
                                </div>

                                <a class="avatar" href="#">
                                <img src="{{asset('images/avatars/'.$ticket->user->avatar)}}" width="35" alt="Profile Avatar" title="{{$ticket->user->name}}" />
                                </a>

                                <p>{!! $ticket->content !!}</p>

                            </li>

                           @foreach ($comments as $comment)
                        <li class="comment {{ $comment->user->user_role === 1 ? "user":"staff" }}-comment">

                                <div class="info">
                                <a href="#">{{$comment->user->name}}</a>
                                @if ($comment->user->user_role === 1)
                                <h6 class="font-weight-bold " style="color: #2136bf;" >Client</h6>
                                @else
                                <h6 class="font-weight-bold " style="color: #0cab16;" >Staff</h6>

                                @endif
                                    <span> {{$comment->created_at->diffForHumans()}} </span>
                                </div>

                                <a class="avatar" href="#">
                                <img src="{{asset('images/avatars/'.$comment->user->avatar)}}" width="35" alt="Profile Avatar" title="{{$comment->user->name}}" />
                                </a>

                            <p >{!! $comment->content !!}</p>

                            </li>
                           @endforeach

                        </ul>
                        @if($ticket->status == 'Solved')
                        <div class="d-flex">
                            <hr class="my-auto flex-grow-1 solved_hr">
                            <h5 class="solved_ticket">Solved Ticket</h5>
                            <hr class="my-auto flex-grow-1 solved_hr">
                        </div>
                        @elseif($ticket->status == 'Closed')
                        <div class="d-flex">
                            <hr class="my-auto flex-grow-1 closed_hr">
                            <h5 class="closed_ticket">Closed Ticket</h5>
                            <hr class="my-auto flex-grow-1 closed_hr">
                        </div>

                        @else
            <!-- Reply Section Start -->
            <div class="d-flex">
                <hr class="my-auto flex-grow-1">
                <h5 class="text-bold">Reply This Ticket</h5>
                <hr class="my-auto flex-grow-1">
            </div>

            <!-- the comment box -->
            <div class="write-new">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success : </strong>{{session('status')}}
                    </div>
                @endif


                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>

                @endforeach

                <form role="form" action="/comment" method="POST">
                <input type="hidden" name="ticket_id" value="{{$ticket->id}}" />
                @csrf
                    <div class="form-group">
                        <textarea class="form-control" id="summernote" name="content" rows="4"></textarea>
                    </div>
                    <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Add Reply</button>
                </form>
            </div>
            <!-- Add Reply Section End -->
                        @endif


</div>

</div>
</div>
<script>
    $('#summernote').summernote({

      placeholder: 'Feel free to ask us any question',
      tabsize: 2,
      height: 250,
      toolbar: [
        ['font', ['bold', 'underline']],
        ['color', ['color']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen']],
    ],
    });

  </script>
@endsection
