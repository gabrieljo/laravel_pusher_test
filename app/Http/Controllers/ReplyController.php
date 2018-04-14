<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Question;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    public function index(Question $question){
        return ReplyResource::collection(($question->replies));
    }

    public function show(Question $question, Reply $reply){
        return new ReplyResource($reply);
    }

    public function store(Question $question, Request $request){
       $reply =  $question->replies()->create($request->all());
        return response(['reply' => new ReplyResource($reply)], Response::HTTP_CREATED);
    }

    public function destroy(Question $question, Reply $reply){
        $reply->delete();
        return response('Deleted', Response::HTTP_NO_CONTENT);
    }

    public function update(Question $question, Reply $reply){
        $reply->update(['body' => request()->body]);
        return response('Update', Response::HTTP_ACCEPTED);
    }
}
