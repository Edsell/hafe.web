<div class="card-body">
    <form action="{{ route('CreateAboutForm') }}" method="POST">
        @csrf
        @if(isset($AboutData[0]))
        <div class="row g-6">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" name="Title" value="{{ $AboutData[0]->Title ?? '' }}" />
            </div>

            <div class="col-md-6">
                <label class="form-label">Years</label>
                <input class="form-control" type="text" name="Years" value="{{ $AboutData[0]->Years ?? '' }}" />
            </div>

            <div class="col-md-6">
                <label class="form-label">Background</label>
                <textarea name="Background" class="form-control" cols="30"
                    rows="10">{{ $AboutData[0]->Background ?? '' }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Achievements</label>
                <textarea name="Achievements" class="form-control" cols="30"
                    rows="10">{{ $AboutData[0]->Achievements ?? '' }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Description</label>
                <textarea name="Desc" class="form-control" cols="30"
                    rows="10">{{ $AboutData[0]->Desc ?? '' }}</textarea>
            </div>
        </div>

        @else
        <p>No About Us data available.</p>
        @endif

        <div class="row justify-content-end mt-6">
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                    {{ isset($AboutData[0]) ? 'Update' : 'Insert' }}
                </button>
            </div>
        </div>
    </form>
</div>
