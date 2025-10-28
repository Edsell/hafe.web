<div class="modal fade" id="dispenseConfirmModal" tabindex="-1" aria-labelledby="dispenseConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dispenseConfirmLabel">Confirm Transaction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="dispenseModalMsg">
          <!-- JavaScript will populate this -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success" id="confirmDispenseSubmitBtn">Yes, Proceed</button>
        </div>
      </div>
    </div>
  </div>




  <script>
    $(document).ready(function () {
      let formToSubmit = null;
      let confirmMessage = "";

      // Capture the form and message when the button is clicked
      $('#openDispenseModalBtn').on('click', function (e) {
        formToSubmit = $(this).closest('form');
        confirmMessage = $(this).data('msg') || "Are you sure?";
        $('#dispenseModalMsg').text(confirmMessage);
        $('#dispenseConfirmModal').modal('show');
      });

      // When user confirms, submit the form
      $('#confirmDispenseSubmitBtn').on('click', function () {
        if (formToSubmit) {
          formToSubmit.submit();
        }
      });
    });
  </script>
