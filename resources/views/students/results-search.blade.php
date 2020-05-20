 @extends('layouts.content')

 @section('content')

    @if (session('success'))
    <h5 class="d-inline"><span class="font-weight-normal">Mencari :</span> {{ session('success') }} </h5>
      @if ($data->total() == 0)
            <span class="badge badge-danger">
            Data tidak ditemukan
            </span>
            @else
            <span class="badge badge-success">
                {{$data->total()}} Hasil
            </span>
          
        @endif      
    @endif 

     <form action="{{route('student.search')}}" method="GET">  
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="search" value="{{ session('success') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </div>
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