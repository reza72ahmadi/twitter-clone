@extends('layout.layout')
@section('content')

    <body>
        <div class="container py-4">
            <div class="row">
                <div class="col-3">
                    <div class="card overflow-hidden">

                        @include('shared.sidebar')
                    </div>
                </div>
                <div class="col-6">
                    @include('shared.message')

                    @include('shared.idea-card')
                    <hr>
                    <div class="mt-3">
                        <div class="card">
                            @include('shared.card-body')
                            <div>
                                <div class="mb-3">
                                    <textarea class="fs-6 form-control" rows="1"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm"> Post Comment </button>
                                </div>
                                @include('shared.comment')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    @include('shared.search-box')
                    @include('shared.follow-box')
                </div>
            </div>
        </div>
    </body>
@endsection
