@isset($CTA)
@foreach ($CTA as $data)
<div class="modal modal-blur fade" id="CTAFile{{ $data->id }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="text-danger">{{ $data->Title }}</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

               <iframe src="{{ asset($data->Doc) }}" style="width:100%; min-height:800px" frameborder="0"></iframe>

            </div>
        </div>
    </div>
</div>

@endforeach
@endisset
