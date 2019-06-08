@extends('layouts.app')
@section('title','Admin | Departments')

@section('content')
<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard <i class="fa fa-chevron-right"></i> {{$pageName}}s
                <div class="float-right"> <button class="btn btn-dark" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add {{$pageName}}</button></div>

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

                                    <br>
                                    @if ($departmentsList->isEmpty())
                                    <div class="empty text-center" >
                                        <i style="color:#80808045;" class="far fa-smile-beam fa-7x"></i>
                                        <br>
                                        <br>
                                    <h5>There is no departments there.<br><small>You can Add new department to make it organized for tickets.</small> </h5>
                                    </div>


                                @else
                                <input class="form-control dash-search" id="myInput" type="text" placeholder="Search..">

                                    <table id="table" class="table table-hover table-responsive" >
                                        <thead>
                                          <tr>
                                            <th width="25%">Name</th>
                                            <th width="25%">Description</th>
                                            <th width="50%">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($departmentsList as $department)
                                            <tr>
                                            <th scope="row">{{$department->title}}</th>
                                                    <td>{{$department->desc}}</td>
                                                    <td style="display: inline-flex;">
                                                    <a href="{{route('admin_viewDepartment',$department->id)}}" title="Edit" class="btn btn-info"><i class="fa fa-pencil"></i></a>&nbsp;
                                                    <form action="{{route('admin_deleteDepartment',$department->id)}}" method="POST">
                                                        {{method_field('DELETE')}}
                                                        @csrf
                                                         <button type="submit" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
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

<!-- The Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add {{$pageName}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{route('admin_createDepartment')}}" method="POST" id="addForm">
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
                      <input id="title" name="title" placeholder="e.g. Sales and Billing" type="text" class="form-control" required="required" aria-describedby="titleHelpBlock">
                    </div>
                    <span id="titleHelpBlock" class="form-text text-muted">Use a unique department name to make tickets organized and to make it easy for your clients while creating a ticket.</span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="desc" class="col-4 col-form-label">Description</label>
                  <div class="col-8">
                    <textarea id="desc" name="desc" cols="40" rows="5" aria-describedby="descHelpBlock" class="form-control"></textarea>
                    <span id="descHelpBlock" class="form-text text-muted">A short description will appear beside department name.</span>
                  </div>
                </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="saveBtn" type="submit" class="btn btn-success" >Add</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <script>
var form = document.getElementById("addForm");

document.getElementById("saveBtn").addEventListener("click", function () {
  form.submit();
});
</script>
@endsection
