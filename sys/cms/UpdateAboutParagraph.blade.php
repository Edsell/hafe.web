@isset($Paragraphs)
@foreach ($Paragraphs as $data)
<div class="modal modal-blur fade" id="UpdateAboutParagraph{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Paragraph</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <form action="{{ route('UpdateAboutParagraph') }}" method="POST">
              @csrf
              <div class="row g-6">

                <input type="hidden" name="id" value="{{ $data->id }}" id="">
                  <div class="col-md-12">
                      <label for="" class="form-label">Subtitle (Optional)</label>
                      <input id="" class="form-control" type="text" name="SubTitle" value="{{ $data->SubTitle }}" />
                  </div>
                  <div class="col-md-12">
                      <label for="" class="form-label">Paragraph</label>
                      <textarea name="Paragraph" id="" class="form-control" cols="30" rows="10">{{ $data->Paragraph }}</textarea>
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
