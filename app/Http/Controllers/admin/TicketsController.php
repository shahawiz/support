<?php

namespace App\Http\Controllers\admin;
use Auth;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketsController extends Controller
{
    //* List All Tickets
    public function index()
    {
        $tickets = Ticket::where('user_id',Auth::user()->id)->latest('id')->get();
        $pageName = 'All';
        return view('admin.tickets/list',compact('tickets','pageName'));
    }
    //* Pending Tickets
    public function pendingTicketsList(){
        $tickets = Ticket::where('user_id',Auth::user()->id)->where('status','Pending')->latest('id')->get();
        $pageName = 'Pending';
        return view('admin.tickets/list',compact('tickets','pageName'));
    }
    //* Answered Tickets
    public function answeredTicketsList(){
        $tickets = Ticket::where('user_id',Auth::user()->id)->where('status','Answered')->latest('id')->get();
        $pageName = 'Answered';
        return view('admin.tickets/list',compact('tickets','pageName'));
    }
    //* Solved Tickets
    public function solvedTicketsList(){
        $tickets = Ticket::where('user_id',Auth::user()->id)->where('status','Solved')->latest('id')->get();
        $pageName = 'Solved';
        return view('admin.tickets/list',compact('tickets','pageName'));
    }


}
