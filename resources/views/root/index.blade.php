@extends('layouts.app')

@section('content')
    <div class="row gx-5" style="min-height: 100vh">
        @foreach($columns as $column)

            <div class="col">

                <x-column :id="$column->id" :title="$column->title">

                    <x-slot:cards>
                        @foreach($column->cards as $card)
                            <x-card :id="$card->id" :title="$card->title" :description="$card->description"/>
                        @endforeach
                    </x-slot:cards>

                </x-column>

            </div>

        @endforeach
    </div>

    <div id="templates" class="d-none">

        <x-card />

    </div>
@endsection

@push('modals')
    @include('components.add-card-modal')
    @include('components.card-modal')
@endpush
