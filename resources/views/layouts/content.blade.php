@include('layouts/header')
    <div class="wrapper">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <h3>Simple CRUD</h3>
                </div>
                <div class="col-md-6 text-md-right">
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             {{ Auth::user()->name }}
                        </button>
                        
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Logout</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-2">
                @include('layouts.sidebar')
                </div>

                <div class="col-md-10">
                @section('content')
                @show
                </div>

            </div>
        </div>
    </div>

@include('layouts/footer')