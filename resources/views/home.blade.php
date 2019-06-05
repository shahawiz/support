@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">



        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="services py-5 bg-light1 text-center">
                        <div class="container">
                           <div class="row">
                               @if(Auth::check())
                               <div class="col-xs-12 col-sm-6 col-md-3">
                                   <a href="/tickets/create" class="text-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                           <i class="fas fa-ticket-alt fa-4x "></i></br>
                                            <small class="text-secondary"> &nbsp;</small>
                                            <h5>New Ticket</h5>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                               <div class="col-xs-12 col-sm-6 col-md-3">
                               <a href="{{route('pending_tickets')}}" class="text-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                           <i class="fa fa-history fa-4x "></i></br>
                                            <small class="text-secondary">&nbsp;</small>
                                            <h5>Pending Tickets</h5>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                               <div class="col-xs-12 col-sm-6 col-md-3">
                               <a href="{{route('solved_tickets')}}" class="text-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                           <i class="fa fa-check-circle fa-4x "></i></br>
                                            <small class="text-secondary">&nbsp;</small>
                                            <h5>Solved Tickets</h5>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                                @endif
                               <div class="col-xs-12 col-sm-6 col-md-3">
                                   <a href="#" class="text-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                           <i class="fa fa-cubes fa-4x "></i></br>
                                            <small class="text-secondary">FAQs</small>
                                            <h5>Knowledge Center</h5>
                                        </div>
                                    </div>
                                   </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <a href="#" class="text-body">
                                     <div class="card bg-light mb-3">
                                         <div class="card-body">
                                            <i class="fa fa-rss fa-4x "></i></br>
                                            <small class="text-secondary">Latest updates</small>
                                            <h5>Announcements</h5>
                                         </div>
                                     </div>
                                    </a>
                                 </div>
                                 <div class="col-xs-12 col-sm-6 col-md-3">
                                    <a href="#" class="text-body">
                                     <div class="card bg-light mb-3">
                                         <div class="card-body">
                                            <i class="fa fa-download fa-4x "></i></br>
                                            <small class="text-secondary">Manuals, programs, and other files</small>
                                            <h5>Downloads</h5>
                                         </div>
                                     </div>
                                    </a>
                                 </div>
                                 <div class="col-xs-12 col-sm-6 col-md-3">
                                    <a href="#" class="text-body">
                                     <div class="card bg-light mb-3">
                                         <div class="card-body">
                                            <i class="fa fa-envelope fa-4x "></i></br>
                                            <small class="text-secondary">Pre-Sales Contact Us</small>
                                            <h5>Contact Us</h5>
                                         </div>
                                     </div>
                                    </a>
                                 </div>
                                 @if (Auth::check())
                                 <div class="col-xs-12 col-sm-6 col-md-3">
                                 <a href="{{route('profile')}}" class="text-body">
                                     <div class="card bg-light mb-3">
                                         <div class="card-body">
                                            <i class="fa fa-user fa-4x "></i></br>
                                         <small class="text-secondary">

                                             {{Auth::user()->name}}

                                         </small>
                                             <h5>Edit Profile</h5>
                                         </div>
                                     </div>
                                    </a>
                                 </div>


                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="{{ route('logout') }}" class="text-body"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                             <div class="card bg-light mb-3">
                                 <div class="card-body">
                                    <i class="fas fa-sign-out-alt fa-4x "></i></br>
                                 <small class="text-secondary">&nbsp;
                                 </small>
                                     <h5>Logout</h5>
                                 </div>
                             </div>
                            </a>
                         </div>

                        @endif

                           </div>


                        </div>
                    </section>                </div>
            </div>
        </div>


    </div>
</div>
@endsection

