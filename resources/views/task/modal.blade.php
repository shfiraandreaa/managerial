<div class="modal fade" id="modal-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="{{route('task.store')}}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="task-label">Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="id-task">
                
                    <div class="form-group">
                        <label>Staff Name : </label>
                        <select name="id_user" id="id_user" class="form-control">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category Name : </label>
                        <select name="id_category" id="id_category" class="form-control">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Task Name : </label>
                        <input type="text" name="task_name" id="task_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description : </label>
                        <input type="text" name="desc" id="desc" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label>Start Date : </label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Due Date : </label>
                        <input type="date" name="due_date" id="due_date" class="form-control">
                    </div>
                    
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
      
    </div>
</div>