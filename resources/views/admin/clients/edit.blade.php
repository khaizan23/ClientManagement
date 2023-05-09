@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>        
    @endif

<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex">
            <h1>Edit Client <small class="text-muted">{{ $client->name }}</small></h1>
            <div class="ms-auto col-sm-2 col-xs-2 col-md-2 col-lg-2">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{ route('admin.clients.dashboard') }}">{{ __('View Dashboard') }}</a>
                      <a class="dropdown-item" href={{ route('admin.clients.show', ['client' => $client->id]) }}>{{ __('View Clients') }}</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#" onclick="deleteClient()" >Delete Client</a>
                      <form action="{{ route('admin.clients.delete', $client->id) }}" id="delete-client-form" style="display:none" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="row">
        <div class="col-md-4 offset-md-0 col-sm-8 offset-sm-2">
            <div class="card mt-3">
                <div class="card-body">
                    @if ($client->profile_image)
                    <img src="{{ Storage::url($client->profile_image) }}" class="mx-auto d-block" style="max-width: 100%" alt="">
                    @else
                        <img src="/images/user.png" class="mx-auto d-block" style="max-width: 100%" alt="">
                    @endif
                    <hr>
                    <button class="btn btn-outline-primary btn-sm btn-block" data-toggle="modal" data-target="#updateProfileImageModal">New Profile Image</button>
                    @if ($client->profile_image)
                        <button class="btn btn-outline-danger btn-sm btn-block" onclick="deleteProfileImage()"><i class="fas fa-trash"></i>Delete Profile Image</button>
                            <form action="{{ route('admin.clients.delete.profile-image', $client->id) }}" method="POST" id="delete-profile-image-form">
                           @csrf
                          @method('DELETE')
                      </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Edit Personal Details</h5>
                    <hr>
                    @if($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                 @foreach ($errors->all() as $message)
                                     {{$message}}
                                        
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route ('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                           <div class="form-group">
                               <label for="">Name</label>
                               <input type="text" class="form-control" name="name" value="{{ $client->name}}">
        
                           </div>
        
                           <div class="form-group">
                               <label for="">Email</label>
                               <input type="email" class="form-control" name="email" value="{{ $client->email}}">
           
                           </div>
        
                           <br>
        
                               <button class="btn btn-primary" style="float:right;">Update Client</button>
        
                   </form>
                </div>
             </div>
             <div class="card mt3">
                <div class="card-body">
                    <h5>Edit Contact Details</h5>
                    <hr>
                    @if ($client->contact)
                        @include('admin.clients.contacts.partials.edit-contact-form', ['client_id' => $client->id, 'contact' => $client->contact])
                    @else
                        <div class="d-flex">
                            <div class="mx-auto">
                                <a href="{{ route('admin.clients.contacts.create', $client->id) }}" class="btn btn-outline-primary">Create Contact Details</a>
                            </div>
                        </div>
                    @endif
                </div>
             </div>
         </div>
        </div>
    </div>

    <!-- Modal for update profile-->
<div class="modal fade" id="updateProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.clients.update.profile-image', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">Choose an Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>

            <button class="bt btn-primary float-right">Update Profile Image</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
  
  @push('footer-scripts')
    <script>
        function deleteProfileImage() {
            var r = confirm("Are you sure you want to delete the profile image?")
            
            if (r) {
                document.querySelector('form#delete-profile-image-form').submit()
            }
        }

        function deleteClient() {
            var r = confirm("Are you sure you want to delete this clients? This can't be undone!")

            if (r) {
                document.querySelector('form#delete-client-form').submit()
            }
        }
    </script>
  @endpush

