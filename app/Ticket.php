<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['title','slug','content','status','user_id','department_id','priority'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getTitle(){
        return $this->title;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'ticket_id');
    }


    public function department()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }
}
