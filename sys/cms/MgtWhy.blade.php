<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="container">

            <form action="{{ route('CreateWhy') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="Title" required />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phrase</label>
                        <input class="form-control" type="text" name="Phrase" required />
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Image </label>
                        <input class="form-control mb-2" type="file" name="Image" />

                    </div>
                </div>

                <div class="row justify-content-end my-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </div>

            </form>





    <table class="table table-sm tableStyle">
        <thead>
            <tr>
                <th width="10%">Image</th>
                <th width="30%">Title</th>
                <th width="45%">Phrase</th>
                <th width="15%">Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @isset($Why)
            @foreach ($Why as $data)
            <tr>

                <td><img src="{{ asset($data->Image) }}" class="rounded"
                        style="width: 100px;height:100px;object-fit:cover" alt=""></td>
                <td>{{ $data->Title }}</td>
                <td>{{ $data->Phrase }}</td>

                <td>
                    <a href="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-sm shadow"
                        data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'whies']) }}"
                        data-msg="Are you sure you want to delete this purpose: {{ $data->Title }}? This action is not reversible"><i
                            class="bx bx-trash" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('UpdateWhy',['id'=>$data->id]) }}" class="btn btn-info btn-sm"><i
                            class="bx bx-edit"></i></a>
                </td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>



</div>
</div>
</div>
