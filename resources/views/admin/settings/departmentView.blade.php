@extends('layouts.app')
@section('title','Admin | Edit Department')

@section('content')
<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard <i class="fa fa-chevron-right"></i> Departments <i class="fa fa-chevron-right"></i> {{$department->title}}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </div>
                    @endif
                    <section class="services py-1 bg-light1 text-center">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12">
                                <form action="{{route('admin_updateDepartment',$department->id)}}" method="POST">
                                    @method('put')
                                    @csrf
                                        <div class="form-group row">
                                          <label for="title" class="col-4 col-form-label">Department Name</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-building-o"></i>
                                                </div>
                                              </div>
                                            <input id="title" name="title" value="{{$department->title}}" placeholder="i.e. Sales and Billing" type="text" class="form-control" required="required" aria-describedby="titleHelpBlock">
                                            </div>
                                            <span id="titleHelpBlock" class="form-text text-muted">Use a unique department name to make tickets organized and to make it easy for your clients while creating a ticket.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="desc" class="col-4 col-form-label">Description</label>
                                          <div class="col-8">
                                            <textarea id="desc" name="desc" cols="40" rows="5" aria-describedby="descHelpBlock" class="form-control">{{$department->desc}}</textarea>
                                            <span id="descHelpBlock" class="form-text text-muted">A short description will appear beside department name.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Update</button>
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

@endsection
