@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>Question & Answer</h2>
        <button type="button" class="btn btn-success col-md-1 offset-md-10" data-toggle="modal" data-target="#exampleModal">
           Add Q&A
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('StoreQa')}}" method="post"  id="Qform">
                            @csrf
                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" class="form-control" name="question">
                            </div>
                            <div class="form-group">
                                <label>Options</label>
                                <input type="email" class="form-control" name="option[]">
                            </div>
                            <div class="form-group">
                                <label>Options</label>
                                <input type="email" class="form-control" name="option[]">
                            </div>
                            <div class="form-group">
                                <label>Options</label>
                                <input type="email" class="form-control" name="option[]">
                            </div>
                            <div class="form-group">
                                <label>Options</label>
                                <input type="email" class="form-control" name="option[]">
                            </div>
                            <div class="form-group">
                                <label>Answer</label>
                                <input type="text" class="form-control" name="answer">
                            </div>
                            <div class="form-group">
                                <label>Time</label>
                                <input type="number" class="form-control" name="time">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Options</th>
                <th>Answers</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($QAs as $Qa)
                <tr>
                    <?php
                      $options=json_decode($Qa->options);
                      $options=implode(',',$options);

                    ?>
                    <td>{{$Qa->id}}</td>
                    <td>{{$Qa->questions}}</td>
                    <td>{{$options}}</td>
                    <td>{{$Qa->answer}}</td>
                    <td>{{$Qa->time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>

            $(".btn-primary").click(function() {
                $("#Qform").submit();
            });


    </script>

@endsection
