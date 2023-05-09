@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{session('success')}}
                </div>
                @endif

        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>Clients<small class="text-muted"> LIST</small></h1>
                        <div class="ms-auto col-sm-2 col-xs-2 col-md-2 col-lg-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          {{-- <a class="dropdown-item" href="{{ route ('admin.clients.create') }}">Create Client</a> --}}
                          <a class="dropdown-item" href="{{ route('admin.clients.create') }}">{{ __('Create Client') }}</a>
                          {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                          {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        
                      </div>
                </div>
            </div>
        </div>
    </div>
                
     @if ($clients->count())
        {{ $clients->links() }}
        @foreach ($clients as $client)
            @include('admin.clients.partials.client-card', ['client' => $client])
        @endforeach
    @endif



                {{-- @if ($clients->count())
                    <table class ="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->pretty_Created}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif --}}
    
        </div>
@endsection
