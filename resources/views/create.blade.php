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
        <h2>Create Poll</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/add') }}" method="post" novalidate>
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description">
            <label for="answers">Answers (per line)</label>
            {{-- <textarea name="answers" id="answers" placeholder="Description" required></textarea> --}}
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="answers[0]" placeholder="Enter subject" class="form-control" />
                    </td>
                    <td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>
                </tr>
            </table>
            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
                Subject</button>
            <input type="submit" value="Create">
        </form>
    </div>
@endsection
@section('javascripts')

    <script>
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="answers[' + i +
                ']" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
