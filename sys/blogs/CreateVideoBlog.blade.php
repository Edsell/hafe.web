<div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $Desc }}</h5>
      <div class="card-body">
        <form action="{{ route('CreateVideoBlogForm') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="Name" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Category</label>
              <select name="CategoryID" class="form-control" required>
                @foreach($Category as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->CategoryName }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label">YouTube Link</label>
              <input type="url" name="VideoURL" class="form-control" placeholder="https://www.youtube.com/watch?v=..." required>
              <small class="text-muted">Supports full, short, embed, and shorts URLs.</small>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label">Details (optional)</label>
              <textarea name="Details" class="form-control" rows="5"></textarea>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label">Custom Thumbnail (optional)</label>
              <input type="file" name="Image" class="form-control">
              <small class="text-muted">If omitted, we’ll use the YouTube thumbnail automatically on the frontend.</small>
            </div>

            <div class="col-md-12">
              <button class="btn btn-primary">Save Video Blog</button>
              <a href="{{ route('MgtBlogs') }}" class="btn btn-secondary">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
