@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.sidebar')
        </div>
        <div class="col-6">
            @include('shared.message')

            @include('shared.submit-idea')
            <hr>
            <div class="mt-3">
                @foreach ($ideas as $idea)
                    @include('shared.idea-card')
                @endforeach
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-box')
            @include('shared.follow-box')
        </div>
    </div>
    </div>
@endsection
