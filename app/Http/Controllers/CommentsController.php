<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Comment;
use App\Ticket,App\User;
use Auth,Notification;
use App\Notifications\newreply;
class CommentsController extends Controller
{
    public function createComment( CommentFormRequest $request ){

        //! Repalce <p></p> with <br> in ticket content
        $userContent = $request->get('content');
        $contentStep = str_replace('<p>','<br/>',$userContent);
        $content = str_replace('</p>','',$contentStep);

        $comment = new Comment(array(
           'ticket_id'=>$request->get('ticket_id'),
           'content'=>$content,
           'user_id'=>Auth::user()->id,
        ));
        $comment->save();

        if(Auth::user()->user_role == 1){
            $status ='Pending';
        }else{
            $status ='Answered';
        }
        Ticket::whereId($request->get('ticket_id'))->update(array('status'=>$status));

        //Sending notification to Ticket creator
        $ticketOwner = User::find(Ticket::find($request->get('ticket_id'))->user_id);
        $selectedTicket = Ticket::find($request->get('ticket_id'));
        $ticketSlug = $selectedTicket->slug;
        $ticketTime = now()->timestamp;
        $details = [
            'msg'=>'A new reply has been added to ticket #'.$ticketSlug,
            'replyOwnerId'=>Auth::user()->id,
            'avatar'=>Auth::user()->avatar,
            'ticketSlug'=>$ticketSlug,
            'time'=>$ticketTime,

        ];
        $ticketOwner->notify(new newreply($details));
        //
        return redirect()->back()->with('status','Your reply to ticket has been added');

    }
}
