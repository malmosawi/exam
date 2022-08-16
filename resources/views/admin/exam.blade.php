@extends('theme.default')
@section('content')
    <!-- app-content-->
    <div class="container content-area">
        <div class="side-app">

            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">exam</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exam</h3>
                            <div class="card-options">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal3"><i class="fa fa-plus-circle"></i> New Exam</button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th >Title</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Exam as $i=>$item)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td class="text-nowrap align-middle title">{{$item->title}}</td>
                                            <td class="text-nowrap align-middle date"><span>{{$item->date}}</span></td>
                                            <td class="text-nowrap align-middle status"><span>{{($item->status==1)?'Active':'Inactive'}}</span></td>
        
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-info badge add " data-target="#user-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}"><i class="fa fa-plus"></i></button>
                                                    <button class="btn btn-sm btn-info badge edit " data-target="#exampleModal3" data-toggle="modal" type="button" data-id="{{$item->id}}"><i class="fa fa-edit"></i></button>
                                                    <form action="{{route('admin.deleteexam', $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-primary badge" type="submit"><i class="fa fa-close"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
        
                                    </tbody>
                                </table>
                            </div>
        

                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->

        </div>


    </div>
    <!-- End app-content-->

    <!-- Message Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">New Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.exam')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Exam Title</label>
                                    <input type="text" class="form-control"  placeholder="Exam Tilte"  name="title" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="date">Exam Date</label>
                                    <input type="date" class="form-control"placeholder="Exam Date"  name="date" value=""required>
                                </div>
                                <div class="form-group">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" class="custom-switch-input"  checked="checked">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">avtive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success mt-1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="user-form-modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.studentinexam')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
						<!-- row -->
						<div class="row">
							<div class="col-lg-12">
                                <div class="e-table">
                                    <div class="table-responsive table-lg">
                                        <table class="table table-bordered" id="studenttable">
                                            <thead>
                                                <tr>
                                                    <th  class="text-center"></th>
                                                    <th >Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Student as $item)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                <input class="custom-control-input" id="student-{{$item->id}}" type="checkbox" name="student[{{$item->id}}][user_id]" value="{{$item->id}}"> <label class="custom-control-label" for="student-{{$item->id}}"></label>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap align-middle">{{$item->name}}</td>
                                                        <td hidden>
                                                            <input class="exam_id"  type="text" name="student[{{$item->id}}][exam_id]" >
                                                        </td>
                                                    </tr>
                                                @endforeach
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- row  end -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        <button type="submit" class="btn btn-success mt-1" data-id="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exam-form-modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.updateexam')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Exam Tilte</label>
                                    <input type="number" class="form-control" id="id" placeholder="Exam Tilte"  name="id" value="" required hidden>
                                    <input type="text" class="form-control" id="title" placeholder="Exam Tilte"  name="title" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="date">Exam Date</label>
                                    <input type="date" class="form-control" id="date" placeholder="Exam Date"  name="date" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" class="custom-switch-input" id="status" checked="checked">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">avtive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        <button type="submit" class="btn btn-success mt-1" id="edit" data-id="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $(document).on('click', '.edit', function(){
        alert("sfasd");

            $('#user-form-modal').find('#edit').attr('data-id','1');
            $('#id').val($(this).attr('data-id'));
            $('#title').val($(this).parents('tr').find('.title').text());
            $('#date').val($(this).parents('tr').find('.date').text());

            if($(this).parents('tr').find('.status').text() == '0'){
                $('#status').removeAttr('checked');
            }
        })

        $(document).on('click', '.add', function(){
            $('.exam_id').val($(this).attr('data-id'));
         var exam_id = Number($(this).attr('data-id'));
 
        //  if(exam_id > 0){
 
        //    // AJAX POST request
        //    $.ajax({
        //       url: 'getstudentinexam',
        //       type: 'post',
        //       data: {_token: CSRF_TOKEN, exam_id: exam_id, method:1},
        //       dataType: 'json',
        //       success: function(response){
        //         if(response['data'] != ''){
        //             createRows(response,1);
        //           $('#user-form-modal').find('form').attr('action','{{route('admin.editstudentinexam')}}');
        //         }else{
        //             $.ajax({
        //                     url: 'getstudentinexam',
        //                     type: 'post',
        //                     data: {_token: CSRF_TOKEN, exam_id: exam_id, method:0},
        //                     dataType: 'json',
        //                     success: function(response){
        //                         if(response['data'] != ''){
        //                             createRows(response,0);
        //                             $('#user-form-modal').find('form').attr('action','{{route('admin.studentinexam')}}');
        //                         }
                
        //                     }
        //                 });

        //         }
 
        //       }
        //    });
        //  }
        })

        // Create table rows
//    function createRows(response,method){
//       var len = 0;
        
//       if(response['data'] != null){
//          len = response['data'].length;
//       }
 
//       if(len > 0){
//         $('#studenttable tbody').empty(); // Empty <tbody>

//         for(var i=0; i<len; i++){
//            var user_id = response['data'][i].user_id;
//            var exam_id = response['data'][i].exam_id;
//            var name = response['data'][i].name;
//            var tr_str = 
//            "<tr>" +
//                 "<td class='align-middle text-center'>"+
//                     "<div class='custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top'>"+
//                         "<input class='custom-control-input' id='student-"+user_id+"' type='checkbox' name='student["+user_id+"][user_id]' value='"+user_id+"'";
//             if(method == 1){
//                 tr_str +="checked='checked'";
//             }
//             tr_str +=" ><label class='custom-control-label' for='student-"+user_id+"'></label>"+
//                     "</div>"+
//                 "</td>" +
//                 "<td class='text-nowrap align-middle'>"+name+"</td>"
//                 "<td> hidden"+
//                     "<input class='exam_id'  type='text' name='student["+user_id+"][exam_id]' value='"+exam_id+"' >"+
//                 "</td>" +
//             "</tr>";
 
//            $("#studenttable tbody").append(tr_str);
//         }
//       }else{

//     }
//    } 


    </script>




@endsection