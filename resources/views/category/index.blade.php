@extends('layouts.template')

@section('title')
    - Category
@endsection

@push('style')
    
@endpush

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Category</li>
    </ol>
@endsection

@section('container')
    <div class="row">

        <div class="col-md-12 mb-2 text-right">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-category" onclick="clearInpu()">
                Add Category
            </button>
        </div>

        @include('category.modal')

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Table Category
                </div>
                
                <div class="card-body">
                    
                    <table class="table table-responsive-sm" id="table-category">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
            
                </div>
            </div>
        
        </div>
        
    </div>

@endsection

@push('scripts')
    
    <script>

        $(document).ready(function () {
            loadData()
        });

        function loadData() {
            var table = $('#table-category').DataTable({
                "ajax":{
                    "url": "{{ route('category.load-data')}}",
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
                    { name:"category_name", data: "category_name", render:function (val,type,data,meta)
                        {
                            return val;
                        }
                    },
                    { name:'', data: null, render:function (val,type,data,meta)
                        {
                            return "<div class='btn-group'>"+
                                        "<button type='button' class='btn btn-warning' onclick=\"edit('"+ data.id +"')\"><i class='far fa-edit'></i></button>"+
                                        "<a href='{{route('category.delete')}}/"+ data.id +"'><button type='button' class='btn btn-danger'><i class='fas fa-minus-circle'></i></button></a>"+
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

        function edit(id) {
            $.ajax({
                type: "post",
                url: "{{route('category.show')}}",
                data: {_token:"{{csrf_token()}}", id:id},
                success: function (response) {
                    $.each(response, function (key, val) { 
                        $('#'+key).val(val);
                    });
                    $('#modal-category').modal('show');
                    console.log(response);
                }
            });
        }

        function clearInput() {
            $('#id').val('');
            $('#category_name').val('');
        }

    </script>

    

@endpush

