<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Gate;
use App\Ticket,App\User,App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;
use App\Http\Requests\AdminAddUserRequest;

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



    //*Get Full Users List
    public function usersList(){
        $usersList = User::where('user_role',1)->get();
        $pageName = 'User';
        return view('admin.settings/users',compact('usersList','pageName'));
    }

    //*Get Full Users List
    public function staffList(){
        $staffList = User::where('user_role',2)->get();
        $pageName = 'Staff';
        return view('admin.settings/staff',compact('staffList','pageName'));
    }

    //?Get Full Departments List
    public function departmentsList(){
        $departmentsList = Department::all();
        $pageName = 'Department';
        return view('admin.settings/departments',compact('departmentsList','pageName'));
    }

    //Create New Department
    public function commitCreateDepartment(request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);

        $dpt = Department::create([
            'title'=>$request->get('title'),
            'desc'=>$request->get('desc'),
        ]);
        $status = $dpt->title.' department has been created.';
        return redirect()->back()->with('status',$status);
    }

    //Delete Department
    public function deleteDepartment($id)
    {
        $dpt = Department::find($id);
        $dpt->delete();
        $status = $dpt->title.' department has been deleted.';
        return redirect()->back()->with('status',$status);
    }

    //Edit Department
    public function viewDepartment($id){
        $department = Department::where('id',$id)->firstOrFail();
        return view('admin.settings/departmentView',compact('department'));
    }

    //Update Department
     public function updateDepartment($id,request $request){
        $request->validate([
            'title'=>'required',
        ]);
        $department = Department::where('id',$id)->firstOrFail();
        $department->update([
            'title'=>$request->get('title'),
            'desc'=>$request->get('desc'),
        ]);
        $status ='Department has been deleted.';
        return redirect()->back()->with('status',$status);
    }

    //Create New User
    public function createUser(){
        $pageName = 'User';
        $countries = Countries::all()->pluck('name.common');
        return view('admin.settings/addUser',compact('pageName','countries'));
    }

    public function commitCreateUser(AdminAddUserRequest $request){
        $pageName = 'User';
        $countries = Countries::all()->pluck('name.common');
        return 'ok';
    }


}
