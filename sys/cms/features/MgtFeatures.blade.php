<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }} <br> <span class="text-white badge badge-info">Edit rather than delete a feature</span></h5>
        <div class="table-responsive text-nowrap">

                <div class="float-end me-3">
                    <a href="#CreateFeature" data-bs-toggle="modal" class="btn btn-primary btn-sm mb-2"><i class="bx bx-plus"></i></a>
            </div>
                <table class="table table-sm tableStyle">
                    <thead>
                      <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @isset($Features)
                        @foreach ($Features as $data)
                            <tr>

                                <td><img src="{{ asset($data->Icon) }}"  class="rounded" style="width: 100px;height:100px;object-fit:cover" alt=""></td>
                                <td>{{ $data->Title }}</td>
                                <td>{{ $data->Desc }}</td>

                                <td>
                                    <a href="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-sm shadow"
                                        data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'features']) }}"
                                        data-msg="Are you sure you want to delete this feature: {{ $data->Title }}? This action is not reversible"><i class="bx bx-trash" aria-hidden="true"></i>
                                        </a>
                                        <a href="#UpdateFeature{{ $data->id }}" data-bs-toggle="modal" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>


        </div>
      </div>
    </div>


@include('cms.features.CreateFeature')
@include('cms.features.UpdateFeature')
