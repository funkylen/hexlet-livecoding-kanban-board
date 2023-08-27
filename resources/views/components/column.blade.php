<div data-id="{{ $id }}" id="column-{{ $id }}" class="shadow p-3" style="min-height: 25%">
    <h4 class="mb-3">{{ $title }}</h4>

    <div class="drag-items" style="min-height: 150px">

        {{ $cards }}

    </div>

    <div class="buttons">

        @include('components.add-card-btn', [
            'columnId' => $id,
        ])

    </div>
</div>
