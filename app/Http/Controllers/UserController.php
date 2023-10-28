<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home(){
        return view('user.create');
    }
    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->save();
        session()->put('user', $user);
        return redirect()->route('question.index')->with('success', 'User created and logged in successfully!');
    }

    public function result(){
        $user = session()->get('user');
        $results = Result::where('user_id',$user->id)
            ->selectRaw('sum(is_skip) as total_skip, sum(is_correct) as total_correct,count(id) as total_questions')
            ->first();
        session()->forget('user');
        return view('user.result',compact('results'));
    }

}
