<div class="card-body">
    <form action="{{ route('UpdateVideo') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row g-6">

            <div class="col-md-4">
                <label for="" class="form-label">Title</label>
                <input class="form-control" type="text" name="Title"
                       value="{{ $VideoData[0]->Title ?? '' }}" />
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Link</label>
                <input class="form-control" type="text" name="Link"
                       value="{{ $VideoData[0]->Link ?? '' }}" />
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Image</label>
                <input class="form-control" type="file" name="Image"/>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Description</label>
                <textarea name="Desc" class="form-control" id="" cols="30" rows="3">{{ $VideoData[0]->Desc ?? '' }}
                </textarea>
            </div>
            <div class="col-md-12">
                <img src="{{ asset($VideoData[0]->Image ?? '') }}" class="mt-2" style="width: 100%;height:300px;object-fit:cover;border-radius:5px" alt="">
            </div>

        </div>

        <div class="row justify-content-end mt-6">
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                    {{ isset($VideoData[0]) ? 'Update' : 'Insert' }}
                </button>
            </div>
        </div>

    </form>
</div>
