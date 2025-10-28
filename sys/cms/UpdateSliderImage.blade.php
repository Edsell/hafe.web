@isset($Slider)
@foreach ($Slider as $data)

<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">
            <form action="{{ route('UpdateSliderImageForm') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row g-6">

                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="col-md-6">
                        <label for="" class="form-label">Select Image</label>
                        <input type="file" id="upload" name="Image" class="account-file-input"
                        accept="image/png, image/jpeg, image/jpg, image/gif" />
                        <div>Allowed JPG, GIF or PNG. Max size of 4MB</div>
                    </div>

                    <div class="col-md-6">
                        <img
                            src="{{ asset($data->Image) }}"
                            alt="Image"
                            class="d-block rounded" style="width: 100%;height:300px;object-fit:cover"
                            id="uploadedAvatar" />
                    </div>



                </div>

                <div class="row justify-content-end mt-6">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endforeach
@endisset

