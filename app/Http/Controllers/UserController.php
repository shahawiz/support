<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use PragmaRX\Countries\Package\Countries;
use App\Http\Requests\ProfileFormRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::check()){
            $user = User::whereId(Auth::user()->id)->firstOrFail();
            $countries = Countries::all()->pluck('name.common');

            return view('user.profile',compact('user','countries'));
        }
        else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileFormRequest $request, User $user)
    {
     //   if(Auth::user()->email === $request->email){
            $user = User::whereId(Auth::user()->id)->firstOrFail();
            $user ->name = $request->get('name');
            $user ->email =$request->get('email');
           // dd($request->get('email'));
            $user ->phone = $request->get('phone');
            $user ->address = $request->get('address');
            $user ->city = $request->get('city');
            $user ->state = $request->get('state');
            $user ->zip = $request->get('zip');
            $user ->country = $request->get('country');


            $user->save();
       // }

         return redirect()->back()->with('status','Your information has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function viewAvatar(request $request){
        if(Auth::check()){
            $user = User::whereId(Auth::user()->id)->firstOrFail();

            return view('user.avatar',compact('user'));
        }

    }

    public function updateAvatar(){
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/avatars'), $imageName);
        $user = User::whereId(Auth::user()->id)->firstOrFail();
        $user->avatar = $imageName;
        $user->save();
        return back()->with('status','You have successfully changed your avatar.');
    }

    public function notifications(){
        $user = User::find(Auth::user()->id);
        return view('user.notifications',compact('user'));
    }

    //Make Notification read redirect to ticket
    public function read_notification($notifId,$ticketId){

        Auth::user()->notifications()->where('id',$notifId)->first()->markAsRead();
        return redirect()->route('view_ticket',$ticketId);
    }

    //Get All User Notifications

    public function all_notifications(){
        $data = User::find(Auth::user()->id)->notifications->take(10);

         return response()->json($data);
    }
}
