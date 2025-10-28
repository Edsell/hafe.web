<div class="modal modal-blur fade" id="CreateAboutPoints" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Create About Us Point</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <form action="{{ route('CreateAboutPoints') }}" method="POST">
              @csrf
              <div class="row g-6">

                <input type="hidden" name="AboutID" value="1" id="">
                  <div class="col-md-12">
                      <label for="" class="form-label">Point</label>
                      <input id="" class="form-control" type="text" name="Point" placeholder="Point" required />
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

