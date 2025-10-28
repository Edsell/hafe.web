@isset($Blogs)
@foreach ($Blogs as $blog)
    @foreach ($blog->paragraphs as $para)
    <div class="modal modal-blur fade" id="UpdateBlogParagraph{{ $para->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Paragraph:
                  <span class="text-danger">{{ $blog->Name }}</span>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form action="{{ route('UpdateBlogParagraph') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $para->id }}">

                  <div class="mb-3">
                      <label class="form-label">Title (Optional)</label>
                      <input class="form-control" type="text" name="Title" value="{{ $para->Title }}">
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Paragraph</label>
                      <textarea class="form-control" name="Paragraph" rows="5" required>{{ $para->Paragraph }}</textarea>
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
