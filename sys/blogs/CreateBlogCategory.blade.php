<div class="card">
    <div class="card-body">
        <form action="{{ route('CreateBlogCategory') }}" method="POST">
            @csrf
            <div class="row g-6">


                <div class="col-md-7">
                    <input id="" class="form-control" type="text" name="CategoryName" placeholder="Category Name" />
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i></button>
                </div>

            </div>


        </form>
    </div>
</div>
