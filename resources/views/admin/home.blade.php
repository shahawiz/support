@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <section class="services py-1 bg-light1 text-center">
                        <div class="container">
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="/tickets/create" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">

                                                <i class="fa fa-clock fa-4x "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                            <span class="h1 font-weight-bold">{{$stats['pendingTickets']}}</span>
                                                <span class="h5">Pending Tickets</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="{{route('pending_tickets')}}" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <i class="fa fa-check fa-4x"></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">{{$stats['answeredTickets']}}</span>
                                                <span class="h5">Answered Tickets</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="{{route('solved_tickets')}}" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <i class="fa fa-handshake fa-4x "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">{{$stats['solvedTickets']}}</span>
                                                <span class="h5">Solved Tickets</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="/tickets/create" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">

                                                <i class="fa fa-users fa-4x "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">{{$stats['users']}}</span>
                                                <span class="h5">Users</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="{{route('pending_tickets')}}" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <i class="fas fa-ticket-alt fa-4x  "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">{{$stats['allTickets']}}</span>
                                                <span class="h5">Tickets</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="{{route('solved_tickets')}}" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <i class="fa fa-star fa-4x "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">{{$stats['staff']}}</span>
                                                <span class="h5">Staff</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>


                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="/tickets/create" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">

                                                <i class="fa fa-file fa-4x "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">23</span>
                                                <span class="h5">Files</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="{{route('pending_tickets')}}" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <i class="fa fa-bullhorn fa-4x  "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">4</span>
                                                <span class="h5">Announcements</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="{{route('solved_tickets')}}" class="text-body">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <i class="fa fa-book fa-4x "></i><br />
                                                <small class="text-secondary"> &nbsp;</small>
                                                <span class="h1 font-weight-bold">7</span>
                                                <span class="h5">FAQs Topics</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
