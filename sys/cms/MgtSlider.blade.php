<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="table-responsive text-nowrap">
            {{-- @include('headers.search') --}}

                <div class="float-end me-3">
                    <a href="{{ route('CreateSlider') }}" class="btn btn-primary btn-sm mb-2"><i class="bx bx-plus"></i></a>
            </div>
                <table class="table table-sm tableStyle">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @isset($Sliders)
                        @foreach ($Sliders as $data)
                            <tr>

                                <td><img src="{{ asset($data->Image) }}"  class="rounded" style="width: 100%;height:100px;object-fit:cover" alt=""></td>
                                <td>{{ $data->Title }}</td>
                                <td>{{ $data->Link }}</td>
                                <td>

                                    <a href="{{ route('UpdateSliderImage',['id'=>$data->id]) }}" class="btn btn-warning btn-sm"><i class="bx bx-image"></i></a>

                                </td>
                                <td>
                                    <a href="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-sm shadow"
                                        data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'sliders']) }}"
                                        data-msg="Are you sure you want to delete this slider: {{ $data->Title }}? This action is not reversible"><i class="bx bx-trash" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('UpdateSlider',['id'=>$data->id]) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                @include('footers.pagination')


        </div>
      </div>
    </div>


