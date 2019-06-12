@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="container">


    <div class="row">
@include('admin.sidebar')
        <div class="col-md-9">
            <div class="card">
            <div class="card-header">Tickets <i class="fa fa-chevron-right"></i> {{$pageName}} Tickets</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if ($tickets->isEmpty())
                    <div class="empty text-center" >
                        <i style="color:#80808045;" class="far fa-smile-beam fa-7x"></i>
                        <br>
                        <br>
                    <h5>There is no tickets there , <a href="{{route('create_ticket')}}" style="color: #1d68a7;text-decoration: underline;"> open</a> new ticket :)</h5>
                    </div>


                @else
                <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for tickets..">

                    <table class="table table-striped" id="ticketsList" >
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="25%">Subject</th>
                            <th width="15%">Status</th>
                            <th width="12.5%">Department</th>
                            <th width="12.5%">Last Update</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="{{$ticket->status === "Answered" ? "Answered":""}}">
                                <td>#{{ $ticket->id }} </td>
                            <td><a href="{{action ('TicketsController@show',$ticket->slug)}}">{{ $ticket->title }}</a></td>
                                <td>
                                    @switch($ticket->status)
                                    @case('Pending')
                                        <div class="status status-pending" >Pending
                                        @break
                                    @case('Answered')
                                         <div class="status status-answered">Answered
                                        @break
                                    @case('Solved')
                                       <div class="status status-solved" >Solved
                                        @break
                                @endswitch
                            </div>
                                </td>
                                <td>
                                    {{$ticket->department->title}}
                                </td>
                                <td>
                                    {{$ticket->updated_at->diffForHumans()}}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>


</div>
@endsection
