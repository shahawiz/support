<?php
use App\User;

function getUserName($id){
    $user = User::whereId($id)->firstOrFail();
    $name = $user->name;
    return $name;
}
function getUserAvatar($id){
    $user = User::whereId($id)->firstOrFail();
    $img = $user->avatar;
    return $img;
}
