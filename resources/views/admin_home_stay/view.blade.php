{!! Form::model($home,array('url' => array('/admin_home_stay/create'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
    <lable class="col-sm-2 control-label">{!! trans('messages.property.location') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('location',null,array('class'=>'form-control','placeholder'=>trans('messages.property.location'),'readonly')) !!}
    </div>

{{--    <lable class="col-sm-2 control-label">{!! trans('messages.property.address') !!}</lable>--}}
{{--    <div class="col-sm-4">--}}
{{--        {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.property.address'),'readonly')) !!}--}}
{{--    </div>--}}
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label"><h1>{!! trans('messages.room_stay.room') !!}</h1></lable>
<div class="col-sm-12">
    <table class="table itemTables" style="width: 100%">
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.room_stay.type') !!}</th>
            <th>{!! trans('messages.room_stay.amount') !!}</th>
            {{--                            <th>{!! trans('messages.room_stay.detail_th') !!}</th>--}}
            <th>{!! trans('messages.room_stay.detail') !!}</th>
            <th>{!! trans('messages.room_stay.price') !!}</th>
{{--            <th>{!! trans('messages.action') !!}</th>--}}
        </tr>
        @foreach($home->join_transection as $key => $row)
            <tr>
                <td>{!! $key+1 !!}</td>
                <td>{!! $row->type_id !!}</td>
                <td>{!! $row->amount !!}</td>
                <td>{!! $row->detail !!}</td>
                <td>{!! $row->price !!}</td>
            </tr>
        @endforeach
    </table>
</div>
</div>
