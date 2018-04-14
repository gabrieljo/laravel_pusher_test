<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function __construct(){
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }
    public function index(){
        //resource 생성해서 데이터 내보낼 format 지정
        return QuestionResource::collection(Question::latest()->get());
    }

    public function show(Question $question){
        return new QuestionResource($question);
    }

    public function destroy(Question $question){
        $question->delete();
        return response('Deleted', Response::HTTP_NO_CONTENT);
    }

    public function store(Request $request){
//        auth()->user()->questions()->create($request->all());
        Question::create();
        return response('Created', Response::HTTP_CREATED);
    }

    public function update(Request $request, Question $question){
        $question->update($request->all());

        return response('Update', Response::HTTP_ACCEPTED);
    }
}
