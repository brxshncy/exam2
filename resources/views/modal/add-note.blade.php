<div class="modal fade" id="addNote{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('note.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                    <div class="form-group">{{ $user->name }}</div>
                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <textarea name="note" class="form-control" placeholder="Add notes..." rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form> 
    </div>
    </div>
</div>