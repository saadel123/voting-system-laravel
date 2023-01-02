@extends('master')
@section('title', 'CIMR')
@section('description', 'TEST')

@section('stylesheet')
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block text-center">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="content update">
        <h2>Update Poll</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('update/' . $poll->id) }}" method="post" novalidate>
            @method('PUT')
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $poll->title }}" placeholder="Title" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ $poll->description }}"
                placeholder="Description">
            <label for="answers">Answers (per line)</label>
            {{-- <textarea name="answers" id="answers" placeholder="Description" required></textarea> --}}
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                @php
                    $i = 0;
                @endphp
                @foreach ($poll->poll_answers as $key => $poll_answer)
                    <tr>
                        <td><input type="text" name="{{ 'titles[' . $i . '][titre]' }}" value="{{ $poll_answer->title }}"
                                placeholder="Enter subject" class="form-control" />
                            <input type="hidden" name="{{ 'titles[' . $i . '][id]' }}" value="{{ $poll_answer->id }}">
                        </td>
                        <td><button type="button" class="btn btn-outline-danger remove-input-field deleteRecord"
                                data-id="{{ $poll_answer->id }}">Delete</button></td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </table>
            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
                Subject</button>
            <input type="submit" value="Modifier">
        </form>
    </div>
@endsection
@section('javascripts')
    <script>
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="new_titles[' + i +
                ']" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });

        $(".deleteRecord").click(function(e) {
            e.preventDefault();
            var result = confirm("Êtes-vous sûr?");
            if (result) {
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: "{{ route('vote.store') }}" + '/' + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        // console.log("it Works");
                        $("#" + id).hide();
                    }
                });
            }
        });
    </script>
@endsection
