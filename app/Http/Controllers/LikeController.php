<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function like(Reply $reply){
        $reply->likes()->create([
            'user_id' => '1'
        ]);
    }
    
    public function unLike(Reply $reply){
        $reply->like()->where('user_id', auth()->user()->id)->first()->delete();
    }
}
