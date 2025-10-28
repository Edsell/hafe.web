<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">
            <form action="{{ route('CreateCTAForm') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row g-6">


                    <div class="col-md-12">
                        <label for="" class="form-label">Title</label>
                        <input id="" class="form-control" type="text" name="Title" placeholder="Title" required />
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Description</label>
                        <textarea name="Desc" class="form-control" cols="20" rows="5" required></textarea>
                    </div>


                    <div class="col-md-6">
                        <input type="file" id="upload" name="Image" class="account-file-input"
                            accept="image/png, image/jpeg, image/jpg, image/gif" />
                            <div>Allowed JPG, GIF or PNG. Max size of 4MB</div>
                    </div>

                    <div class="col-md-6">
                        <input type="file" id="upload" name="Doc" class="account-file-input"
                            accept="application/pdf" />
                            <div>Allowed PDF. Max size of 4MB</div>
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


