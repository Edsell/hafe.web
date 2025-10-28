<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">
            <form action="{{ route('CreateSliderForm') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row g-6">


                    <div class="col-md-6">
                        <label for="" class="form-label">Title</label>
                        <input id="" class="form-control" type="text" name="Title" placeholder="Title" required />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Link</label>
                        <input id="" class="form-control" type="text" name="Link" placeholder="Link" required />
                    </div>



                    <div class="button-wrapper mt-3">
                        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload Image</span>
                            <i class="icon-base bx bx-upload d-block d-sm-none"></i>
                            <input
                                type="file"
                                id="upload"
                                name="Image"
                                class="account-file-input"
                                hidden
                                accept="image/png, image/jpeg, image/jpg, image/gif" />
                        </label>

                        <div>Allowed JPG, GIF or PNG. Max size of 4MB</div>
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


