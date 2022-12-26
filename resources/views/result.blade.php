@extends('master')
@section('title', 'CIMR')
@section('description', 'TEST')

@section('stylesheet')
@endsection
@section('content')
    <div class="content poll-result">
        Auth:{{Auth::check()}} <br>

        <h2>{{ $poll->title }}</h2>
        <p>{{ $poll->description }}</p>
        Total vote: {{$total_votes}}
        <div class="wrapper">
            @foreach ($poll->poll_answers as $poll_answer)
                <div class="poll-question">
                    <p>{{ $poll_answer['title'] }} <span>({{ $poll_answer['votes'] }} Votes)</span></p>
                    <div class="result-bar" style="width:{{ @round(($poll_answer['votes'] / $total_votes) * 100) }}%">
                        {{ @round(($poll_answer['votes'] / $total_votes) * 100) }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
