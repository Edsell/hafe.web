<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>


        <div class="table-responsive text-nowrap">
            <div class="float-end me-3">
                <a href="{{ route('CreateSlider') }}" class="btn btn-primary btn-sm mb-2">
                    <i class="bx bx-plus"></i> Add Slider
                </a>
            </div>

            <table class="table table-sm tableStyle">
                <thead>
                    <tr>
                        <th width="20%">Image</th>
                        <th width="20%">Phrase</th>
                        <th width="20%">Span</th>
                        <th width="20%">Text</th>
                        <th width="10%">Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>
                                @if($slider->Image)
                                    <img src="{{ asset($slider->Image) }}" class="rounded"
                                         style="width: 150px;height:100px;object-fit:cover" alt="">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $slider->Phrase }}</td>
                            <td>{{ $slider->Span }}</td>
                            <td>{{ $slider->Text }}</td>
                            <td>
                                <form action="{{ route('sliders.toggleStatus', $slider->id) }}" method="POST">
                                    @csrf
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" onChange="this.form.submit()"
                                               {{ $slider->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('UpdateSlider', $slider->id) }}" class="btn btn-info btn-sm">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#deleteModal" data-bs-toggle="modal"
                                       data-route="{{ route('MassDelete', ['id' => $slider->id, 'TableName' => 'sliders']) }}"
                                       data-msg="Are you sure you want to delete this record: {{ $slider->Phrase }}? This action is not reversible">
                                       <i class="bx bx-trash" aria-hidden="true"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
