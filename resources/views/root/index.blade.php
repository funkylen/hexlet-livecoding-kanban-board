@extends('layouts.app')

@push('scripts')
    @vite(['resources/js/root/index.js'])
@endpush

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

                    <x-slot:buttons>
                        <x-add-card :column-id="$column->id"/>
                    </x-slot:buttons>

                </x-column>

            </div>

        @endforeach
    </div>
@endsection
