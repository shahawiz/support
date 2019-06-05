@extends('layouts.app')
@section('title', 'Create a Ticket')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Create a Ticket</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <form method="POST" >
                    @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
                    @endforeach

                    @if (session('status'))
                <div class="alert alert-success">{{session('status.msg')}} | <a href="/tickets/view/{{session('status.ticket_id')}}"><b>View Ticket</b></a></div>
                    @endif

                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="title" class="col-lg-12 control-label">Subject</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                        </div>
                <div class="form-inline">
                                <label class="mr-sm-2" for="Department">Department</label>
                                <select class="form-control col-lg-3 " name="department" id="department">
                                    @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                                    @endforeach

                                </select>
                                <div class="col-md-1"></div>
                                <label class="mr-sm-2" for="Department">Priority</label>
                                <select class="form-control col-lg-3" name="priority" id="priority">
                                    @for ($i = 0; $i < count($priorities); $i++)
                                       <option value="{{$i+1}}">{{$priorities[$i]}}</option>
                                    @endfor


                                </select>
                </div>
                <br>
                        <div class="form-group">
                            <label for="content"  class="col-lg-12 control-label">Content</label>
                            <div class="col-lg-12">
                                <textarea class="form-control" id="summernote" rows="3" name="content" ></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                            <a class="btn btn-danger" href="{{route('home')}}" >Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <script>
                $('#summernote').summernote({
                  placeholder: 'Feel free to ask us any question',
                  tabsize: 2,
                  height: 300
                });
              </script>
    </div>
@endsection
