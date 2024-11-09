<div class="card mt-3">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <div class="fa-pull-right">
                <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    <a href="{{ route('ideas.show', $idea->id) }}">Show</a>
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    @if ($editing ?? false)
        <div class="row">
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" name="content" rows="3">{{ $idea->content }}</textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        </div>
    @else
        <div class="card-body">
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span>{{ $idea->likes }}</a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }}</span>
                </div>
            </div>
            @include('shared.comment-box')
        </div>
    @endif

</div>
