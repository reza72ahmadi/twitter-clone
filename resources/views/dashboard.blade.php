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
            @foreach ($ideas as $idea)
                <div class="mt-3">
                   @include('shared.idea-card')
                </div>
            @endforeach
            <div class="mt-2">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-box')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
