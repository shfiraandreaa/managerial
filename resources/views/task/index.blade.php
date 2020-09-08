@extends('layouts.template')

@section('title')
    Task
@endsection

@push('style')
    
@endpush

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Task List</li>
    </ol>
@endsection

@section('container')
    <div class="row">

        <div class="col-md-12 mb-2 text-right">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-task">
                Add Task
            </button>
        </div>

        @include('user.modal')

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Table Task
                </div>
                
                <div class="card-body">
                    
                    <table class="table table-responsive-sm" id="table-task">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Staff Name</th>
                                <th>Category</th>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
            
                </div>
            </div>
        
        </div>

    </div>

    @include('task.modal')

@endsection

@push('scripts')
    <script>

    $(document).ready(function () {
        category()
        staff()
        loadData()
    });

    function loadData() {
        var table = $('#table-task').DataTable({
            "ajax":{
                "url": "{{ route('task.load-data')}}",
                "dataType": "json",
                "type": "POST",
                "data" : {_token:"{{csrf_token()}}"}
            },
            "columns": [
                { name: '', data: null, render: function (val,type,data,meta) 
                    {
                        return '';
                    } 
                },
                { name:'name', data: "name", render:function (val,type,data,meta)
                    {
                        return val;
                    }
                },
                { name:'category_name', data: "category_name", render:function (val,type,data,meta)
                    {
                        return val;
                    }
                },
                { name:'task_name', data: "task_name", render:function (val,type,data,meta)
                    {
                        return val;
                    }
                },
                { name:'desc', data: "desc", render:function (val,type,data,meta)
                    {
                        return val;
                    }
                },
                { name:'start_date', data: "start_date", render:function (val,type,data,meta)
                    {
                        return val;
                    }
                },
                { name:'due_date', data: "due_date", render:function (val,type,data,meta)
                    {
                        return val;
                    }
                },
                { name:'', data: null, render:function (val,type,data,meta)
                    {
                        return "<div class='btn-group'>"+
                                    "<button type='button' class='btn btn-warning' onclick=\"edit('"+ data.id +"')\"><i class='far fa-edit'></i></button>"+
                                    "<a href='{{route('task.delete')}}/"+ data.id +"'><button type='button' class='btn btn-danger'><i class='fas fa-minus-circle'></i></button></a>"+
                                "</div>";
                    }
                },
            ],
            "columnsDefs" : [
                {
                    "targets": '_all',
                    "defaultContent": "-",
                    createdCell: function(td, cellData, rowData, row, col)
                    {
                        $(td).addClass('py-1');
                    }
                }
            ]
        })

        table.on('draw.dt',function(){
            var info = table.page.info();
            table.column(0,{search:'applied', order:'applied', page:'applied'}).nodes().each(function(cell, i) {
                cell.innerHTML= i + 1 + info.start;
            })
        })

    }

    function category() {
        $.ajax({
            type: "post",
            url: "{{route('category.load-data')}}",
            data: {_token:"{{csrf_token()}}"},
            success: function (response) {                      
                // console.log(response);
                var option = "<option>SELECT</option>"

                $.each(response.data, function (key, val) { 
                    option += "<option value='"+ val.id +"'>"+val.category_name+"</option>"
                });
                console.log(option);

                $('#id_category').html(option);
            }
        });
    }
    

    function staff() {
        $.ajax({
            type: "post",
            url: "{{route('user.get-data')}}",
            data: {_token:"{{csrf_token()}}"},
            success: function (response) {
                // console.log(response);
                var option = "<option>SELECT</option>"

                $.each(response, function (key, val) { 
                    option += "<option value='"+ val.id +"'>"+val.name+"</option>"
                });
                // console.log(option);

                $('#id_user').html(option);
            }
        });
    }

    function edit(id){
        $.ajax({
            type: "post",
            url: "{{route('task.show')}}",
            data: {_token:"{{csrf_token()}}", id:id},
            success: function (response) {
                console.log(response);
                $.each(response, function (key, val) { 
                    $('#'+key).val(val);
                });
                $("#id-task").val(response.id);
                $('#modal-task').modal('show');
            }
        });
    }

    function clearInput() {
        $('#id').val('');
        $('#id_user').val('');
        category()
        staff()
        $('#task_name').val('');
        $('#desc').val('');
        $('#start_date').val('');
        $('#due_date').val('');
    }

    </script>
@endpush

