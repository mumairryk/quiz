@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Welcome <u>{{session()->get('user')->name}}</u></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group" id="questionData">
                                <label for="question" class="bold">Q: <span>{{$question->question}} </span></label>
                                <div id="answer-container">
                                    @forelse($question->answers as $answer)
                                        <input type="radio" required id="answer-{{$answer->id}}" name="answer[{{$question->id}}]" value="{{$answer->id}}">
                                        <label for="answer-{{$answer->id}}">{{$answer->answer_text}}</label>
                                        <br>
                                    @empty
                                    @endforelse
                                </div>
                                <p style="color: red;"></p>
                            </div>
                            <button type="button" data-question_id="{{$question->id}}" id="skip" class="btn btn-secondary">Skip</button>
                            <button type="button" data-question_id="{{$question->id}}" id="next" class="btn btn-primary">Next</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function () {
            $('#next').click(function () {
                var question_id = $(this).data('question_id');
                //check it validation for answer
                var answer = $('input[name="answer['+question_id+']"]:checked').val();
                if(answer == undefined){
                    $('#questionData p').text('Please select an answer');
                    return false;
                }
                else {
                    $('#questionData p').text('');
                }
                $.post('{{ route('question.save-answer') }}', {
                        _token: '{{ csrf_token() }}',
                        question_id: question_id,
                        answer: answer,
                        is_skip: 0
                    },
                    function(data, status){
                        getNextQuestion();
                    }, 'json');
            });
            //skip button
            $('#skip').click(function () {
                var question_id = $(this).data('question_id');
                $.post('{{ route('question.save-answer') }}', {
                        _token: '{{ csrf_token() }}',
                        question_id: question_id,
                        answer: null,
                        is_skip: 1
                    },
                    function(data, status){
                        getNextQuestion();
                    }, 'json');
            });
        });
        function getNextQuestion(){
            $.get('{{ route('question.get-next-question') }}', {
                    _token: '{{ csrf_token() }}',
                },
                function(data, status){
                console.log(data);
                    if(data.status && data.finished == false){
                        var html ='';
                        html += '<label for="question" class="bold">Q: <span>'+data.question.text+'</span></label>';
                        html += '<div id="answer-container">';
                        $.each(data.question.answers, function (index, value) {
                            html += '<input type="radio" required id="answer-'+value.id+'" name="answer['+data.question.question_id+']" value="'+value.id+'">';
                            html += ' <label for="answer-'+value.id+'">'+value.answer+'</label>';
                            html += '<br>';
                        });
                        html += '<p style="color: red;"></p></div>';
                        $('#questionData').html(html);
                        //set this question id to next button
                        $('#next').data('question_id', data.question.question_id);
                        $('#skip').data('question_id', data.question.question_id);
                    }
                    else {
                        window.location.href = data.redirect;
                    }
                }, 'json');
        }

    </script>
@endsection
