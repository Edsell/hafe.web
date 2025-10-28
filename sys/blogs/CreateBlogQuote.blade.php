@isset($Blogs)
@foreach ($Blogs as $data)
<div class="modal modal-blur fade" id="CreateBlogQuote{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Quote: <span class="text-danger"> {{ $data->Name }}</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('CreateBlogQuote') }}" method="POST">
              @csrf
              <div class="row g-6">

                <input type="hidden" name="BlogID" value="{{ $data->id }}">

                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Quote</label>
                    <textarea name="Quote" class="form-control" rows="5" required></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Author (Optional)</label>
                    <input class="form-control" type="text" name="Author" placeholder="Author name" />
                </div>

              </div>

              <div class="row justify-content-end mt-3">
                  <div class="col-12 text-end">
                      <button type="submit" class="btn btn-success">Submit</button>
                  </div>
              </div>

          </form>

        </div>
      </div>
    </div>
</div>
@endforeach
@endisset
