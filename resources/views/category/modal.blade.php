<div class="modal fade" id="modal-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="label-category">Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <input type="hidden" name="id" id="id">
                
                    <div class="form-group">
                        <label>Category Name : </label>
                        <input type="text" name="category_name" id="category_name" class="form-control">
                    </div>
                    
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
      
    </div>
</div>