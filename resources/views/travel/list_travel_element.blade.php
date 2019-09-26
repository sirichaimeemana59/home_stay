@if($p_row->count() > 0)
    <?php
    $to   	= $p_row->total() - (($p_row->currentPage())*$p_row->perPage());
    $to     = ($to > 0) ? $to : 1;
    $from   = $p_row->total() - (($p_row->currentPage())*$p_row->perPage())+$p_row->perPage();
    $allpage = $p_row->lastPage();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$p_row->total()]) !!}<br/><br/>
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($p_row->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($p_row->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $p_row->lastPage(),$p_row->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($p_row->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
    <div class="">
        <div class="table-responsive table-striped">
            <table cellspacing="0" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{!! trans('messages.number') !!}</th>
                    <th>{!! trans('messages.property.name') !!}</th>
                    <th>{!! trans('messages.property.phone') !!}</th>
                    <th>{!! trans('messages.action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($p_row))
                    @foreach($p_row as $key => $row)
                        <tr>
                            <td>{!! $key+1 !!}</td>
                            <td>{!! $row{'name_'.Session::get('locale')} !!}</td>
                            <td>{!! $row->phone !!}</td>
                            <td>
                                <div class="btn-group left-dropdown">
                                    <button type="button" class="btn btn-success" data-toggle="dropdown">เลือกการจัดการ</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span> </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#" class="view" data-id="{!! $row->id !!}">
                                                <i class="fa fa-eye"></i> {!! trans('messages.view') !!}
                                            </a>
                                        <li><a href="{!! url('/super_admin/list_travel/form_edit/'.$row->id) !!}" data-id="{!! $row->id !!}">
                                                <i class="fa fa-edit"></i> {!! trans('messages.edit') !!}
                                            </a>
                                        </li>
                                        <li><a href="#" data-id="{!! $row->id !!}" class="delete-store">
                                                <i class="fa fa-trash-o"></i> {!! trans('messages.delete') !!}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>{!! trans('messages.no-data') !!}</td>
                    </tr>

                @endif
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$p_row->total()]) !!}
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($p_row->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($p_row->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $p_row->lastPage(),$p_row->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($p_row->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@else
    <div class="col-sm-12 text-center">ไม่พบข้อมูล</div><div class="clearfix"></div>
@endif
