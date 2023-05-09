@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>Create <small class="text-muted">Client</small></h1>
                        <div class="ms-auto col-sm-2 col-xs-2 col-md-2 col-lg-2">

                                <div class="dropdown">
                                     <button class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         Actions
                                        </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('admin.clients.dashboard')}}">Dashboard</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                        
                                    </div>
                                </div>
                        </div>
                    </div>
                            @if($errors->count())
                            <div class="alert alert-danger">
                                
                                @foreach ($errors->all() as $message)
                                {{$message}}
                                
                                @endforeach
                            </div>
                            @endif

                                <form action="{{route ('admin.clients.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
        
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name">
        
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email">
                        
                                        </div>
        
                                        <div class="form-group">
                                             <label for="">Profile Image</label>
                                             <br>
                                             <input type="file" class="form-control-file" name="profile_image">
                        
                                        </div>
                                        <br>
        
                                            <button class="btn btn-primary" style="float:right;">Create Client</button>
        
                                </form>
            
        </div>
    </div>
</div>

@endsection