<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'site_name','site_url','site_logo','site_email',
        'keywords','description','copyrights','maintenance',
        'facebook','twitter','linkedin','dark_mode',
        'ticketCreate_email','ticketReply_email','ticket_editClient',
        'ticket_editStaff',
    ];
}
