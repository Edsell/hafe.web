@isset($About)
@foreach ($About as $dataA)
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="container">

            <form action="{{ route('UpdateAbout') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $dataA->id }}">
                <input type="hidden" name="TableName" value="abouts">

                <div class="row g-6">
                    <!-- Title -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="Title" value="{{ $dataA->Title }}" />
                    </div>

                    <!-- Details -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Details</label>
                        <textarea class="form-control" name="Details" rows="5">{{ $dataA->Details }}</textarea>
                    </div>

                    <!-- Image Preview -->
                    <div class="col-md-6 mb-3">
                        @if(!empty($dataA->Image))
                        <img src="{{ asset($dataA->Image) }}" style="width: 100%;height:300px;object-fit:cover"
                            alt="About Image">
                        @else
                        <p>No image uploaded</p>
                        @endif
                    </div>

                    <!-- Upload New Image -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Image (Optional)</label>
                        <input class="form-control" type="file" name="Image" />
                    </div>
                </div>

                <!-- Submit -->
                <div class="row justify-content-end my-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            Update About Us
                        </button>
                    </div>
                </div>

            </form>

            <hr>

            <div class="col-12">
                <div class="me-3 mb-3">
                    <a href="#CreateAboutParagraph" data-bs-toggle="modal" class="btn btn-dark btn-sm me-2">
                        <i class="bx bx-plus"></i> Paragraph
                    </a>
                    <a href="#CreateAboutPoints" data-bs-toggle="modal" class="btn btn-dark btn-sm">
                        <i class="bx bx-plus"></i> Point
                    </a>
                </div>

                <!-- Points List -->
                <ul class="mb-4">
                    @foreach ($Points as $dataP)
                        <li class="mb-2">
                            {{ $dataP->Point }} -
                            <a href="#deleteModal" data-bs-toggle="modal"
                               data-route="{{ route('MassDelete', ['id' => $dataP->id, 'TableName' => 'about_points']) }}"
                               data-msg="Are you sure you want to delete this point? This action is not reversible">
                                <i class="bx bx-trash text-danger" aria-hidden="true"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Paragraphs -->
                <div class="row">
                    @foreach ($Paragraphs as $index => $dataG)
                        <div class="col-12 col-md-6 mb-4">
                            <h4>{{ $dataG->SubTitle }}</h4>
                            <p>{{ $dataG->Paragraph }}</p>
                            <hr>
                            <a class="btn btn-info btn-sm"
                               href="#UpdateAboutParagraph{{ $dataG->id }}" data-bs-toggle="modal">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm"
                               href="#deleteModal" data-bs-toggle="modal"
                               data-route="{{ route('MassDelete', ['id' => $dataG->id, 'TableName' => 'about_paragraphs']) }}"
                               data-msg="Are you sure you want to delete this paragraph? This action is not reversible">
                                <i class="bx bx-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>

    </div>
</div>
@endforeach
@endisset

@include('cms.CreateAboutPoints')
@include('cms.CreateAboutParagraph')
@include('cms.UpdateAboutParagraph')
