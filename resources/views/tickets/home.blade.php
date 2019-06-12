@extends('layouts.app')
@section('title', 'View All '.$pageName.' Tickets')
@section('content')


    <div class="container col-md-10 col-md-offset-2 mt-5">
        <div class="card">
            <div class="card-header ">
                <h5 class="float-left font-weight-bold">My Tickets</h5>
                <div class="clearfix"></div>
            </div>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                <strong>Success : </strong> {{session('status.msg')}}
            </div>
            @endif


            <div class="card-body mt-2">
                @if ($tickets->isEmpty())
                    <div class="empty text-center" >
                        <i style="color:#80808045;" class="far fa-smile-beam fa-7x"></i>
                        <br>
                        <br>
                    <h5>There is no tickets there , <a href="{{route('create_ticket')}}" style="color: #1d68a7;text-decoration: underline;"> open</a> new ticket :)</h5>
                    </div>


                @else
                <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for tickets..">

                    <table class="table table-striped" id="ticketsList" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th width="35%">Subject</th>
                            <th width="12.5%">Status</th>
                            <th width="12.5%">Department</th>
                            <th width="12.5%">Last Update</th>
                            <th width="15%">Last Reply</th>
                            <th with="12.5%" ></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="{{$ticket->status === "Answered" ? "Answered":""}}">
                                <td>#{{ $ticket->id }} </td>
                            <td><a href="{{action ('TicketsController@show',$ticket->slug)}}">{{ $ticket->title }}</a></td>
                                <td>
                                    @switch($ticket->status)
                                    @case('Pending')
                                        <div class="status status-pending" >Pending
                                        @break
                                    @case('Answered')
                                         <div class="status status-answered">Answered
                                        @break
                                    @case('Solved')
                                       <div class="status status-solved" >Solved
                                        @break
                                @endswitch
                            </div>
                                </td>
                                <td>
                                    {{$ticket->department->title}}
                                </td>
                                <td>
                                    {{$ticket->updated_at->diffForHumans()}}
                                </td>
                                <td>
                                    @if($ticket->comments->last()['user_id'])
                                    {{getUserName($ticket->comments->last()['user_id'])}}

                                    @endif
                                </td>
                            <td><a name="viewTicketBtn" class="btn btn-success" href="/tickets/view/{{$ticket->slug}}" role="button">View Ticket</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("ticketsList");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        </script>
@endsection


