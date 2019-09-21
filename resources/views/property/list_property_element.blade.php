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
    <div class="w3-hide-small">
        <div class="table-responsive table-striped">
            <table cellspacing="0" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{!! trans('messages.number') !!}</th>
                    <th>{!! trans('messages.pet.photo') !!}</th>
                    <th>{!! trans('messages.pet.name') !!}</th>
                    <th>{!! trans('messages.pet.age') !!}</th>
                    <th>{!! trans('messages.pet.user') !!}</th>
                    <th>{!! trans('messages.action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($p_row))
                    @foreach($p_row as $key => $row)
                        <tr>
                            <td>{!! $key+1 !!}</td>
                            <td><img src="{!! asset($row->photo) !!}" alt="" width="25%"></td>
                            <td>{!! $row{'name_'.Session::get('locale')} !!}</td>
                            <td>@if(!empty($row->age)) {!! $row->age !!} @else - @endif </td>
                            <td>@if(!empty($row->user_id)) {!! $row->user_id !!} @else - @endif</td>
                            <td>
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>
                                <button class="btn btn-warning mt-2 mt-xl-0 text-right edit-store" data-id="{!! $row->id !!}"><i class="mdi mdi-tooltip-edit"></i></button>
                                {{--<a href="{!! url('/employee/pet/edit/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>--}}
                                <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>
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
    <div class="hide">
        <div class="table-responsive table-striped">
            <table cellspacing="0" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{!! trans('messages.pet.photo') !!}</th>
                    <th>{!! trans('messages.pet.name') !!}</th>
                    <th>{!! trans('messages.pet.age') !!}</th>
                    <th>{!! trans('messages.action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($p_row))
                    @foreach($p_row as $key => $row)
                        <tr>
                            <td><img src="{!! asset($row->photo) !!}" alt="" width="25%"></td>
                            <td>{!! $row{'name_'.Session::get('locale')} !!}</td>
                            <td>@if(!empty($row->age)) {!! $row->age !!} @else - @endif </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">{!! trans('messages.action') !!}
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li class="#"><a href="#" class="view-store" data-id="{!! $row->id !!}">{!! trans('messages.view') !!}</a></li>
                                        <li><a href="#" class="edit-store" data-id="{!! $row->id !!}">{!! trans('messages.edit') !!}</a></li>
                                        <li><a href="#" class="delete-store" data-id="{!! $row->id !!}">{!! trans('messages.delete') !!}</a></li>
                                    </ul>
                                </div>
                                {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right view-store btn-sm" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>--}}
                                {{--<button class="btn btn-warning mt-2 mt-xl-0 text-right edit-store btn-sm" data-id="{!! $row->id !!}"><i class="mdi mdi-tooltip-edit"></i></button>--}}
                                {{--<a href="{!! url('/employee/pet/edit/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>--}}
                                {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store btn-sm" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>--}}
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
    {{--</div>--}}
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
