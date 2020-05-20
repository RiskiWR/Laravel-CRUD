@extends('layouts.content')

@section('content')
    <h5>Edit Jurusan</h5>

    <form action="{{route('major.update', $data->id)}}" class="card card-body" method="POST" id="form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Jurusan</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-success btn-sm" type="submit" id='btn'>Edit</button>

    </form>

    <script>
        // Button disable after got clicked
        $(document).ready(function () {
        $("#form").submit(function () {
        $(".btn").attr("disabled", true);
        return true;
        });
        });
    </script>
@endsection