<div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            showToast('Success', "{{ session('success') }}", 'success');
        @endif

        @if (session('error'))
            showToast('Failed', "{{ session('error') }}", 'danger');
        @endif

        function showToast(title, message, type) {
            const toast = document.createElement('div');
            toast.className = `bs-toast toast fade show bg-${type}`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            toast.innerHTML = `
                <div class="toast-header">
                    <i class="icon-base bx bx-check me-2"></i>
                    <div class="me-auto fw-medium">${title}</div>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            `;

            document.getElementById('toast-container').appendChild(toast);

            const toastInstance = new bootstrap.Toast(toast);
            toastInstance.show();

            // Auto-hide after 5 seconds
            setTimeout(() => {
                toastInstance.hide();
            }, 5000);
        }
    });
</script>
