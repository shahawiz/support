@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="container">


<div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">

                    <a data-toggle="collapse" href="#collapse-admin" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class=" d-block">
                            <i class="fa fa-chevron-down pull-right"></i>
                            Administration Menu
                        </a>
                </div>
                <div id="collapse-admin" class="collapse " aria-labelledby="heading-example">

                <div class="card-body">
                    <li class="li-admin"><a href="#"><span class="fa fa-home"></span> Home </a></li>
                   <hr>
                    <li class="li-admin"><a href="#"><span class="fa fa-cogs"></span> Site Settings </a></li>
                    <hr>
                    <li class="li-admin"><a href="#"><span class="fa fa-users"></span> Users </a></li>
                    <hr>
                    <li class="li-admin"><a href="#"><span class="fa fa-star"></span> Staff </a></li>
                    <hr>
                    <li class="li-admin"><a href="#"><span class="fa fa-building"></span> Departments </a></li>

              </div>
            </div>
            </div>
            <br>
            <div class="card">
                    <div class="card-header">

                            <a data-toggle="collapse" href="#collapse-tickets" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class=" d-block">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Tickets
                                </a>
                        </div>
                    <div id="collapse-tickets" class="collapse show" aria-labelledby="heading-example">

                    <div class="card-body">
                            <li class="li-admin"><a href="#"><span class="fas fa-list"></span> All Tickets </a></li>
                            <hr>
                             <li class="li-admin"><a href="#"><span class="fa fa-history"></span> Pending Tickets </a></li>
                             <hr>
                             <li class="li-admin"><a href="#"><span class="fa fa-check"></span> Answered Tickets </a></li>
                             <hr>
                             <li class="li-admin"><a href="#"><span class="fa fa-check-circle"></span> Sovled Tickets </a></li>
                  </div>
                </div>
            </div>

                <br>
                <div class="card">
                        <div class="card-header">

                                <a data-toggle="collapse" href="#collapse-kcenter" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class="collapsed d-block">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                       Knowledge Center
                                    </a>
                            </div>
                        <div id="collapse-kcenter" class="collapse " aria-labelledby="heading-example">

                        <div class="card-body">
                                <li class="li-admin"><a href="#"><span class="fas fa-list"></span> All Topics </a></li>
                                <hr>
                                 <li class="li-admin"><a href="#"><span class="fa fa-plus"></span> Add new topic </a></li>
                      </div>
                    </div>
                </div>


                    <br>
                <div class="card">
                        <div class="card-header">

                                <a data-toggle="collapse" href="#collapse-ans" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class="collapsed d-block">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                        Announcements                                    </a>
                            </div>
                        <div id="collapse-ans" class="collapse" aria-labelledby="heading-example">

                        <div class="card-body">
                                <li class="li-admin"><a href="#"><span class="fa fa-bullhorn"></span> All Announcements </a></li>
                                <hr>
                                 <li class="li-admin"><a href="#"><span class="fa fa-plus"></span> Add new</a></li>
                      </div>
                    </div>
                    </div>

                    <br>
                    <div class="card">
                            <div class="card-header">

                                    <a data-toggle="collapse" href="#collapse-downloads" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class="collapsed d-block">
                                            <i class="fa fa-chevron-down pull-right"></i>
                                            Downloads
                                        </a>
                                </div>
                            <div id="collapse-downloads" class="collapse" aria-labelledby="heading-example">
                            <div class="card-body">
                                    <li class="li-admin"><a href="#"><span class="fas fa-list"></span> All files </a></li>
                                    <hr>
                                     <li class="li-admin"><a href="#"><span class="fa fa-upload"></span> Add new file </a></li>
                          </div>
                        </div>
                        </div>

        </div>
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

                                                   <i class="fa fa-clock fa-4x "></i><br/>
                                                    <small class="text-secondary"> &nbsp;</small>
                                                    <span class="h1 font-weight-bold">33</span>
                                                    <span class="h5">Pending Tickets</span>
                                                </div>
                                            </div>
                                           </a>
                                        </div>
                                       <div class="col-xs-12 col-sm-6 col-md-4">
                                       <a href="{{route('pending_tickets')}}" class="text-body">
                                            <div class="card bg-light mb-3">
                                                <div class="card-body">
                                                        <i class="fa fa-check fa-4x"></i><br/>
                                                        <small class="text-secondary"> &nbsp;</small>
                                                        <span class="h1 font-weight-bold">4</span>
                                                        <span class="h5">Answered Tickets</span>
                                                </div>
                                            </div>
                                           </a>
                                        </div>
                                       <div class="col-xs-12 col-sm-6 col-md-4">
                                       <a href="{{route('solved_tickets')}}" class="text-body">
                                            <div class="card bg-light mb-3">
                                                <div class="card-body">
                                                        <i class="fa fa-handshake fa-4x "></i><br/>
                                                        <small class="text-secondary"> &nbsp;</small>
                                                        <span class="h1 font-weight-bold">73</span>
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

                                                    <i class="fa fa-users fa-4x "></i><br/>
                                                     <small class="text-secondary"> &nbsp;</small>
                                                     <span class="h1 font-weight-bold">330</span>
                                                     <span class="h5">Users</span>
                                                 </div>
                                             </div>
                                            </a>
                                         </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                        <a href="{{route('pending_tickets')}}" class="text-body">
                                             <div class="card bg-light mb-3">
                                                 <div class="card-body">
                                                         <i class="fas fa-ticket-alt fa-4x  "></i><br/>
                                                         <small class="text-secondary"> &nbsp;</small>
                                                         <span class="h1 font-weight-bold">403</span>
                                                         <span class="h5">Tickets</span>
                                                 </div>
                                             </div>
                                            </a>
                                         </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                        <a href="{{route('solved_tickets')}}" class="text-body">
                                             <div class="card bg-light mb-3">
                                                 <div class="card-body">
                                                         <i class="fa fa-star fa-4x "></i><br/>
                                                         <small class="text-secondary"> &nbsp;</small>
                                                         <span class="h1 font-weight-bold">3</span>
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

                                                    <i class="fa fa-file fa-4x "></i><br/>
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
                                                         <i class="fa fa-bullhorn fa-4x  "></i><br/>
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
                                                         <i class="fa fa-book fa-4x "></i><br/>
                                                         <small class="text-secondary"> &nbsp;</small>
                                                         <span class="h1 font-weight-bold">7</span>
                                                         <span class="h5">FAQs Topics</span>
                                                 </div>
                                             </div>
                                            </a>
                                         </div>


                                    </div>

                                </div>
                            </section>                </div>
                </div>
            </div>
        </div>


</div>
@endsection

