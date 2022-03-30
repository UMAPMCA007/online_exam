<?php

namespace App\Http\Controllers;

use App\Models\QA;
use App\Models\Result;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(Request $request)
    {
      return view('frontend.index');
    }
    public function viewExam()
    {
        $duration='';

        $QAS=QA::all();
        foreach($QAS as $QA){
            $duration=$QA->time;
        }

        return view('frontend.exam',compact('QAS','duration'));
     }
        public function result(Request $request,$id)
        {
            $request->all();
            $result=new Result();
            $result->question=$request->question;
            $result->answer=$request->option;
            $result->save();
            return response()->json(['success'=>200]);
        }


}
