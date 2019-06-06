<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Gate;
use App\Ticket,App\User,App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function Home(){

        $stats = [
            'allTickets'=>count(Ticket::all()),
            'answeredTickets'=>count(Ticket::where('status','Answered')->get()),
            'pendingTickets'=>count(Ticket::where('status','Pending')->get()),
            'solvedTickets'=>count(Ticket::where('status','Solved')->get()),
            'users'=>count(User::where('user_role',1)->get()),
            'staff'=>count(User::where('user_role',2)->get()),

        ];

        return view('admin.home',compact('stats'));
    }

    public function SiteSettings(){

        return view('admin.settings/site');
    }

    //Get Full Users List
    public function usersList(){
        $usersList = User::where('user_role',1)->get();
        $pageName = 'User';
        return view('admin.settings/users',compact('usersList','pageName'));
    }

    //Get Full Users List
    public function staffList(){
        $staffList = User::where('user_role',2)->get();
        $pageName = 'Staff';
        return view('admin.settings/staff',compact('staffList','pageName'));
    }

    //Get Full Departments List
    public function departmentsList(){
        $departmentsList = Department::all();
        $pageName = 'Department';
        return view('admin.settings/users',compact('departmentsList','pageName'));
    }
}
