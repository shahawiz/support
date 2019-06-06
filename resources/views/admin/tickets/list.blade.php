@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="container">


    <div class="row">
@include('sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

            </div>
        </div>
    </div>


</div>
@endsection
