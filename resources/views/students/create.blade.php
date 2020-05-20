@extends('layouts.content')

@section('content')
    <h5>+ Tambah Siswa</h5>

    <form action="{{route('student.store')}}" method="POST" class="card card-body" >
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
            @error('name')
                <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for=grade"">Kelas</label>
            <select name="grade" id="" class="form-control">

                <option disabled selected>Pilih Kelas</option>
                @foreach ($grade as $grade)
                <option value="{{$grade->id}} ">{{ $grade->name}}</option>
                @endforeach
            </select>
            @error('grade')
                <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="major">Jurusan</label>
            <select name="major" id="" class="form-control">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($major as $major)
                <option value="{{$major->id}}">{{ $major->name}}</option>
                @endforeach
            </select>
            @error('major')
                <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="hobby">Hobby</label>
            <select name="hobby[]" class="hobby form-control" multiple="multiple" multiple>
                @foreach ($hobby as $hobby)
                <option value="{{$hobby->id}}">{{$hobby->name}}</option>
                @endforeach
            </select>
            @error('hobby')
                <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <button class="btn btn-success btn-sm">Submit</button>
    </form>

    <script>
	$(document).ready(function() {
    $('.hobby').select2();
	});
    </script>




@endsection