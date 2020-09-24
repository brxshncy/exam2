<div class="modal fade" id="editNote{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Notes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('note.update',$note->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                    <textarea name="note" class="form-control" placeholder="Add notes..." rows="4">{{ $note->note }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form> 
    </div>
    </div>
</div>