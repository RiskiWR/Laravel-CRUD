@extends('layouts.content')

@section('content')

    <h5>Daftar Siswa</h5>
    <div class="card mb-3 card-body">
        <div class="row">
            <div class="col-6 d-flex">
                <a href="{{ route('student.restore_all')}}" class="btn btn-primary btn-sm mr-3">Restore All</a>
                <form action="{{ route('student.kill_all')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm disabled" disabled>Delete All</button>
                </form>     
        
            </div>
        </div>
    </div>
    
    <table class="table table-bordered table-responsive-sm ">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Hobby</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

           
            @foreach ($data as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $student->name}}</td>
                <td>{{ $student->major->name}}</td>
                <td>{{ $student->grade->name}}</td>
                <td>
                    @foreach ($student->hobby as $hobby)
                        <span class="badge badge-primary">{{ $hobby->name}}</span>
                    @endforeach
                </td>
                <td>

                    <a class="btn btn-success btn-sm" href="{{route('student.restore',$student->id)}}">Restore</a>
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
                                    Yakin menghapus <span class="font-weight-bold">{{$student->name}}</span> secara permanen?
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Gak jadi</button>
                                    <form action="{{ route('student.kill', $student->id)}}" method="POST">
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

    @if ($data->isEmpty())
        <h5 class="text-center">Tong sampah kosong</h5>
    @endif


    

        

@endsection
   
  