@extends('frontend.layout.main')
@section('content')
 <div class="container">
     <div class="row">
         {{$user->name}}
         <div class="col-md-6  offset-md-3 mt-5">
             <h2>Welcome to online exam portal</h2>
             <a href="{{route('frontend.exam')}}" class="col-md-3 offset-md-3 btn btn-success">Enroll into Exam</a>
         </div>
     </div>
 </div>

@endsection
