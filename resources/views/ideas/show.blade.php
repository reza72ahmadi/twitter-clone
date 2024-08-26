@extends('layout.layout')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                <div class="card overflow-hidden">
                    @include('shared.side-bar')
                </div>
            </div>
            <div class="col-6">
                @include('shared.success-message')
                <hr>
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                <div class="card mt-3">
                    <div class="card-header pb-0 border-0">
                        <h5 class="">Who to follow</h5>
                    </div>
                    @include('shared.follow-box')
                </div>
            </div>
        </div>
    </div>
@endsection
