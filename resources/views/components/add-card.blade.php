<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add-card-modal-{{ $columnId }}">
    Add {{ $columnId }}
</button>

@push('modals')
    <div class="modal fade" id="add-card-modal-{{ $columnId }}" tabindex="-1" aria-labelledby="add-card-modal-label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add-card-modal-label">New card</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-card-form-{{ $columnId }}" data-column-id="{{ $columnId }}">
                    <input type="hidden" id="columnId" name="column_id" value="{{ $columnId }}"/>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"/>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
