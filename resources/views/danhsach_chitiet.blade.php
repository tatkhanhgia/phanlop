@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách thí sinh
        </div>
        <div class="panel-body">
            <table id="table_account_manage" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>SBD</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>                                        
                        <th>Nơi sinh</th>
                        <th>CMND</th>
                        <th>Ngày cấp</th>
                        <th>Nơi cấp</th>
                        <th>SDT</th>                        
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($array as $arraycolumn)
                    <tr>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td> 
                        @if($arraycolumn[3]==1)
                            <td><span class="text-ellipsis" >Nam</span></td>
                        @elseif($arraycolumn[3]==0)
                            <td><span class="text-ellipsis">Nữ</span></td>                       
                        @endif   
                        <td><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>  
                        <td><span class="text-ellipsis">{{$arraycolumn[5]}}</span></td>                                                                   
                        <td><span class="text-ellipsis">{{$arraycolumn[6]}}</span></td>                                                                   
                        <td><span class="text-ellipsis">{{$arraycolumn[7]}}</span></td>                                                                   
                        <td><span class="text-ellipsis">{{$arraycolumn[8]}}</span></td>                                                                   
                        <td><span class="text-ellipsis">{{$arraycolumn[9]}}</span></td>                                                                                           
                        <td><form method="post" action="{{URL::to('/chitiet')}}">                                    
                            {{ csrf_field() }}
                                    <input type ="hidden" value = "{{$arraycolumn[12]}}" id="khoathi" name="khoathi">
                                    <input type ="hidden" value = "{{$arraycolumn[0]}}" id="sbd" name="sbd">
                                    <button class="btn btn-danger btn-sm" style="font-size: 17px; margin-top: 5px; width: 100px;height: 40px"  name="id" value="{{$arraycolumn[0]}}" id="id" type="submit">Chi tiết</button>
                                    
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


