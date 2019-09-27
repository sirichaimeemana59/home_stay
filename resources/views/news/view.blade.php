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
                        {!! trans('messages.news.view') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body search-form">
                    <div class="container">
                        <h3 class="panel-title">{!! trans('messages.news.news') !!}</h3>
                        <ul class="nav nav-tabs">
{{--                            <li class="active"><a href="#">Home</a></li>--}}
                            <li class="active"><a href="#th" data-toggle="tab">TH</a></li>
                            <li><a href="#en" data-toggle="tab" class="active_en">EN</a></li>
{{--                            <li><a href="#">Menu 3</a></li>--}}
                        </ul>
                        <br>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="th">
                                <h3>{!! trans('messages.news.name') !!} :</h3> <h4>{!! $news->name_th !!}</h4>
                                <h3>{!! trans('messages.news.detail') !!} :</h3> <h4>{!! $news->detail_th !!}</h4>
                            </div>
                            <div class="tab-pane active_en" id="en">
                                <h3>{!! trans('messages.news.name') !!} :</h3> <h4>{!! $news->name_en !!}</h4>
                                <h3>{!! trans('messages.news.detail') !!} :</h3> <h4>{!! $news->detail_en !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="container">
                        <?php $count = count($news->join_tran_news);?>
                        @foreach($news->join_tran_news as $key => $row)
                            <div class="mySlides">
                                <div class="numbertext" style="color: #0a0a0a;">{!! $count !!} / {!! $key+1 !!}</div>
                                <img src="{!! asset($row->photo) !!}" style="width:auto"><br><br>
                                <button class="btn btn-danger delete_photo" type="button" data-id="{!! $row->id !!}" data-tran="{!! $news->id !!}">{!! trans('messages.delete') !!}</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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
