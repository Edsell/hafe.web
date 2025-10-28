<div class="d-flex justify-content-center mt-2">
    <h2 class="p-4">
        {{ $SS4->appends(['search' => request('search')])->links('vendor.pagination.bootstrap-5') }}
    </h2>
</div>
