@extends('theme.default')
@section('content')
<script src="{{asset('../assets/plugins/range/main.js')}}"></script>

<div class="ontainer content-area">
    <div class="side-app">
        <div class="row">
            <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Student</div>
                  
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
                                <script>
                                    var r=[];
                                </script>
                                @foreach ($Student as $i=>$item)
                                        <tr>
                                            <th class="text-nowrap align-middle text-center" id="online-{{$item->seid}}" rowspan="3" bgcolor="{{($item->online == 1)?'green':'red'}}">{{$i+1}}</th>
                                            <th class="text-nowrap align-middle text-center" rowspan="3">{{$item->name}}</th>
                                            <th class="text-center"><i class="fa fa-wpforms" data-toggle="tooltip" title="" data-original-title="fa fa-wpforms"></i>
                                                <span id="stage-{{$item->seid}}">{{$item->stage}}</span>
                                            </th>
                                            <th class="text-nowrap align-middle" colspan="11">
                                                <input id="range-{{$item->seid}}" type="range" min="0" max="15">
                                                <script>
                                                    r[{{$item->seid}}] = new JSR(['#range-{{$item->seid}}'], {
                                                        sliders: 1,
                                                        min: 1,
                                                        max: 22,
                                                        values: [{{!($item->step == null)?$item->step:1}}],
                                                    });
                                                    $('.align-middle').find('canvas').remove();
                                                </script>
                                            </th>
                                        </tr>
                                        <tr class="thead-light">
                                            <th class="text-center"><i class="fa fa-book" data-toggle="tooltip" title="" data-original-title="fa fa-book"></i></th>
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
                                        <tr id="stages-{{$item->seid}}">
                                            @for ($i = 1; $i <= $item->stage; $i++)
                                                <td class="text-center"><span class="fa fa-check-square-o"></span></td>
                                            @endfor
                                            @for ($i = 1; $i <= 13 - $item->stage; $i++)
                                                <td class="text-center"></td>
                                            @endfor
                                            

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

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    setInterval(getvalue, 1000);
    function getvalue() {
    // AJAX POST request
    $.ajax({
        url: 'examtrack',
        type: 'get',
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
        success: function(response){
        response.forEach(element => { 
            r[element['seid']].setValue(0,element['step']);
            $('#stage-'+element['seid']).text(element['stage']);
            if(element['online'] == 1){
                $('#online-'+element['seid']).attr('bgcolor','green');
            }else{
                $('#online-'+element['seid']).attr('bgcolor','red');
            }
            
            $('#stages-'+element['seid']).find('td').empty();
            for (let index = 0; index < element['stage']; index++) {
                $('#stages-'+element['seid']).find('td:eq('+index+')').html('<span class="fa fa-check-square-o"></span>');
            }
        });
        }
    });
}

</script>


@endsection