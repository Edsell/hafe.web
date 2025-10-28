@isset($Blogs)
@foreach ($Blogs as $blog)
    @foreach ($blog->quotes as $quote)
    <div class="modal modal-blur fade" id="UpdateBlogQuote{{ $quote->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Quote:
                  <span class="text-danger">{{ $blog->Name }}</span>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form action="{{ route('UpdateBlogQuote') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $quote->id }}">

                  <div class="mb-3">
                      <label class="form-label">Quote</label>
                      <textarea name="Quote" class="form-control" rows="5" required>{{ $quote->Quote }}</textarea>
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Author (Optional)</label>
                      <input type="text" name="Author" class="form-control" value="{{ $quote->Author }}">
                  </div>

                  <div class="text-end">
                      <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </form>

            </div>
          </div>
        </div>
    </div>
    @endforeach
@endforeach
@endisset
