@extends('layouts.content')

@section('content')
   
    <h5>Daftar Jurusan</h5>

     <div class="card mb-3 card-body">
        <div class="row">
            <div class="col-lg-6 mb-md-0 mb-2">
                <a href="{{ route('major.create')}}" class="btn btn-primary btn-sm d-block d-md-inline">+ Tambah Jurusan</a>
            </div>
            <div class="col-lg-6 text-md-right ">
                <span class="font-weight-bold">Export</span>  
                <div class="btn-group mr-md-2 mb-sm-0 mb-3" role="group" aria-label="Basic example">
                    <a href="{{ route('student.print') }}" type="button" class="btn btn-secondary btn-sm btn-secondary  disabled">Print</a>
                    <a href="{{ route('student.pdf') }}" type="button" class="btn btn-secondary btn-sm btn-danger  disabled">PDF</a>
                    <a href="{{ route('student.excel') }}" type="button" class="btn btn-secondary btn-sm btn-success  disabled">Excel</a>
                 </div>
            </div>
        </div>
    </div>

    <form action="{{route('major.search')}}" method="GET">  
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="search" >
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>


    <ul class="list-group">
        <li class="list-group-item active bg-secondary border-secondary">Jurusan</li>
        @foreach ($data as $major)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$major->name}} 
                <span class="d-flex">
                <a class="btn btn-primary btn-sm text-white" href="{{ route('major.edit',$major->id )}}">Edit</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$major->id}}"> Delete </button>
                </span> 
            </li>
            <!-- Modal -->
                <div class="modal fade" id="delete{{$major->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered"  role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Yakin menghapus <span class="font-weight-bold">{{$major->name}}</span>?
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('major.destroy', $major->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>             
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END Modal -->
        @endforeach
    </ul>
    <br>
     {{ $data->links() }}

   


    
@endsection