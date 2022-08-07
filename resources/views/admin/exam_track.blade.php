@extends('theme.default')
@section('content')
<script src="{{asset('../assets/plugins/range/main.js')}}"></script>

<div class="side-app">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <ol class="breadcrumb"><!-- breadcrumb -->
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">home</li>
            </ol><!-- End breadcrumb -->
        </div>
        <!-- End page-header -->


        <!-- row -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Users/New</div>

                    <div class="card-options d-none d-sm-block">
                        <label class="form-label">Exam</label>
                        <select name="exam" id="select-countries" class="form-control custom-select">
                            @foreach ($Exam as $item)
                                <option value="{{$item->id}}" >{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered text-nowrap w-100">
                            <style>
                                .jsr_rail-outer {
                                    padding:0;
                                }
                                .jsr jsr--disabled{
                                    margin: 0;
                                }
                                .jsr_slider::before{
                                    background: none;
                                }
                                .jsr_label {
                                    top:0;
                                }
                                
                                .jsr {
                                    margin: 0;
                                }
                                .thead-light, .text-center{
                                    margin: 0 !important;
                                    padding: 0 !important;
                                    height: auto !important;
                                    width:fit-content !important;
                                }

                            </style>
                            <tbody>
                                @foreach ($Student as $i=>$item)
                                    <tr>
                                        {{-- <th class="text-nowrap align-middle text-center" rowspan="3">{{$i+1}}</th> --}}
                                        <th class="text-nowrap align-middle text-center" rowspan="3">{{$item->name}}</th>
                                        <th class="text-center"><i class="fa fa-wpforms" data-toggle="tooltip" title="" data-original-title="fa fa-wpforms"></i> 1</th>
                                        <th class="text-nowrap align-middle" colspan="11">
                                            <input id="range-{{$item->id}}" type="range" min="0" max="15">
                                            <script>
                                                const r{{$item->id}} = new JSR(['#range-{{$item->id}}'], {
                                                    sliders: 1,
                                                    min: 1,
                                                    max: 10,
                                                    values: [3],
                                                });
                                                $('.align-middle').find('canvas').remove();
                                            </script>
                                        </th>
                                    </tr>
                                    <tr class="thead-light">
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 1</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 2</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 3</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 4</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 5</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 6</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 7</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 8</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 9</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 10</th>
                                        <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i> 11</th>
                                        <th class="text-center"><i class="fa fa-pencil" data-toggle="tooltip" title="" data-original-title="fa fa-pencil"></i></th>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                        <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
            </div>
        </div>
        <!-- row end -->


    </div><!--End side app-->
</div>
<!--Rang slider js-->

<script>
    

</script>


@endsection