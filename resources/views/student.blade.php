@extends('layouts.content')

@section('content')

    <h5>Daftar Siswa</h5>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Proses Berhasil, </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    

    <div class="card mb-3 card-body">
        <div class="row">
            <div class="col-lg-6 mb-md-0 mb-2">
                <a href="{{ route('student.create')}}" class="btn btn-primary btn-sm d-block d-md-inline">+ Tambah Siswa</a>
            </div>
            <div class="col-lg-6 text-md-right ">
                <span class="font-weight-bold">Export</span>  
                <div class="btn-group mr-md-2 mb-sm-0 mb-3" role="group" aria-label="Basic example">
                    <a href="{{ route('student.print') }}" type="button" class="btn btn-secondary btn-sm btn-secondary">Print</a>
                    <a href="{{ route('student.pdf') }}" type="button" class="btn btn-secondary btn-sm btn-danger">PDF</a>
                    <a href="{{ route('student.excel') }}" type="button" class="btn btn-secondary btn-sm btn-success">Excel</a>
                 </div>
                <a href="{{ route('student.trash') }}" class="btn btn-secondary btn-sm">
                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    Tong Sampah                
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mb-lg-0 mb-3">
        <form action="{{route('student.filter')}}">
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <select name="major"  class="form-control  rounded-0 rounded-left">
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="" >Semua Jurusan</option>
                    @foreach ($major as $major)
                        <option value="{{$major->id}}">{{$major->name}}</option>
                    @endforeach
                </select>     
                <select name="grade"  class="form-control  rounded-0 rounded-left">
                        <option value="" disabled selected>Pilih Kelas</option>
                        <option value="" >Semua Kelas</option>
                    @foreach ($grade as $grade)
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                    @endforeach
                </select>     
                <button class="btn btn-primary ">Filter</button>
            </div>
        </form>
          
        </div>
        <div class="col-12 col-lg-6">
            <form action="{{route('student.search')}}" method="GET">  
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari.." name="search" >
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
   
    </div>
   

 
    
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
              
                    
                @if(empty($student->major->name))
                    <td class="bg-danger text-white">                 
                    {{"Jurusan Dihapus"}}               
                    </td>
                @else
                     <td>{{ $student->major->name}}</td>
                @endif

                @if(empty($student->grade->name))
                    <td class="bg-danger text-white">                 
                    {{"Kelas Dihapus"}}               
                    </td>
                @else
                     <td>{{ $student->grade->name}}</td>
                @endif
               
                <td>
                    @foreach ($student->hobby as $hobby)
                        <span class="badge badge-primary">{{ $hobby->name}}</span>
                    @endforeach
                </td>
                <td>

                    <a class="btn btn-success btn-sm mb-1 mb-md-0" href="{{route('student.edit',$student->id)}}">Edit</a>
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
   
  