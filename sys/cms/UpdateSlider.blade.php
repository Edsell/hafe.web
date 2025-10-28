@isset($Slider)
@foreach ($Slider as $data)

<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">
            <form action="{{ route('UpdateSliderForm') }}" method="POST">
                @csrf
                <div class="row g-6">

                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="col-md-6">
                        <label for="" class="form-label">Title</label>
                        <input id="" class="form-control" type="text" name="Title" value="{{ $data->Title }}"  />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Link</label>
                        <input id="" class="form-control" type="text" name="Link" value="{{ $data->Link }}" />
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

