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


            <form action="{{ route('idea.destroy', $idea->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a class="text-info" href="{{ route('idea.edit', $idea->id) }}">Edit</a>
                <a class="mx-1 text-success" href="{{ route('idea.show', $idea->id) }}">Show</a>
                <button type="submit" class="btn btn-danger btn-sm">X</button>

            </form>
        </div>
    </div>

</div>
@if ($editing ?? false)
    <form action="{{ route('idea.update', $idea->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="mb-3">
                <textarea class="form-control" name="content" rows="3">{{ $idea->content }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Update </button>
            </div>
        </div>
    </form>
@else
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }}</span>
            </div>
        </div>
    </div>
@endif
