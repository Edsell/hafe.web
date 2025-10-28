<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="table-responsive {{-- text-nowrap --}}">
            {{-- @include('headers.search') --}}

                <div class="float-end me-3">
                    <a href="{{ route('CreateCTA') }}" class="btn btn-primary btn-sm mb-2"><i class="bx bx-plus"></i></a>
            </div>
                <table class="table table-sm tableStyle">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Doc</th>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @isset($CTA)
                        @foreach ($CTA as $data)
                            <tr>

                                <td><img src="{{ asset($data->Image) }}"  class="rounded" style="width: 100px;height:140px;object-fit:cover" alt=""></td>
                                <td>
                                    <a href="#CTAFile{{ $data->id }}" data-bs-toggle="modal" class="btn btn-warning btn-sm">View</a>

                                    {{-- <a data-doc="{{ $data->Title }}"
                                        data-source="{{ asset($data->Doc) }}"
                                        data-bs-toggle="modal" href="#CTAFile{{ $data->id }}"
                                        class="btn  PdfViewer btn-danger btn-shadow">
                                        <i class="bx me-1  bx-file" aria-hidden="true"></i>
                                    </a> --}}

                                </td>
                                <td>{{ $data->Title }}</td>
                                <td>{{ $data->Desc }}</td>
                                <td>
                                    <form action="{{ route('ActivateCTA') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="form-check form-switch mb-2">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="ActiveStatusToggle"
                                                onChange="this.form.submit()"
                                                id="statusSwitch{{ $data->id }}"
                                                {{ $data->status == 'true' ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="statusSwitch{{ $data->id }}"></label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <a href="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-sm shadow"
                                        data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'call_to_actions']) }}"
                                        data-msg="Are you sure you want to delete this record: {{ $data->Title }}? This action is not reversible"><i class="bx bx-trash" aria-hidden="true"></i>
                                        </a>
                                        {{-- <a href="{{ route('UpdateSlider',['id'=>$data->id]) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a> --}}
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

@include('cms.CTAFile')
