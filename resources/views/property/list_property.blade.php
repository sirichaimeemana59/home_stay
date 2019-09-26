@extends('home_user.home_user')
@section('content')
    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <button type="button" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        {!! trans('messages.property.list') !!}
                    </button>
                    {{--                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>--}}
                </div>
            </div>
        </div>
    </div>

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
                                <input class="form-control" size="25" placeholder="{!! trans('messages.property.name') !!}" name="name">
                            </div>

                            {{--<div class="col-sm-3 block-input">--}}
                            {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                            {{--</div>--}}
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-warning reset-s-btn"> {!! trans('messages.close') !!}</button>
                                <button type="button" class="btn btn-primary search-store"> {!! trans('messages.search') !!}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom panel-body">
        <div class="row" style="margin: 5px;">
            <div class="col-sm-12 text-right">
                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-property"><i class="fa fa-plus-circle"></i>  {!! trans('messages.property.add') !!}</button>
                <a href="#" target="_blank"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="fa fa-file-text"></i>  {!! trans('messages.download') !!}</button></a>
            </div>
        </div>
        <div class="row panel-body">
            <div class="col-lg-12" id="landing-subject-list">
                @include('property.list_property_element')
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_property" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
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
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.distric') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::select('distric_id',$districts,null,array('class'=>'form-control district')) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.property.sub_dis') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::select('sub_dis',$subdistricts,null,array('class'=>'form-control subdistricts')) !!}
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal view store-->
    <div class="modal fade" id="view-store" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.property.property') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view store-->

    <!-- Modal view store-->
    <div class="modal fade" id="edit-store" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.property.property') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content1" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading1">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view store-->
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
            $('body').on('click', '.add-property', function () {
                $('#add_property').modal('show');
            });

            $('#add-store-btn').on('click', function () {
                if ($('.create-store-form').valid()) {
                    $(this).attr('disabled', 'disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });

            $('.search-store').on('click',function () {
                //alert('aa');
                propertyPage (1);
            });

            $('body').on('click','.p-paginate-link', function (e){
                e.preventDefault();
                propertyPage($(this).attr('data-page'));
                //alert('aa');
            });

            $('body').on('change','.p-paginate-select', function (e){
                e.preventDefault();
                propertyPage($(this).val());
            });

            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href =$('#root-url').val()+'/super_admin/list_property';
            });
            function propertyPage (page) {
                // $('.search-store').on('click', function () {
                var data = $('#search-form').serialize()+'&page='+page;
                //alert('aa');
                //console.log(data);
                $('#landing-subject-list').css('opacity', '0.6');
                $.ajax({
                    url: $('#root-url').val() + '/super_admin/list_property',
                    method: 'post',
                    dataType: 'html',
                    data: data,
                    success: function (e) {
                        $('#landing-subject-list').css('opacity', '1').html(e);
                    }, error: function () {
                        console.log('Error Search Data Store');
                    }
                });
                // });
            }

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

            $('body').on('click','.delete-store',function(){
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post($('#root-url').val()+"/super_admin/list_property/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href =$('#root-url').val()+'/super_admin/list_property'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
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
