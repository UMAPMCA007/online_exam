<?php

namespace App\Http\Controllers;

use App\Models\QA;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QsController extends Controller
{
    function index()
    {
      $QAs=QA::all();
      return view('QA.index',compact('QAs'));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'question'=>"required",
            'option'=>'required',
            'answer'=>'required',
            'time' =>'required'
        ]);
        $QA=new QA();
        $QA->questions=$request->question;
        $QA->options=json_encode($request->option);
        $QA->answer=$request->answer;
        $QA->time=$request->time;
        $QA->save();
        return back();
    }
}
