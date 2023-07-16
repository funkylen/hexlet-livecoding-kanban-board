<div data-id="{{ $id }}" class="card shadow-sm mb-3" data-bs-toggle="modal" data-bs-target="#card-modal-{{ $id }}">
    <div class="card-body">
        <h5>{{ $title }}</h5>
        <p>{{ $description }}</p>
    </div>
</div>

@push('modals')

    <div class="modal fade" id="card-modal-{{ $id }}" tabindex="-1" aria-labelledby="card-modal-{{ $id }}-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="card-modal-{{ $id }}-label">{{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $description }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endpush
