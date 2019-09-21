@extends('home_user.home_user')
@section('content')
    <div class="nav-tabs-custom panel-body">
        <div class="row panel-body">
            <div class="col-lg-12">
        {!! Form::model($property,array('url' => array('/super_admin/list_property/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
                {!! Form::email('email',null,array('class'=>'form-control','placeholder'=>trans('messages.property.mail'),'required')) !!}
            </div>

            <lable class="col-sm-2 control-label">{!! trans('messages.property.location') !!}</lable>
            <div class="col-sm-4">
                {!! Form::text('location',null,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'required')) !!}
            </div>
        </div>
        <div class="form-group row">
            <lable class="col-sm-2 control-label">{!! trans('messages.property.province') !!}</lable>
            <div class="col-sm-4">
                {!! Form::select('province_id',$provinces,null,array('class'=>'form-control province')) !!}
                <input type="hidden" class="province_id" value="{!! $property['province_id'] !!}">
            </div>

            <lable class="col-sm-2 control-label">{!! trans('messages.property.distric') !!}</lable>
            <div class="col-sm-4">
                {!! Form::select('distric_id',$districts,null,array('class'=>'form-control district')) !!}
                <input type="hidden" class="distric_id" value="{!! $property['distric_id'] !!}">

            </div>
        </div>
        <div class="form-group row">
            <lable class="col-sm-2 control-label">{!! trans('messages.property.sub_dis') !!}</lable>
            <div class="col-sm-4">
                {!! Form::select('sub_dis',$subdistricts,null,array('class'=>'form-control subdistricts')) !!}
                <input type="hidden" class="sub_dis" value="{!! $property['sub_dis'] !!}">
                <input type="hidden" name="property_id" class="property_id" value="{!! $property['id'] !!}">


            </div>

            <lable class="col-sm-2 control-label">{!! trans('messages.property.code') !!}</lable>
            <div class="col-sm-4">
                {!! Form::text('code',null,array('class'=>'form-control postcode','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'))) !!}
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
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '.add-property', function () {
                $('#add_property').modal('show');
            });

            $('#add-store-btn').on('click', function () {
                if ($('.create-store-form').valid()) {
                    $(this).attr('disabled', 'disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });

            $('body').on('click','.view',function(){
                var id = $(this).data('id');
                $('#view-store').modal('show');
                $('#lead-content').empty();
                $('.v-loading').show();
                $.ajax({
                    url:$('#root-url').val()+'/super_admin/list_property/view',
                    method:'post',
                    dataType:'html',
                    data:({'id':id}),
                    success:function(e){
                        //console.log(e);
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error:function(){
                        console.log('Error View Property');
                    }
                });
            });

            $('body').on('click','.edit',function(){
                var id = $(this).data('id');
                $('#edit-store').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url:$('#root-url').val()+'/super_admin/list_property/edit',
                    method:'post',
                    dataType:'html',
                    data:({'id':id}),
                    success:function(e){
                        //console.log(e);
                        $('#lead-content1').html(e);
                        $('.v-loading1').hide();
                    } ,error:function(){
                        console.log('Error View Property');
                    }
                });
            });

            $(".num").on("keypress", function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if (code > 57) {
                    return false;
                } else if (code < 48 && code != 8) {
                    return false;
                }

            });

            $('body').on('change','.province',function(){
                $('.district').attr("disabled", false);
                var id;
                id = $(this).val();
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/district",
                    method : 'post',
                    dataType: 'html',
                    data : ({'id':id}),
                    success: function (e) {
                        $(".district").html('');
                        $(".district").append("<option value=''>อำเภอ/เขต</option>");
                        $.each($.parseJSON(e), function(i, val){
                            $(".district").append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                        });
                    },
                    error : function () {


                    }
                })
            })

            function SelectDistrict(id){
                $('.subdistricts').attr("disabled", false);
                var id = id;
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/subdistrict",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            $('.postcode').val(val.zip_code);
                        });

                    },error : function(){

                    }
                })
            }

            $('body').ready(function(){
                var id = $('.property_id').val();
                var dis = $('.distric_id').val();
                var subdis = $('.sub_dis').val();
                var select;
                //console.log(dis);
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/district/edit",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.district').html('');
                        $('.district').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            //console.log(e);
                            if(val.id == dis){
                                select = "selected";
                                $('.district').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }else {
                                select = "";
                                $('.district').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            //console.log(select);
                            $('.postcode').val(val.zip_code);
                            //console.log(val.id);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
                ////////////////////////////////
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/editSubDis",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $('.subdistricts').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            if(val.id == subdis){
                                select = "selected";
                                $('.subdistricts').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }else {
                                select = "";
                                $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            $('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
            });

            $('body').on('change','.district',function(){
                $('.subdistricts').attr("disabled", false);
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/subdistrict",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        //console.log(e);
                        $('.subdistricts').html('');
                        $('.subdistricts').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            $('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
            })

            $('body').on('change','.subdistricts',function(){
                var id = $(this).val();
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/zip_code",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $.each($.parseJSON(e),function(i,val){
                            $('.postcode').val(val.zip_code);
                        });
                        //console.log(e);

                    },error : function(){
                        //console.log('aa');
                    }
                })
            })
        });
    </script>
@endsection
