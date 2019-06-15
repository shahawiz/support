@extends('layouts.app')
@section('title', 'Edit ticket')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <div class="container col-md-8 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">Edit Ticket</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <form method="post">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="form-group">
                            <label for="title" class="col-lg-12 control-label">Title</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $ticket->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-lg-12 control-label">Content</label>
                            <div class="col-lg-12">
                                <textarea class="form-control" id="summernote" rows="3" id="content" name="content">{{ $ticket->content }}</textarea>
                                <span class="help-block">Feel free to ask us any question.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="closed" {{ $ticket->status == 'Closed' ? "checked":""}} > Close this ticket?
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ action('TicketsController@destroy',$ticket->slug)}}" class="btn btn-danger">Delete</a>

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
                  height: 300,
                  toolbar: [
                    ['font', ['bold', 'underline']],
                    ['color', ['color']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'help']],
                ],
                });

              </script>
    </div>

@endsection
