@isset($AboutUs)
@foreach ($AboutUs as $dataA)
<div class="card-body">
    <form action="{{ route('CreateAboutForm') }}" method="POST">
        @csrf

        <div class="row g-6">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input class="form-control" type="text" name="Title" value="{{ $dataA->Title  }}" />
            </div>

            <div class="col-md-6">
                <label class="form-label">Years</label>
                <input class="form-control" type="text" name="Years" value="{{ $dataA->Years  }}" />
            </div>

            <div class="col-md-6">
                <label class="form-label">Background</label>
                <textarea name="Background" class="form-control" cols="30"
                    rows="5">{{ $dataA->Background  }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Achievements</label>
                <textarea name="Achievements" class="form-control" cols="30"
                    rows="5">{{ $dataA->Achievements  }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Brief</label>
                <textarea  name="Desc" class="form-control" cols="30"
                    rows="6">{{ $dataA->Desc  }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">Details</label>
                <textarea id="SCEdit" name="Details" class="form-control" cols="50"
                    rows="10">{{ $dataA->Details  }}</textarea>
            </div>
        </div>



        <div class="row justify-content-end mt-6">
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                  Update About
                </button>
            </div>
        </div>
    </form>


</div>


@endforeach
@endisset


@include('cms.CreateStatement')
@include('cms.CreateAboutImages')
<script>

    var textarea = document.getElementById('SCEdit');
    sceditor.create(textarea, {
        format: 'xhtml',
        style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
    });
    </script>
