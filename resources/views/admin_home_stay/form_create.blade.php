@extends('is_admin.home')
@section('content')
    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <a href="{!! url(('/admin_home_stay')) !!}"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            {!! trans('messages.room_stay.list') !!}
                        </button></a>
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    <button type="button" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        {!! trans('messages.room_stay.add') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('messages.home_stay.home_stay') !!}</h3>
                </div>

                <div class="panel-body search-form">
                    {!! Form::model(null,array('url' => array('/admin_home_stay/create'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.property.name_th') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.property.name_th'),'required')) !!}
                        </div>

                        <lable class="col-sm-2 control-label">{!! trans('messages.property.name_en') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.property.name_en'),'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.property.owner') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('owner',null,array('class'=>'form-control','placeholder'=>trans('messages.property.owner'),'required')) !!}
                        </div>

                        <lable class="col-sm-2 control-label">{!! trans('messages.property.phone') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('phone',null,array('class'=>'form-control num','placeholder'=>trans('messages.property.phone'),'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.property.location') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('location',null,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'required')) !!}
                        </div>

                        {{--                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.address') !!}</lable>--}}
                        {{--                                    <div class="col-sm-4">--}}
                        {{--                                        {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.property.address'),'required')) !!}--}}
                        {{--                                    </div>--}}
                    </div>
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.province') !!}</lable>--}}
                    {{--                                    <div class="col-sm-4">--}}
                    {{--                                        {!! Form::select('province_id',$provinces,null,array('class'=>'form-control province')) !!}--}}
                    {{--                                    </div>--}}

                    {{--                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.distric') !!}</lable>--}}
                    {{--                                    <div class="col-sm-4">--}}
                    {{--                                        {!! Form::select('distric_id',$districts,null,array('class'=>'form-control district')) !!}--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.sub_dis') !!}</lable>--}}
                    {{--                                    <div class="col-sm-4">--}}
                    {{--                                        {!! Form::select('sub_dis',$subdistricts,null,array('class'=>'form-control subdistricts')) !!}--}}
                    {{--                                    </div>--}}

                    {{--                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.code') !!}</lable>--}}
                    {{--                                    <div class="col-sm-4">--}}
                    {{--                                        {!! Form::text('code',null,array('class'=>'form-control postcode','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'))) !!}--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group row">--}}
                    {{--                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.address') !!}</lable>--}}
                    {{--                                    <div class="col-sm-10">--}}
                    {{--                                        {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.property.address'),'required')) !!}--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}

                    <div class="panel-body search-form">
                        <div class="form-group row float-center" style="text-align: left; ">
                            <div class="col-sm-12">
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add_room_home_stay" type="button"><i class="fa fa-plus-circle"></i>  {!! trans('messages.home_stay.add_room') !!}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <table class="table itemTables" style="width: 100%">
                            <tr>
                                <th ></th>
                                <th>{!! trans('messages.room_stay.type') !!}</th>
                                <th>{!! trans('messages.room_stay.amount') !!}</th>
                                {{--                            <th>{!! trans('messages.room_stay.detail_th') !!}</th>--}}
                                <th>{!! trans('messages.room_stay.detail') !!}</th>
                                <th>{!! trans('messages.room_stay.price') !!}</th>
                                <th>{!! trans('messages.action') !!}</th>
                            </tr>
                        </table>
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

    <div id="type_select" style="display:none;">
        <select name="type_id" id="type_id" class="form-control" style="width:300px;">
            <option value="">{!! trans('messages.type') !!}</option>
            <option value="1">Sweet</option>
            <option value="2">Dulux</option>
            <option value="3">Standard</option>
        </select>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

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
                    var type = '<select name="data['+time+'][type_id]" class="form-control" style="width:300px;" required>'+ $('#type_select select').html() + '</select>';

                    var data = [
                        '<tr class="itemRow">',
                        '<td></td>',
                        '<td style="text-align: left; width:300px;">'+type+'</td>',
                        '<td><input type="text" class="num form-control" name=data['+time+'][amount]></td>',
                        // '<td><input type="text" class="amount form-control" name=data['+time+'][detail_th] required></td>',
                        '<td><input type="text" class="form-control" name=data['+time+'][detail]></td>',
                        '<td><input type="text" class="form-control num" name=data['+time+'][price]></td>',
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

        });
    </script>
@endsection
