 @extends('layouts.content')

 @section('content')

@php
    if (isset( $_GET['major'])) {
        $major_id =  $_GET['major'];
    
    }
    else {
       $major_id = ''  ;
    }

    if (isset( $_GET['grade'])){
     $grade_id =  $_GET['grade'];
    }
      else {
       $grade_id = ''  ;
    }

@endphp

{{-- @php
      if (isset( $_GET['grade'])){
     $grade_id =  $_GET['grade'];
    }
@endphp --}}
{{-- 
 @if (request('major'))
     @php
        $major_id =  request['major'] 
     @endphp 
 @endif

 @if (isset( $_GET['grade']))
 @php
     $grade_id =  $_GET['grade']
 @endphp
     
 @endif --}}

 @php
     $_GET['major'] = '';
     $_GET['grade'] = '';
 @endphp

<h5>Seleksi : {{ $major['name']}}, {{$grade['name'] }}</h5>

    <form action="{{route('student.filter')}}" class="mb-3">
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <select name="major"  class="form-control  rounded-0 rounded-left">
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="" @if ($_GET['major'] == '')
                            {{ 'selected' }}
                        @endif>Semua Jurusan</option>
                    @foreach ($majors as $major)
                        <option value="{{$major->id}}"
                            @if ($major_id == $major->id)
                                selected
                            @endif
                            >{{$major->name}}</option>
                    @endforeach
                </select>     
                <select name="grade"  class="form-control  rounded-0 rounded-left">
                        <option value="" disabled selected>Pilih Kelas</option>
                        <option value="" @if ($_GET['grade'] == '')
                            {{ 'selected' }}
                        @endif >Semua Kelas</option>
                    @foreach ($grades as $grade)
                        <option value="{{$grade->id}}"
                            @if ($grade_id == $grade->id)
                                selected
                            @endif
                            >{{$grade->name}}</option>
                    @endforeach
                </select>     
                <button class="btn btn-primary ">Filter</button>
            </div>
    </form> 

    
   
  
  
               
   
    <table class="table table-bordered table-responsive-sm">
        <thead class="thead-light"">
            <tr>
                <th class="text-center">No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Hobi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $student)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td>{{ $student->name}}</td>
                <td>{{ $student->major->name}}</td>
                <td>{{ $student->grade->name}}</td>
                <td>
                    @foreach ($student->hobby as $hobby)
                        <span class="badge badge-primary">{{ $hobby->name}}</span>
                    @endforeach
                </td>
                <td>

                    <a class="btn btn-success btn-sm" href="{{route('student.edit',$student->id)}}">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$student->id}}">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered"  role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Yakin menghapus <span class="font-weight-bold">{{$student->name}}</span>?
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('student.destroy', $student->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>             
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Modal -->

                </td>
            </tr>     
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}

@endsection