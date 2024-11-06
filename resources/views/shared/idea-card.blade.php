<h4> Share yours ideas </h4>
<form action="{{route('idea.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="mb-3">
            <textarea class="form-control" name="content" rows="3"></textarea>
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </div>
</form>
