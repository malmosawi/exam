@extends('theme.default')
@section('content')
    <!-- app-content-->
    <div class="container content-area">
        <div class="side-app">

            <!-- page-header -->
            <div class="page-header">
                <ol class="breadcrumb"><!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Advertisement</li>
                </ol><!-- End breadcrumb -->
            </div>
            <!-- End page-header -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admins</h3>
                            <div class="card-options">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal3"><i class="fa fa-plus-circle"></i> New </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th >Name</th>
                                            <th>Email</th>
                                            <th>Governorate</th>
                                            <th class="text-center">Actions</th>
                                            <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Admins as $i=>$item)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td class="text-nowrap align-middle name">{{$item->name}}</td>
                                            <td class="text-nowrap align-middle phone">{{$item->phone}}</td>
                                            <td class="text-nowrap align-middle email">{{$item->email}}</td>
                                            <td class="text-nowrap align-middle governorate"><span>{{$item->governoratename}}</span></td>
        
                                            <td class="text-center align-middle">
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-primary badge edit " data-target="#advertisement-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}" value="{{$item->governorateid}}"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button class="btn btn-sm btn-danger badge add" data-target="#exam-form-modal" data-toggle="modal" type="button" data-id="{{$item->id}}" value="{{$item->governorateid}}"><i class="fa fa-close"></i></button>
                                                    {{-- <form action="{{route('admin.deleteexam', $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-primary badge" type="submit"><i class="fa fa-close"></i></button>
                                                    </form> --}}
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
                    <h5 class="modal-title" id="example-Modal3">New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.admins')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Name</label>
                                    <input type="text" class="form-control"  placeholder="Name"  name="name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" placeholder="Email"  name="email" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input class="form-control" placeholder="Phone"  name="phone" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Password</label>
                                    <input class="form-control" placeholder="password"  name="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Governorate</label>
                                    <select class="form-control select2 " data-placeholder="Choose one" id="governorate" name="governorate" required value="">
                                        <option label="Choose one">
                                        </option>
                                        @foreach ($governorate as $item)
                                            <option value="{{$item->id}}"> {{$item->governorate}}</option>
                                        @endforeach
                                        
                                    </select>
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
    <!-- Message Modal -->
    <div class="modal fade" id="advertisement-form-modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.updateadmins')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">name</label>
                                    <input type="text" class="form-control"  placeholder="name"  id="name" name="name" value="" required>
                                    <input type="number" class="form-control"  id="id" name="id" value="" required hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone">phone</label>
                                    <input class="form-control" placeholder="phone"  id="phone" name="phone" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">email</label>
                                    <input type="text" class="form-control" placeholder="email"  id="email" name="email" value="" required>
                                </div>
                                <div class="form-group" id="d">
                                    <label class="form-label" for="governorate">governorate</label>
                                    <select class="form-control select2 " data-placeholder="Choose one" id="governorate" name="governorate" required value="1">
                                        <option label="Choose one">
                                        </option>
                                        @foreach ($governorate as $item)
                                            <option value="{{$item->id}}" id="s-{{$item->id}}"> {{$item->governorate}}</option>
                                        @endforeach
                                        
                                    </select>

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
    
<script>
    $(document).on('click', '.edit', function(){
        $('#user-form-modal').find('#edit').attr('data-id','1');
        $('#id').val($(this).attr('data-id'));
        $('#id').val();
        $('#name').val($(this).parents('tr').find('.name').text());
        $('#email').val($(this).parents('tr').find('.email').text());
        $('#phone').val($(this).parents('tr').find('.phone').text());
        id=$(this).attr('value');
        $('#d option:eq('+id+')').prop('selected', true)

        
    })
</script>






@endsection