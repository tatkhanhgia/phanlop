@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <a href="{{URL::to('pages/8/add')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-plus-circle"></i>Thêm nhân viên</button></a>
</div>
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý nhân viên--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý Nhân viên
        </div>
        <div class="panel-body">
            <table id="table_account_manage" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Mã account</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arrayMate as $arraycolumn)
                    <tr>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>       
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}} {{$arraycolumn[3]}}</span></td>       
                        <td><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>       
                        <td><span class="text-ellipsis">{{$arraycolumn[5]}}</span></td>       
                        <td><span class="text-ellipsis">{{$arraycolumn[6]}}</span></td>       
                        <td><span class="text-ellipsis">{{$arraycolumn[7]}}</span></td>                        
                        <!-- Kiểm tra trạng thái -->
                        @if($arraycolumn[8]==1)
                            <td><span class="text-ellipsis" style="color: green;">Đang hoạt động </span></td>
                        @elseif($arraycolumn[8]==0)
                            <td><span class="text-ellipsis" style="color: red;">Đang khóa</span></td>                       
                        @endif
                        <td>
                            @if($arraycolumn[8]==1)
                                <form method="post" action="{{URL::to('pages/8/hidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px;" title="Khóa" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fa fa-lock" ></i></button>
                                </form>
                            @elseif($arraycolumn[8]==0)
                                <form method="post" action="{{URL::to('pages/8/unhidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 14px; margin-top: 5px;" title="Mở" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fa fa-unlock" ></i></button>
                                </form>
                            @endif
                            <form method="post" action="{{URL::to('pages/8/change')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-info btn-sm" style="font-size: 17px; margin-top: 5px;" title="Thay đổi thông tin" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-cog" ></i></button>
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
