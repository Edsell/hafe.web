<div class="card-body">
    <form action="{{ route('UpdateCounter') }}" method="POST">
        @csrf
        <div class="row g-6">

            <div class="col-md-3">
                <label for="" class="form-label">Courses</label>
                <input class="form-control" type="text" name="Courses"
                       value="{{ $CounterData[0]->Courses ?? '' }}" />
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">Students</label>
                <input class="form-control" type="text" name="Students"
                       value="{{ $CounterData[0]->Students ?? '' }}" />
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">Staff</label>
                <input class="form-control" type="text" name="Staff"
                       value="{{ $CounterData[0]->Staff ?? '' }}" />
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">Awards</label>
                <input class="form-control" type="text" name="Awards"
                       value="{{ $CounterData[0]->Awards ?? '' }}" />
            </div>

        </div>

        <div class="row justify-content-end mt-6">
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                    {{ isset($CounterData[0]) ? 'Update' : 'Insert' }}
                </button>
            </div>
        </div>

    </form>
</div>
