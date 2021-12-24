@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <a href="{{URL::to('pages/2/count')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-plus-circle"></i>Tồn hàng</button></a>
</div>
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý Kho--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý Kho Nguyên Liệu
        </div>
        <div class="panel-body">
            <table id="table_material" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã nguyên liệu</th>
                        <th>Tên NCC</th>
                        <th>Tên nguyên liệu</th>
                        <th>Số lượng</th>
                        <th>Gía nhập</th>
                        <th>Ngày nhập</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arMate as $arraycolumn)
                    <tr>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[3]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[5]}}</span></td>                                            
                        @if($arraycolumn[6]==1)
                            <td><span class="text-ellipsis" style="color: green;">Còn hàng</span></td>
                        @elseif($arraycolumn[6]==0)
                            <td><span class="text-ellipsis" style="color: red;">Hết hàng</span></td>                       
                        @endif                        
                        <td>
                            @if($arraycolumn[6]==1)
                                <form method="post" action="{{URL::to('pages/2/hidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px;" title="Khóa hàng" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box" ></i></button>
                                </form>
                            @elseif($arraycolumn[6]==0)
                                <form method="post" action="{{URL::to('pages/2/unhidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 14px; margin-top: 5px;" title="Mở hàng" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box-open" ></i></button>
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
