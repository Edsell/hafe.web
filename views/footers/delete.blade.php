<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p id="deleteModalMsg"></p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
          </div>
        </div>

      </div>
    </div>
  </div>



  <script>
    $(document).ready(function () {
        let deleteRoute = "";

        // When the modal is about to be shown, update the message and set the delete route
        $('#deleteModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget); // Button that triggered the modal
            deleteRoute = button.data('route'); // Extract route from data-route attribute
            let msg = button.data('msg'); // Extract message from data-msg attribute

            // Update the modal content
            $('#deleteModalMsg').text(msg); // Ensure this ID matches the modal's message element
        });

        // Handle the delete button click
        $('#confirmDeleteBtn').on('click', function () {
            if (deleteRoute) {
                window.location.href = deleteRoute; // Redirect to the delete route
            } else {
                console.error("Delete route is not set.");
            }
        });
    });
</script>
