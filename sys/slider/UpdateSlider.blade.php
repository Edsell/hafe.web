<div class="card">
    <h5 class="card-header">{{ $Desc }}</h5>
    <div class="card-body">
        <form action="{{ route('UpdateSliderForm', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}

            <input type="hidden" name="id" value="{{ $slider->id }}" id="">
            <input type="hidden" name="TableName" value="sliders" id="">
            <div class="mb-3">
                <label>Phrase</label>
                <input type="text" name="Phrase" value="{{ $slider->Phrase }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Span</label>
                <input type="text" name="Span" value="{{ $slider->Span }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Text</label>
                <input type="text" name="Text" value="{{ $slider->Text }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Current Image</label><br>
                @if($slider->Image)
                    <img src="{{ asset($slider->Image) }}" width="200" class="mb-2">
                @else
                    <p class="text-muted">No Image</p>
                @endif
            </div>
            <div class="mb-3">
                <label>Upload New Image</label>
                <input type="file" name="Image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('MgtSlider') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
