@extends('layouts.content')

@section('content')
    <h5>+ Tambah Kelas</h5>

    <form action="{{route('grade.store')}}" class="card card-body" method="POST" id="form">
        @csrf
        <div class="form-group">
            <label for="">Nama Kelas</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-success btn-sm" type="submit" id='btn'>Submit</button>

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