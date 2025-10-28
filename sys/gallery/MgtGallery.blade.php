<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="table-responsive text-nowrap">

            <div class="float-end me-3">
                <a data-bs-toggle="modal" href="#CreateGallery" class="btn btn-primary btn-sm mb-2"><i
                        class="bx bx-plus"></i></a>
            </div>
        </div>
        <div class="card-body">

            <div class="row mb-12 g-6">

                @isset($Gallery)
                @foreach ($Gallery as $data)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset($data->Image) }}"
                            style="width: 100%;height:300px;object-fit:cover"
                            alt="gallery photos - {{ $generalSettings->CompanyName }}" />
                        <div class="card-body">
                            <a href="#ViewImage{{ $data->id }}"  data-bs-toggle="modal" class="btn btn-outline-primary btn-sm"><i
                                    class="bx bx-bxs-binoculars"></i></a>
                            <a href="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-sm shadow"
                                data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'galleries']) }}"
                                data-msg="Are you sure you want to delete this photo? This action is not reversible"><i
                                    class="bx bx-trash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset


            </div>
        </div>
    </div>
</div>

@include('gallery.CreateGallery')
@include('gallery.ViewImage')
