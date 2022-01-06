<!DOCTYPE html>
<html>

<head>
  <title>Giấy Chứng nhận</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

<style type="text/css">
    body {
      font-family: DejaVu Sans, sans-serif;
 }
  .invoice-header {
    background: #f7f7f7;
    padding: 10px 20px 10px 20px;
    barrayMate-bottom: 1px solid gray;
    
    font-family: DejaVu Sans, sans-serif;
  }
  .site-logo {
    margin-top: 20px;
  }
  .invoice-right-top h3 {
    padding-right: 20px;
    margin-top: 20px;
    color: green;
    font-size: 30px!important;
    font-family: DejaVu Sans, sans-serif;
  }
  .invoice-left-top {
    barrayMate-left: 4px solid green;
    padding-left: 20px;
    padding-top: 20px;
    font-family: DejaVu Sans, sans-serif;
  }
  .invoice-left-top p {
    margin: 0;
    line-height: 20px;
    font-size: 16px;
    margin-bottom: 3px;
    font-family: DejaVu Sans, sans-serif;
  }
  thead {
    background: green;
    color: #FFF;
  }
  .authority h5 {
    margin-top: -10px;
    color: green;
  }
  .thanks h4 {
    color: green;
    font-size: 25px;
    font-weight: normal;
    font-family: DejaVu Sans, sans-serif;
    margin-top: 20px;
  }
  .site-address p {
    line-height: 6px;
    font-weight: 300;
  }
  .table tfoot .empty {
    barrayMate: none;
  }
  .table-barrayMateed {
    barrayMate: none;
  }
  .table-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    barrayMate-bottom: 1px solid rgba(0,0,0,.125);    
  }
  .table td, .table th {
    padding: .30rem;
  }
</style>
  <!-- <div class="invoice-header">
    <div class="float-left site-logo">
      <img src="{{asset('backend/img/logo.png')}}" alt="">
    </div>
    <div class="float-right site-address">
      <h4>{{env('APP_NAME')}}</h4>
      <p>{{env('APP_ADDRESS')}}</p>
      <p>Phone: <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a></p>
      <p>Email: <a href="mailto:{{env('APP_EMAIL')}}">{{env('APP_EMAIL')}}</a></p>
    </div>
    <div class="clearfix"></div>
  </div> -->
  <div class="invoice-description">
    <div class="invoice-left-top float-left">
        <h1>Giay Chung Nhan thi Anh Van</h1>
        <h4>Ho va ten thi sinh: {{$ho}} {{$ten}}</h4>
        <h4>SBD: {{$SBD}}</h4>
        <h4>Khoathi: {{$khoathi}}</h4>

       <div class="address">
         <p><strong>SDT:</strong> {{ $sdt }}</p>
         <p><strong>Email:</strong> {{ $email }}</p>
       </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <section class="arrayMate_details pt-3">
    <div class="table-header">
      <h4>Chi tiet Bang diem</h4>
    </div>
    <table class="table table-barrayMateed table-stripe">
      <thead>
        <tr>
          <th scope="col" class="col-6">Nghe</th>
          <th scope="col" class="col-3">Nói</th>
          <th scope="col" class="col-3">Đọc</th>
          <th scope="col" class="col-3">Viết</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span>{{$nghe}}</span></td>
          <td><span>{{$noi}}</span></td>
          <td><span>{{$doc}}</span></td>
          <td><span>{{$viet}}</span></td>
        </tr>      
      </tbody>
    </table>
  </section>
  <div class="thanks mt-3">
    <h4>Đã hòan thành chương trình thi Anh Văn tại trung tâm</h4>
  </div>
  <div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>TPHCM ngày...tháng...nam</h5>
    <h4>Ký tên</h4>
  </div>
  <div class="clearfix"></div>

  
</body>
</html>