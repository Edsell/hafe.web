<div class="card">
    <h5 class="card-header">{{ $Desc }}</h5>
    <div class="card-body">
        <form action="{{ route('CreateSliderForm') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Phrase 1</label>
                <input type="text" name="Phrase" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phrase 2 (Continuation of Phrase 1)</label>
                <input type="text" name="Span" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <input type="text" name="Text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="Image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('MgtSlider') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
