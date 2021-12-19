@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <a href="{{URL::to('pages/5')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-arrow-circle-left">Quay lại</i></button></a>
    <?php
            $arStaff = Session::get('arStaff');		    
    ?>
    @if($arStaff[0] == 1)
        <a href="{{URL::to('pages/5/detail_change')}}"><button type="submit" class="btn btn-warning" id="add_position"><i class="fas fa-cog" >Chỉnh sửa</i></button></a>    
    @endif
</div>
{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý chi tiết phiếu nhập hàng--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết phiếu nhập hàng
        </div>
        <div class="panel-body">
            <table id="table_importdetail" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã phiếu nhập</th>
                        <th>Mã nguyên liệu</th>
                        <th>Tên nguyên liệu</th>
                        <th>Số lượng</th>
                        <th>Tiền nhập</th>
                        <th>Ngày nhập</th>                                                                
                    </tr>
                </thead>
                <tbody>
                @foreach($arrayMate as $arraycolumn)
                    <tr>                        
                        <td><span class="text-ellipsis">{{$arraycolumn[0]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[5]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[3]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>                                                                                                                                                              
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
