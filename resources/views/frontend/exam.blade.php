@extends('frontend.layout.main')
@section('content')
    @foreach($QAS as $q)
        <div class="container"   >
        <div  class="timer" id="timeD{{$q->id}}">Question closes in <span id="time">05:00</span> minutes!</div>
        <div class="row" id="div{{$q->id}}">
            <div class="col-md-12">
                <h2 class="text-center mt-3" id="miss" style="display: none">You Miss Your Chance</h2>
            </div>
            {{$auth->name}}
            <div class="col-md-12" id="holder">
                <h2 class="text-center mt-3" id="heading{{$q->id}}">Exam Question and Options</h2>
                <h2 class="text-center mt-3" id="completed" style="display: none">Exam Successfully Compleated</h2>
                <div class="col-md=6 offset-md-3"  class="form-wrapper" id="container">
                    <div class="col-md-12" id="div{{$q->id}}">
                        <form class="mt-4" id="{{$q->id}}"  class="form">
                            <input type="hidden" id="input{{$q->id}}" value="{{$q->id}}">
                            <ol>
                                <li>
                                    <p type="text" id="question{{$q->id}}">{{$q->questions}}</p>
                                </li>
                            </ol>
                            <?php
                            $QA=json_decode($q->options);
                            ?>
                            @foreach($QA as $Q)
                                <div class="form-group col-md-1 offset-md-3 ">
                                    <label class="radio-inline">
                                        <input type="radio" id="option{{$q->id}}" name="option" value="{{$Q}}" >{{$Q}} </label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success col-md-3 offset-md-2">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endforeach
    @foreach($QAS as $q)
    @endforeach
    <?php
      $count=count($QAS);
      $time=$q->time;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">


            for(var i=2;i<={{$count}};i++){
                var id=i;

                $("#"+id).hide();
                $("#"+id).hide();
                $('#heading'+id).hide();
                $('#heading'+id).hide();
                $('#timeD'+id).hide();
                $('#timeD'+id).hide();
            }

        function startTimer(duration, display) {

            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;


                    $(".btn-success").on('click',function (e) {
                        e.preventDefault();
                        var id = $(this).closest("form").attr('id');
                        /*console.log(id);*/
                        var question=$('#question'+id).text();
                        var userAnswer = $('#option'+id).val();
                        /*console.log(question,userAnswer);*/
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type:'POST',
                            url:'result/'+id,
                            data:{question:question,option:userAnswer},
                            success:function(data){
                            }


                        });

                        $("#"+id).hide();
                        $('#heading'+id).hide();


                        id=parseInt(id)+1;

                        $("#"+id).show();
                        $('#heading'+id).show();

                        if(id>3){
                            $('#completed').show();
                            $('.timer').hide();
                        }
                        timer= 0;
                    });





                 if (--timer <= 0) {

                     if(timer==0){
                         $("#miss").show();
                         $("#holder").hide();
                         $('.timer').hide();
                     }

                     timer = duration;
                    }

            }, 1000);


        }

        window.onload = function () {
            var fiveMinutes = 5 * {{$time}},
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };


    </script>

@endsection
