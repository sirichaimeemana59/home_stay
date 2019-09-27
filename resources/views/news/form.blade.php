@extends('home_user.home_user')
@section('content')
    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <a href="{!! url(('/super_admin/list_news')) !!}"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            {!! trans('messages.news.list') !!}
                        </button></a>
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    <button type="button" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        {!! trans('messages.news.add') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('messages.news.news') !!}</h3>
                </div>

                <div class="panel-body search-form">
                    {!! Form::model(null,array('url' => array('/super_admin/list_news/add_news'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.news.name_th') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.news.name_th'),'required')) !!}
                        </div>

                        <lable class="col-sm-2 control-label">{!! trans('messages.news.name_en') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.news.name_en'),'required')) !!}
                        </div>
                    </div>
                    <div class="form-group row">

                        <lable class="col-sm-2 control-label">{!! trans('messages.news.photo') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::file('photo[]', array('multiple'=>true,'class'=>'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">

                        <lable class="col-sm-2 control-label">{!! trans('messages.news.detail_th') !!}</lable>
                        <div class="col-sm-10">
                            <textarea name="detail_th" class="sommernote"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">

                        <lable class="col-sm-2 control-label">{!! trans('messages.news.detail_en') !!}</lable>
                        <div class="col-sm-10">
                            <textarea name="detail_en" class="sommernote"></textarea>
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

        });
    </script>
@endsection
