<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;
use App\Department;
use Auth;
use Illuminate\Support\Facades\Mail;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('user_id',Auth::user()->id)->latest('id')->get();
        $pageName = '';
        return view('tickets.home',compact('tickets','pageName'));
    }
    public function pendingTicketsList(){
        $tickets = Ticket::where('user_id',Auth::user()->id)->where('status','Pending')->latest('id')->get();
        $pageName = 'pending';
        return view('tickets.home',compact('tickets','pageName'));
    }
    public function answeredTicketsList(){
        $tickets = Ticket::where('user_id',Auth::user()->id)->where('status','Answered')->latest('id')->get();
        $pageName = 'answered';
        return view('tickets.home',compact('tickets','pageName'));
    }
    public function solvedTicketsList(){
        $tickets = Ticket::where('user_id',Auth::user()->id)->where('status','Solved')->latest('id')->get();
        $pageName = 'solved';
        return view('tickets.home',compact('tickets','pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $priorities = array(0=>'Low',1=>'Normal',2=>'High',3=>'Very High');
        return view('tickets.create',compact('departments','priorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        //Create unique ticket ID
        $slug = uniqid();

        //Repalce <p></p> with <br> in ticket content
        $userContent = $request->get('content');
        $contentStep = str_replace('<p>','<br/>',$userContent);
        $content = str_replace('</p>','',$contentStep);

        $ticket = new Ticket(Array(
            'title' => $request->get('title'),
            'content' => $content,
            'department_id'=>$request->get('department'),
            'priority'=>$request->get('priority'),
            'user_id'=>Auth::user()->id,
            'slug'=>$slug,
        ));

        $ticket->save();

        //Send mail to user
        // $data = array (
        //     'name'=>Auth::user()->name,
        //     'title'=>'A new Ticket Created',
        //     'msg'=>'A new Ticket #'.$slug.' Has been created',
        //     'slug'=>$slug,
        // );

        // Mail::send('emails.ticketCreate', $data, function ($message) use($slug){
        //     $message->from('no-reply@sonbl.com', 'Ticket System');
        //     $message->to(Auth::user()->email, 'Hossam');
        //     $message->subject('New Ticket Created '. $slug);
        // });


        return redirect('/tickets/create')->with('status',[
            'msg'=>'Your Ticket has been created and its unique ID is : '.$slug,
            'ticket_id'=>$slug,

            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        if(Gate::allows('ticket-view',$ticket->user_id)){
            $comments = $ticket->comments()->get();
            return view ('tickets.view',compact('ticket','comments'));
        }
        return view('tickets.notAuthorized');

    }

    public function close($slug){

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        if($ticket->user_id == Auth::user()->id){
            return view('tickets.edit',compact('ticket'));
        }else{
            return redirect(route('notauthorized'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request , $slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        if($request->get('closed') !=null){
            $ticket->status = 'Closed';
        }else{
            $ticket->status = 'Pending';
        }

        $ticket->save();
        return redirect(route('view_ticket',$slug))->with('status','The ticket '.$slug.' has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect()->action('TicketsController@index')->with('status', ['msg'=>'Ticket with ID: '.$slug.' has been deleted.']);
    }


}
