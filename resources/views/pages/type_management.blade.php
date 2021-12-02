@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <a href="{{URL::to('pages/3/add')}}"><button type="submit" class="btn btn-warning" id="add_position">Thêm loại sản phẩm</button></a>
</div>
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý loại sản phẩm--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý loại sản phẩm
        </div>
        <div class="panel-body">
            <table id="table_account_manage" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arrayMate as $arraycolumn)
                    <tr>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>                        
                        <!-- Kiểm tra trạng thái -->
                        @if($arraycolumn[2]==1)
                            <td><span class="text-ellipsis" style="color: green;">Đang hoạt động </span></td>
                        @elseif($arraycolumn[2]==0)
                            <td><span class="text-ellipsis" style="color: red;">Đang khóa</span></td>                       
                        @endif
                        <td>
                            @if($arraycolumn[2]==1)
                                <form method="post" action="{{URL::to('pages/3/hidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px;" title="Khóa" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fa fa-lock" ></i></button>
                                </form>
                            @elseif($arraycolumn[2]==0)
                                <form method="post" action="{{URL::to('pages/3/unhidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 14px; margin-top: 5px;" title="Mở" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fa fa-unlock" ></i></button>
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
