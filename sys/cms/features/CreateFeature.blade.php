<div class="modal modal-blur fade" id="CreateFeature" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Feature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
        aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form action="{{ route('CreateFeature') }}" method="POST">
            @csrf
            <div class="row g-6">

                <div class="col-md-6">
                    <label for="" class="form-label">Title</label>
                    <input id="" class="form-control" type="text" name="Title" placeholder="Title" required />
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Icon</label>
                    <select name="Icon" class="form-select" id="">
                        <option value="">-- Select Icon --</option>
                        <option value="assets/img/icon/scholarship.svg">Scholarship</option>
                        <option value="assets/img/icon/teacher.svg">Teacher</option>
                        <option value="assets/img/icon/library.svg">Library</option>
                        <option value="assets/img/icon/money.svg">Money</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-label">Description</label>
                    <textarea name="Desc" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="row mt-2">
                    <p>Icons example</p>
                    <div class="col-md-3 text-center">
                        <label class="form-label">Scholarship</label><br>
                        <img src="{{ asset('assets/img/icon/scholarship.svg') }}" style="width: 100px;height:100px" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <label class="form-label">Teacher</label><br>
                        <img src="{{ asset('assets/img/icon/teacher.svg') }}" style="width: 100px;height:100px" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <label class="form-label">Library</label><br>
                        <img src="{{ asset('assets/img/icon/library.svg') }}" style="width: 100px;height:100px" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <label class="form-label">Money</label><br>
                        <img src="{{ asset('assets/img/icon/money.svg') }}" style="width: 100px;height:100px" alt="">
                    </div>
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

