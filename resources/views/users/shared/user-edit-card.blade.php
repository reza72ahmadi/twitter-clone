<div class="card">
    <div class="px-3 pt-4 pb-2">

        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="Mario Avatar">

                    <input name="name" class="form-control" value="{{ $user->name }}" type="text">
                    @error('name')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-2">
                <label for="">Profile Picture</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <p class="fs-6 fw-light">
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="idea" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="text-danger fs-6 mt-2">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-dark btn-sm mt-2">Save</button>
                </div>
                </p>
                @include('users.shared.user-stats')

                @auth
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth



            </div>

        </form>
    </div>
</div>
