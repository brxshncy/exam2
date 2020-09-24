<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <form action="{{ route('contact.update',$user->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message  }}</small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email"  value="{{ $user->email }}" class="form-control">
                            @error('email')
                                <small class="text-danger">{{ $message  }}</small>
                             @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="number" name="contact"  value="{{ $user->contact }}" class="form-control">
                            @error('contact')
                                <small class="text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address"  value="{{ $user->address }}" class="form-control">
                            @error('address')
                                <small class="text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="edit-img-container">
                        <img src="{{ $user->avatar === null ? asset('uploads/no-pic.png') : asset('uploads/').'/'.$user->avatar }}" alt="">
                    </div>
                </div>           
                <div class="row">
                    <div class="col">
                        <div class="form-group d-flex flex-column">
                            <label for="">Image</label>
                            <input type="file" name="avatar"  value="{{ $user->avatar }}">
                            @error('avatar')
                                <small class="text-danger">{{ $message  }}</small>
                             @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form> 
    </div>
    </div>
</div>