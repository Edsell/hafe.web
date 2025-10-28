@isset($Blogs)
@foreach ($Blogs as $data)
<div class="modal modal-blur fade" id="CreateBlogParagraph{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">New Paragraph: <span class="text-danger"> {{ $data->Name }}</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <form action="{{ route('CreateBlogParagraph') }}" method="POST">
              @csrf
              <div class="row g-6">

                <input type="hidden" name="BlogID" value="{{ $data->id }}" id="">
                  <div class="col-md-12">
                      <label for="" class="form-label">Title (Optional)</label>
                      <input id="" class="form-control" type="text" name="Title" placeholder="Title" />
                  </div>
                  <div class="col-md-12">
                      <label for="" class="form-label">Paragraph</label>
                      <textarea name="Paragraph" id="" class="form-control" cols="30" rows="10" required></textarea>
                  </div>

              </div>

              <div class="row justify-content-end mt-6">
                  <div class="col-12">
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
