@extends('layouts.app')

@section('content')
    <div class="row gx-5" style="min-height: 100vh">
        <div class="col">
            <x-column title="To Do">

                <x-slot:cards>
                    @foreach([1,2,3] as $id)
                        <x-card :id="$id" :title="'Task' . $id" :description="'Hello' . $id"/>
                    @endforeach
                </x-slot:cards>

                <x-slot:buttons>
                    @include('components.add-card')
                </x-slot:buttons>

            </x-column>
        </div>

        <div class="col">
            <x-column title="In Progress">
                <x-slot:cards>
                    @foreach([4,5,6] as $id)
                        <x-card :id="$id" :title="'Task' . $id" :description="'Hello' . $id"/>
                    @endforeach
                </x-slot:cards>

                <x-slot:buttons>
                    @include('components.add-card')
                </x-slot:buttons>

            </x-column>
        </div>

        <div class="col">
            <x-column title="Done">
                <x-slot:cards>
                    @foreach([7,8,9] as $id)
                        <x-card :id="$id" :title="'Task' . $id" :description="'Hello' . $id"/>
                    @endforeach
                </x-slot:cards>

                <x-slot:buttons>
                    @include('components.add-card')
                </x-slot:buttons>

            </x-column>
        </div>
    </div>
@endsection
