<div class="modal modal-blur fade" id="CreateGallery" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Gallery Images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>


            <div class="modal-body">

                <form enctype="multipart/form-data" novalidate class="row g-3 needs-validation"
                    method="POST" action="{{ route('CreateGallery') }}">
                    @csrf

                <p class="text-center text-body-secondary"> This form allows multiple images at the same time...</p>

                    <div class="mb-3">

                        <label class="form-label">Gallery Image *</label>
                        <input name="Image[]" multiple required type="file" class="form-control"
                            id="">
                    </div>


                    <div class="modal-footer">
                        <a href="#" class="btn btn-pill btn-dark" data-bs-dismiss="modal">
                            <i class="fas me-1 fa-times" aria-hidden="true"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-success ms-auto">
                            <i class="fas me-1 fa-check" aria-hidden="true"></i>
                            Upload Images
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
