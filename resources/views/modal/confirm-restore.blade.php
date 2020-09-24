<div class="modal fade" id="restore{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('restore.update',$user->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-body">
                <input type="hidden" name="user_id" value="{{$user->id }}">
                <p>Are you sure you want to restore user <b>{{ $user->name }}</b> on your Contact List?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Restore</button>
            </div>
        </form> 
    </div>
    </div>
</div>