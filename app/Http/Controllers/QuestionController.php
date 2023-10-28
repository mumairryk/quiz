<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $alreadyAnswered = Result::where('user_id',$request->session()->get('user')->id)->pluck('question_id')->toArray();
        if (count($alreadyAnswered) >= 10){
            return redirect()->route('user.result');
        }
        $question = Question::with('answers')->whereNotIn('id',$alreadyAnswered)->inRandomOrder()->first();
        return view('questions.show',compact('question'));
    }

    public function getNextQuestion(Request $request){
        if ($request->ajax()){
            //get all question and check if the question is not answered
            $alreadyAnswered = Result::where('user_id',$request->session()->get('user')->id)->pluck('question_id')->toArray();
            if (count($alreadyAnswered) >= 10){
                return response()->json(['status'=>true,'message'=>'You have already answered 10 questions!','finished'=>true,'redirect'=>route('user.result')]);
            }
            $data=[];
            $question = Question::with('answers')->whereNotIn('id',$alreadyAnswered)->inRandomOrder()->first();
            if ($question){
                $data['text'] = $question->question;
                $data['question_id'] = $question->id;
                foreach ($question->answers as $answer){
                    $data['answers'][] = [
                        'id'=>$answer->id,
                        'answer'=>$answer->answer_text,
                    ];
                }
            }
            return response()->json(['status'=>true,'question'=>$data,'finished'=>false]);
        }
    }

    public function saveAnswer(Request $request){
        if ($request->ajax()){
            if ($request->has('answer') && $request->has('question_id'))
            {
                $answer = Answer::where('id',$request->answer)->where('question_id',$request->question_id)->first();
                $postData =[
                    'user_id'=>$request->session()->get('user')->id,
                    'question_id'=>$request->question_id,
                    'answer_id'=>empty($request->answer)?null:$request->answer,
                    'is_skip'=>$request->is_skip,
                    'is_correct'=>empty($answer)?0:$answer->is_correct,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ];
                $result = Result::create($postData);
                if ($result){
                    return response()->json(['status'=>true,'message'=>'Answer saved successfully!']);
                }
                return response()->json(['status'=>false,'message'=>'Something went wrong!']);
            }
        }
    }
}
