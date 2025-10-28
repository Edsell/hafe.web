@php $b = $Blog[0] ?? null; @endphp
<div class="col-md-12">
  <div class="card">
    <h5 class="card-header">{{ $Desc }}</h5>
    <div class="card-body">
      <form action="{{ route('UpdateVideoBlogForm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $b->id }}">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="Name" class="form-control" value="{{ $b->Name }}" required>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Category</label>
            <select name="CategoryID" class="form-control" required>
              @foreach($Category as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $b->CategoryID ? 'selected' : '' }}>
                  {{ $cat->CategoryName }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label">YouTube Link</label>
            <input type="url" name="VideoURL" class="form-control" value="{{ $b->VideoURL }}" required>
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label">Details (optional)</label>
            <textarea name="Details" class="form-control" rows="5">{{ $b->Details }}</textarea>
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label">Custom Thumbnail (optional)</label>
            <input type="file" name="Image" class="form-control">
            @if($b->Image)
              <div class="mt-2">
                <img src="{{ asset($b->Image) }}" style="width:200px;height:120px;object-fit:cover" class="rounded">
              </div>
            @endif
          </div>

          <div class="col-md-12">
            <button class="btn btn-primary">Update Video Blog</button>
            <a href="{{ route('MgtBlogs') }}" class="btn btn-secondary">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
