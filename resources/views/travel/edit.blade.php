@extends('home_user.home_user')
@section('content')
    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <a href="{!! url(('/super_admin/list_travel')) !!}"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            {!! trans('messages.travel.list') !!}
                        </button></a>
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    <button type="button" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        {!! trans('messages.travel.edit') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('messages.travel.travel') !!}</h3>
                </div>

                <div class="panel-body search-form">
                    {!! Form::model($travel,array('url' => array('/super_admin/list_travel/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.property.name_th') !!}</lable>
                        <div class="col-sm-4">
                            <input type="hidden" name="id" value="{!! $travel->id !!}">
                            {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.property.name_th'),'required')) !!}
                        </div>

                        <lable class="col-sm-2 control-label">{!! trans('messages.property.name_en') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.property.name_en'),'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.property.phone') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('phone',null,array('class'=>'form-control num','placeholder'=>trans('messages.property.phone'),'required')) !!}
                        </div>

                        <lable class="col-sm-2 control-label">{!! trans('messages.property.location') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('location',null,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row">

                        <lable class="col-sm-2 control-label">{!! trans('messages.travel.photo') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::file('photo[]', array('multiple'=>true,'class'=>'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">

                        <lable class="col-sm-2 control-label">{!! trans('messages.travel.detail_th') !!}</lable>
                        <div class="col-sm-10">
                            <textarea name="detail_th" class="sommernote">{!! $travel->detail_th !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">

                        <lable class="col-sm-2 control-label">{!! trans('messages.travel.detail_en') !!}</lable>
                        <div class="col-sm-10">
                            <textarea name="detail_en" class="sommernote">{!! $travel->detail_en !!}</textarea>
                        </div>
                    </div>

                    {{--                    <div class="panel-body search-form">--}}
                    {{--                        <div class="form-group row float-center" style="text-align: left; ">--}}
                    {{--                            <div class="col-sm-12">--}}
                    {{--                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add_room_home_stay" type="button"><i class="fa fa-plus-circle"></i>  {!! trans('messages.home_stay.add_room') !!}</button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="col-sm-12">--}}
                    {{--                        <table class="table itemTables" style="width: 100%">--}}
                    {{--                            <tr>--}}
                    {{--                                <th ></th>--}}
                    {{--                                <th>{!! trans('messages.travel.photo') !!}</th>--}}
                    {{--                                <th>{!! trans('messages.action') !!}</th>--}}
                    {{--                            </tr>--}}
                    {{--                        </table>--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="container">
                         <?php $count = count($travel->join_tran);?>
                        @foreach($travel->join_tran as $key => $row)
                        <div class="mySlides">
                            <div class="numbertext" style="color: #0a0a0a;">{!! $count !!} / {!! $key+1 !!}</div>
                            <img src="{!! asset($row->photo) !!}" style="width:auto"><br><br>
                            <button class="btn btn-danger delete_photo" type="button" data-id="{!! $row->id !!}" data-tran="{!! $travel->id !!}">{!! trans('messages.delete') !!}</button>
                        </div>
                        @endforeach

                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>

                        <div class="caption-container">
                            <p id="caption"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body search-form">
                    <div class="form-group row float-center" style="text-align: right; ">
                        <div class="col-sm-12">
                            <button class="btn-info btn-primary" id="add-store-btn" type="submit">{!! trans('messages.save') !!}</button>
                            <button class="btn-info btn-warning" type="reset">{!! trans('messages.close') !!}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="{{url('/')}}/Gallery/gallery.css">
    <script type="text/javascript" src="{{url('/')}}/Gallery/gallery.js"></script>

    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.sommernote').summernote({

                height:300,

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
            });

            $(function () {
                $('.add_room_home_stay').on('click', function (e){
                    e.preventDefault();
                    var time = $.now();
                    var data = [
                        '<tr class="itemRow">',
                        '<td></td>',
                        '<td><input type="file" class="form-control" name=data['+time+'][photo] multiple></td>',
                        '<td><a class="btn btn-danger delete-subject"><i class="fa fa-trash-o"></i></a></td>',
                        '</tr>'].join('');
                    $('.itemTables').append(data);
                });
            });

            $('body').on("keypress",".num", function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if (code > 57) {
                    return false;
                } else if (code < 48 && code != 8) {
                    return false;
                }

            });


            $('body').on('click','.delete_photo',function(){
                var id = $(this).data('id');
                var tran = $(this).data('tran');
                swal({
                    title: "{!! trans('messages.delete_alert.sure')!!}",
                    text: "{!! trans('messages.delete_alert.text') !!}!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post($('#root-url').val()+"/super_admin/list_travel/delete_photo", {
                                id: id
                            }, function(e) {
                                swal("{!! trans('messages.delete_alert.success') !!}", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href =$('#root-url').val()+'/super_admin/list_travel/form_edit/'+tran
                                });
                            });
                        }, 50);
                    } else {
                        swal("{!! trans('messages.delete_alert.error') !!}");
                    }
                });
            });


        });
    </script>
@endsection
