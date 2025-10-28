@isset($Blog)
@foreach ($Blog as $data)
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">
            <form action="{{ route('UpdateBlogForm') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row g-6">

                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="TableName" value="blogs">

                    <div class="col-md-3">
                        <label for="" class="form-label">Category</label>

                        <select name="CategoryID" class="form-select" id="">
                            <option value="{{ $data->CatID }}">{{ $data->CategoryName }}</option>
                            @foreach ($Category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->CategoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Blog Name</label>
                        <input id="" class="form-control" type="text" name="Name" value="{{ $data->Name }}" />
                    </div>


                    <div class="col-md-3 button-wrapper">
                        <label for="" class="form-label">Allowed JPG, GIF or PNG. Max size of 2MB</label>
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

                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label">Details</label>
                        <textarea name="Details" class="form-control" cols="30" rows="5">{{ $data->Details }}</textarea>
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




@endforeach
@endisset
