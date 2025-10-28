@isset($Gallery)
@foreach ($Gallery as $data)
<div class="modal modal-blur fade" id="ViewImage{{ $data->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title">Add Gallery Images</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            {{-- <div class="modal-body"> --}}
                <img src="{{ asset($data->Image) }}" style="width: 100%" alt="">

            {{-- </div> --}}
        </div>
    </div>
</div>

@endforeach
@endisset
