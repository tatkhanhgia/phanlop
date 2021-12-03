@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <a href="{{URL::to('pages/6/add')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-plus-circle"></i>Thêm phiếu chi</button></a>
</div>
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý phiếu chi--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý Phiếu Chi
        </div>
        <div class="panel-body">
            <table id="table_import" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã phiếu chi</th>
                        <th>Mã phiếu nhập hàng</th>
                        <th>Mã nhân viên</th>
                        <th>Họ tên nhân viên</th>
                        <th>Tổng tiền</th>
                        <th>Ngày nhập</th>                                        
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arrayMate as $arraycolumn)
                    <tr>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[6]}} {{$arraycolumn[7]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[3]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>                                                                   
                        @if($arraycolumn[5]==1)
                            <td><span class="text-ellipsis" style="color: green;">Đã nhập vào hệ thống</span></td>
                        @elseif($arraycolumn[5]==0)
                            <td><span class="text-ellipsis" style="color: red;">Đã khóa phiếu</span></td>                       
                        @endif                        
                        <td>
                            @if($arraycolumn[5]==1)
                                <form method="post" action="{{URL::to('pages/6/hidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px;" title="Khóa phiếu" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box" ></i></button>
                                </form>
                            @elseif($arraycolumn[5]==0)
                                <form method="post" action="{{URL::to('pages/6/unhidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 14px; margin-top: 5px;" title="Mở khóa" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box-open" ></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


