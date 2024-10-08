<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            @auth
                @if (Auth::id() === $idea->user_id)
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                        <a class="mx-2" href="{{ route('ideas.show', $idea->id) }}">View</a>
                        <button class="btn btn-sm btn-danger">X</button>
                    </form>
                @else
                    <a class="mx-2" href="{{ route('ideas.show', $idea->id) }}">View</a>
                @endif
            @endauth
            {{-- <a href="{{ route('idea.delete',$idea->id) }}">X</a>   --}}
        </div>
    </div>
    <div class="card-body">

        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3">{{ old('content', $idea->content) }}</textarea>
                    @error('content')
                        <span class="text-danger fs-6 mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif


        <div class="d-flex justify-content-between">
           @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
