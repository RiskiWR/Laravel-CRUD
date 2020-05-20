@extends('layouts.content')

@section('content')
    <h5>+ Edit Siswa</h5>

        <form action="{{ route('student.update',$student->id) }}" method="post" class="card card-body" >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="">Nama</label>
        <input type="text" class="form-control" name="name" value="{{ $student->name }}">
            @error('name')
                <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for=grade"">Kelas</label>
            <select name="grade" id="" class="form-control">
                <option value="" disabled>Pilih Kelas</option>
                @foreach ($grade as $grade)
                  
                        <option value="{{$grade->id}}"
                              @if ($student->grade_id === $grade->id)
                                selected
                              @endif
                            >{{ $grade->name}}</option>
                    
                
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
                    <option value="{{$major->id}}"
                        @if ($student->major_id === $major->id)
                                selected
                              @endif
                        >{{ $major->name}}</option>
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
                <option value="{{$hobby->id}}"
                     @foreach ($student->hobby as $value)
                        @if ($hobby->id === $value->id)
                            selected
                        @endif
                    @endforeach      
                >{{$hobby->name}}</option>
                   
                
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