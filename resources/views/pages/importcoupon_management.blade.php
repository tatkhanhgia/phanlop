@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <a href="{{URL::to('pages/5/add')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-plus-circle"></i>Thêm phiếu nhập kho</button></a>
</div>
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý phiếu nhập hàng--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý Phiếu Nhập hàng
        </div>
        <div class="panel-body">
            <table id="table_import" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã phiếu</th>
                        <th>Mã nhà cung cấp</th>
                        <th>Tên nhà cung cấp</th>
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
                        <td><span class="text-ellipsis">{{$arraycolumn[5]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[3]}}</span></td>                                                                   
                        @if($arraycolumn[4]==1)
                            <td><span class="text-ellipsis" style="color: green;">Đã nhập đủ hàng</span></td>
                        @elseif($arraycolumn[4]==0)
                            <td><span class="text-ellipsis" style="color: red;">Thiếu hàng</span></td>                       
                        @endif                        
                        <td>
                            @if($arraycolumn[4]==1)
                                <form method="post" action="{{URL::to('pages/5/hidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px;" title="Khóa phiếu" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box" ></i></button>
                                </form>
                            @elseif($arraycolumn[4]==0)
                                <form method="post" action="{{URL::to('pages/5/unhidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 14px; margin-top: 5px;" title="Mở khóa" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box-open" ></i></button>
                                </form>
                            @endif
                            <form method="post" action="{{URL::to('pages/5/detail')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-info btn-sm" style="font-size: 17px; margin-top: 5px;" title="Chi tiết phiếu" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-cog" ></i></button>
                             </form> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


