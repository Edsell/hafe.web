@isset($Why)
@foreach ($Why as $dataA)
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="container">

            <form action="{{ route('UpdateWhyForm',['id'=>$dataA->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $dataA->id }}">
                <input type="hidden" name="TableName" value="whies">
                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="Title" value="{{ $dataA->Title  }}" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phrase</label>
                        <input class="form-control" type="text" name="Phrase" value="{{ $dataA->Phrase  }}" />
                    </div>

                    <div class="col-md-6">
                        <img src="{{ asset($dataA->Image) }}" style="width: 100%;height:300px;object-fit:cover" alt="">

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Image (Optional)</label>
                        <input class="form-control mb-2" type="file" name="Image" />

                    </div>
                </div>

                <div class="row justify-content-end my-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            Update Purpose
                        </button>
                    </div>
                </div>

            </form>



        </div>
    </div>
</div>


@endforeach
@endisset
