{!! Form::model($property,array('url' => array('/super_admin/list_property/create'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.property.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.property.name_th'),'readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.property.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.property.name_en'),'readonly')) !!}
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.property.owner') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('owner',null,array('class'=>'form-control','placeholder'=>trans('messages.property.owner'),'readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.property.phone') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('phone',null,array('class'=>'form-control','num','placeholder'=>trans('messages.property.phone'),'readonly')) !!}
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.property.mail') !!}</lable>
    <div class="col-sm-4">
        {!! Form::email('email',null,array('class'=>'form-control','placeholder'=>trans('messages.property.mail'),'readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.property.location') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('location',null,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'readonly')) !!}
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.property.province') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('location',$property->join_province->{'name_in_'.Session::get('locale')},array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.property.distric') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('location',$property->join_Districts->{'name_'.Session::get('locale')},array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'readonly')) !!}
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.property.sub_dis') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('location',$property->join_Subdistricts->{'name_'.Session::get('locale')},array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.property.code') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('location',$property->join_Subdistricts->zip_code,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'readonly')) !!}
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.property.address') !!}</lable>
    <div class="col-sm-10">
        {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.property.address'),'readonly')) !!}
    </div>
</div>
