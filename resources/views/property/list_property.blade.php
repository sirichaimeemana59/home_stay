@extends('home_user.home_user')
@section('content')
    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('messages.property.property') !!}</h3>
                </div>

                <div class="panel-body search-form">
                    <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-3 block-input">
                                <input class="form-control" size="25" placeholder="{!! trans('messages.pet.name') !!}" name="name">
                            </div>

                            {{--<div class="col-sm-3 block-input">--}}
                            {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                            {{--</div>--}}
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                <button type="button" class="btn btn-secondary search-store">{!! trans('messages.search') !!}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row" style="margin: 5px;">
            <div class="col-sm-12 text-right">
                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-property"><i class="fa fa-plus-circle"></i>  {!! trans('messages.property.add') !!}</button>
                <a href="#" target="_blank"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="fa fa-file-text"></i>  {!! trans('messages.download') !!}</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('property.list_property_element')
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_property" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{!! trans('messages.property.property') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('/super_admin/list_property/create'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
                                        {!! Form::text('phone',null,array('class'=>'form-control','num','placeholder'=>trans('messages.property.phone'),'required')) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.mail') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::email('mail',null,array('class'=>'form-control','placeholder'=>trans('messages.property.mail'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.location') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('location',null,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'required')) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.province') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('province_id',null,array('class'=>'form-control','placeholder'=>trans('messages.property.province'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.distric') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('distric_id',null,array('class'=>'form-control','placeholder'=>trans('messages.property.distric'),'required')) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.sub_dis') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('sub_dis',null,array('class'=>'form-control','placeholder'=>trans('messages.property.sub_dis'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.code') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('code',null,array('class'=>'form-control','placeholder'=>trans('messages.property.code'),'required')) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.address') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.property.address'),'required')) !!}
                                    </div>
                                </div>

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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    <script>
        $('body').on('click','.add-property',function(){
            $('#add_property').modal('show');
        });

        $('#add-store-btn').on('click',function () {
            if($('.create-store-form').valid()) {
                $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                $('.create-store-form').submit();
            }
        });

        $(".num").on("keypress" , function (e) {

            var code = e.keyCode ? e.keyCode : e.which;

            if(code > 57){
                return false;
            }else if(code < 48 && code != 8){
                return false;
            }

        });
    </script>
@endsection
