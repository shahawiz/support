@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard <i class="fa fa-chevron-right"></i> Site Setting</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <section class="services py-1 bg-light1 text-center">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-9">

                                </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
