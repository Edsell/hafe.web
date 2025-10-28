@isset($Blogs)
@foreach ($Blogs as $blog)
<div class="modal modal-blur fade" id="CreateBlogTags{{ $blog->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Tags: <span class="text-danger">{{ $blog->Name }}</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('CreateBlogTags') }}" method="POST">
              @csrf
              <input type="hidden" name="BlogID" value="{{ $blog->id }}">

              <div class="mb-3">
                  <label class="form-label">Tags (separate multiple tags with commas)</label>
                  <input type="text" class="form-control" name="Tags" placeholder="e.g. Hiking, Trekking, Birding" required>
                  <small class="form-text text-muted">Use commas to separate multiple tags.</small>
              </div>

              <div class="text-end">
                  <button type="submit" class="btn btn-success">Add Tags</button>
              </div>
          </form>

        </div>
      </div>
    </div>
</div>
@endforeach
@endisset
