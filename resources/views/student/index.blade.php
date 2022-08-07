@extends('theme.default')
@section('content')
<div class="container content-area">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <ol class="breadcrumb"><!-- breadcrumb -->
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">home</li>
            </ol><!-- End breadcrumb -->
        </div>
        <!-- End page-header -->


        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-carousel3 owl-theme mb-5">
                    @foreach ($advertisement as $item)
                        <div class="item">
                            <div class="card">
                                <div class="card-body iconfont text-center">
                                    <h1 class="mb-1 ">{{$item->title}}</h1>
                                    <h4>{{$item->content}}</h4>
                                    <p><span class="text-purple"> At : {{$item->date}} <i class="fa fa-calendar text-green"></i></span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title ">Certificate</h3>
                        <div class="ml-auto">
                            <div class="input-group">
                                <input type='button' class="btn btn-primary mr-2" id='click4' value="Exam Enrollment">

                            </div>
                        </div>
                    </div>
                    {{-- <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter table-outline table-bordered text-nowrap ">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">ID</th>
                                    <th scope="col" class="border-top-0">Project Name</th>
                                    <th scope="col" class="border-top-0">Backend</th>
                                    <th scope="col" class="border-top-0">Deadline</th>
                                    <th scope="col" class="border-top-0">Team Members</th>
                                    <th scope="col" class="border-top-0">Edit Project Details </th>
                                    <th scope="col" class="border-top-0">list info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>At vero eos et accusamus et iusto odio</td>
                                    <td>PHP</td>
                                    <td>15/11/2018</td>
                                    <td>15 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-info" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>voluptatum deleniti atque corrupti quos</td>
                                    <td>Angular js</td>
                                    <td>25/11/2018</td>
                                    <td>12 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-info" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>dignissimos ducimus qui blanditiis praesentium </td>
                                    <td>Java</td>
                                    <td>5/12/2018</td>
                                    <td>20 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-info" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>deleniti atque corrupti quos dolores  </td>
                                    <td>Phython</td>
                                    <td>14/12/2018</td>
                                    <td>10 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-info" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>et quas molestias excepturi sint occaecati</td>
                                    <td>Phython</td>
                                    <td>4/12/2018</td>
                                    <td>17 Members</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    <td><a class="btn btn-sm btn-info" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>


    </div><!--End side app-->
</div>


@endsection