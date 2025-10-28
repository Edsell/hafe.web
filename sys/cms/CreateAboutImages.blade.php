<hr>
<h6 class="text-body-secondary">Images (About section)</h6>
<div class="card-body">
    <div class="table-responsive ">
        <table class="table table-sm tableStyle">
            <tr>
                <th>Image One</th>
                <th>Image Two</th>
                <th>Image Three</th>
            </tr>
            @isset($AboutImages)
            @foreach ($AboutImages as $data)
            <tr>
                <p class="text-center text-body-secondary">Ensure all images are less than 4mb in size</p>
                <td>
                    <form action="{{ route('CreateAboutImagesForm') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <input type="hidden" name="AboutID" id="" value="1">
                        <input type="hidden" name="id" value="{{ $data->id }}">


                        <div class="col-md-4">
                            <input type="file" id="upload" name="Image" class="account-file-input"
                                accept="image/png, image/jpeg, image/jpg, image/gif" />
                        </div>

                        <div class="col-md-4 mt-2">

                            <img src="{{ asset($data->Image) }}"
                                style="width: 200px;height:200px;object-fit:cover; border-radius:5px" alt="">
                        </div>


                </td>
                <td>

                    <div class="col-md-4">
                        <input type="file" id="upload2" name="Image2" class="account-file-input"
                            accept="image/png, image/jpeg, image/jpg, image/gif" />
                    </div>

                    <div class="col-md-4 mt-2">
                        <img src="{{ asset($data->Image2) }}"
                            style="width: 200px;height:200px;object-fit:cover; border-radius:5px" alt="">
                    </div>


                </td>
                <td>

                    <div class="col-md-4">
                        <input type="file" id="upload3" name="Image3" class="account-file-input"
                            accept="image/png, image/jpeg, image/jpg, image/gif" />
                    </div>

                    <div class="col-md-4 mt-2">

                        <img src="{{ asset($data->Image3) }}"
                            style="width: 200px;height:200px;object-fit:cover; border-radius:5px" alt="">
                    </div>


                </td>
            </tr>


            @endforeach
            @endisset


        </table>
    </div>
    <div class="row justify-content-end">
        <div class="col-12">
            <button type="submit" class="btn btn-success">Update Images</button>
        </div>
    </div>
    </form>

</div>
