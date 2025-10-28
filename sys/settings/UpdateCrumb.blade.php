<div class="card">
    <div class="card-body">
        <form action="{{ route('UpdateCrumb') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row g-6">

                <input type="hidden" name="id" value="1">

                <div class="col-md-7">
                    <input id="" class="form-control" type="file" name="Crumb"  />
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i></button>
                </div>

            </div>


        </form>
    </div>
</div>
