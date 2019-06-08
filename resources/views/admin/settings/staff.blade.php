@extends('layouts.app')
@section('title','Admin | Staff')

@section('content')
<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard <i class="fa fa-chevron-right"></i> {{$pageName}}
                <div class="float-right"> <a href="{{route('admin_createUser')}}" class="btn btn-dark"><i class="fa fa-plus"></i> Add {{$pageName}}</a></div>

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

                                    <br>
                                    @if ($staffList->isEmpty())
                                    <div class="empty text-center" >
                                        <i style="color:#80808045;" class="far fa-smile-beam fa-7x"></i>
                                        <br>
                                        <br>
                                    <h5>There is no staff there.<br><small>You can Add new user and choose the role to be staff</small> </h5>
                                    </div>


                                @else
                                <input class="form-control dash-search" id="myInput" type="text" placeholder="Search..">

                                    <table id="table" class="table table-hover table-responsive">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Joined on</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($staffList as $user)
                                            <tr>
                                            <th scope="row">{{$user->name}}</th>
                                                    <td>{{$user->email}}</td>
                                                    <td><img src="{{asset('images/avatars/'.$user->avatar)}}" width="50px" class="img-fluid rounded-circle" alt="">
                                                    </td>
                                                    <td><small>{{$user->created_at}}</small></td>
                                                    <td>
                                                         <a href="" title="Edit" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                         <a href="" title="Suspend" class="btn btn-dark"><i class="fa fa-hand-stop-o"></i></a>
                                                         <a href="" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                  </tr>
                                            @endforeach

                                        </tbody>
                                      </table>
                                      @endif
                                      <script>
                                        $(document).ready(function(){
                                        $("#myInput").on("keyup", function() {
                                            var value = $(this).val().toLowerCase();
                                            $("#table tr").filter(function() {
                                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                            });
                                        });
                                        });
                                      </script>
                                </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
