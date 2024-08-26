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
                @include('ideas.shared.submit-idea')
                <hr>

                @if ($ideas && count($ideas) > 0)
                    @forelse ($ideas as $idea)
                        <div class="mt-3">
                            @include('ideas.shared.idea-card')
                        </div>
                    @empty
                        <h5 class="text-danger">Nothing found</h5>
                    @endforelse
                @endif

                {{ $ideas->withQueryString()->links() }}
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
