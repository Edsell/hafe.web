@isset($AboutUs)
@foreach ($AboutUs as $dataS)
<hr>
<h6 class="text-body-secondary">Manage Statements</h6>
<div class="card-body">
    <form action="{{ route('CreateStatement') }}" method="POST">
        @csrf

        <div class="row g-6">
          <input type="hidden" name="id" value="1">

            <div class="col-md-6">
                <label class="form-label">Mission</label>
                <textarea name="Mission" class="form-control" cols="30"
                    rows="3">{{ $dataS->Mission  }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Vision</label>
                <textarea name="Vision" class="form-control" cols="30"
                    rows="3">{{ $dataS->Vision  }}</textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Core Values</label>

                    <textarea id="SCEdit2" name="Values" class="form-control" cols="30"
                    rows="10">{{ $dataS->Values  }}</textarea>
            </div>


        </div>



        <div class="row justify-content-end mt-6">
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                  Update Statements
                </button>
            </div>
        </div>
    </form>


</div>


@endforeach
@endisset

<script>

    var textarea = document.getElementById('SCEdit2');
    sceditor.create(textarea, {
        format: 'xhtml',
        style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
    });
    </script>
