@extends('admin_layout')
@section('admin_content')
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý Sản phẩm--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý Sản phẩm
        </div>
        <div class="panel-body">
            <table id="table_account_manager" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Gía bán</th>
                        <th>Dates</th>                        
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arrayMate as $arraycolumn)
                    <tr>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[5]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[3]}}</span></td>                                                                   
                        @if($arraycolumn[4]==1)
                            <td><span class="text-ellipsis" style="color: green;">Còn hàng</span></td>
                        @elseif($arraycolumn[4]==0)
                            <td><span class="text-ellipsis" style="color: red;">Hết hàng</span></td>                       
                        @endif                        
                        <td>
                            @if($arraycolumn[4]==1)
                                <form method="post" action="{{URL::to('pages/4/hidden')}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px;" title="Khóa hàng" name="id" value="{{$arraycolumn[0]}}" id="id" type="submit"><i class="fas fa-box" ></i></button>
                                </form>
                            @elseif($arraycolumn[4]==0)
                                <form method="post" action="{{URL::to('pages/4/unhidden')}}">
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
