<div>
    @auth
        @if (Auth::user()->likeIdea($idea))
            <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6" style="background: none; border: none; padding: 0;">
                    <span class="far fa-heart me-1"></span> {{ $idea->likes()->count() }}
                </button>
            </form>
        @else
            <form action="{{ route('ideas.like', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6" style="background: none; border: none; padding: 0;">
                    <span class="fas fa-heart me-1"></span> {{ $idea->likes()->count() }}
                </button>
            </form>
        @endif
    @endauth
    @guest
        <a href="{{ route('login') }}" type="submit" class="fw-light nav-link fs-6"
            style="background: none; border: none; padding: 0;">
            <span class="fas fa-heart me-1"></span> {{ $idea->likes()->count() }}
        </a>
    @endguest
</div>
