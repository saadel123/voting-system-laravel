@extends('master')
@section('title', 'CIMR')
@section('description', 'TEST')
{{-- Adding and Deleting Input fields Dynamically laravel --}}
@section('stylesheet')
    <style>
        #view-result {
            display: none;
        }
    </style>
@endsection
@section('content')
    {{ $success ?? null }}
    <div class="content poll-vote">
        @if (!$poll->isAuthUserVotedPoll())
            <div id="polls">
                <h2>{{ $poll->title }}</h2>
                <p>{{ $poll->description }}</p>
                {{-- <form action="{{ route('vote.update', $poll->id) }}" method="POST"> --}}
                {{-- @method('PUT')
            @csrf --}}
                {{-- @foreach ($poll->poll_answers as $index => $poll_answer) --}}
                <input type="text" hidden id="user_id" value="{{ auth()->user()->id ?? null }}">
                @for ($i = 0; $i < count($poll->poll_answers); $i++)
                    <label>
                        <input type="checkbox" name="poll_answer" onclick="updateData({{ $poll->poll_answers[$i]->id }})"
                            value="{{ $poll->poll_answers[$i]->id }}">
                        {{-- {{ $i == 0 ? 'checked' : '' }} --}}
                        {{ $poll->poll_answers[$i]->title }}
                    </label>
                @endfor
            </div>
            {{-- <div id="view-result" class="mt-5">
                <a href="{{ url('result/' . $poll->id) }}">View Result</a>
            </div> --}}
        @else
            <div class="content poll-result">
                <div class="wrapper">
                    @foreach ($poll->poll_answers as $poll_answer)
                        <div class="poll-question">
                            <p>{{ $poll_answer['title'] }} <span>({{ $poll_answer['votes'] ? $poll_answer['votes'] : 0  }} Votes)</span></p>
                            <div class="result-bar"
                                style="width:{{ @round(($poll_answer['votes'] / $total_votes) * 100) }}%">
                                {{ @round(($poll_answer['votes'] / $total_votes) * 100) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@section('javascripts')
    <script type='text/javascript'>
        function updateData(id) {
            var token = $("meta[name='csrf-token']").attr("content");
            // var url = window.location.pathname;
            // var id_poll = url.substring(url.lastIndexOf('/') + 1);
            var user_id = $('#user_id').val();
            if (id != '') {
                $.ajax({
                    url: "{{ route('vote.store') }}" + '/' + id,
                    type: "put",
                    cache: false,
                    data: {
                        "id": id,
                        "_token": token,
                        "user_id": user_id,
                        // "user_id": $('#user_id').val(),
                    },
                    success: function(data) {
                        // $('#polls').hide();
                        // $('#view-result').show();
                        location.reload(true);
                    },
                    error: function(error) {
                        location.reload(true);
                    }
                });
            } else {
                alert('Fill all fields');
            }
        };
    </script>
@endsection
