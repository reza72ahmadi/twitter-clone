@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.sidebar')
        </div>
        <div class="col-6">
            @include('shared.message')
            {{-- @include('shared.submit-idea') --}}
            {{-- <hr> --}}
           
                <div class="mt-3">
                   @include('shared.idea-card')
                </div>
           
            <div class="mt-2">
               
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-box')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
