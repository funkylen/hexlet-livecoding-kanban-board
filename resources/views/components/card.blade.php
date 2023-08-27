<div data-id="{{ $id }}" class="card shadow-sm mb-3" data-bs-toggle="modal" data-bs-target="#card-modal">
    <div class="card-body">
        <h5>{{ $title }}</h5>
        <p>{{ Str::limit($description, 35) }}</p>
    </div>
</div>

