@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
    </div>
    <div class="table-responsive">
    <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert" >' .$message. '</span>';
        Session::put('message',null);
      }
    ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Tình trạng đơn hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=0;
          @endphp
          @foreach($order as $key =>$ord)
          @php
              $i++;
          @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord -> order_code}}</td>
            <td>{{ $ord -> created_at}}</td>
            <td>@if( $ord -> order_status==1)
                Đơn hàng mới
              @else
                Đã xử lý
              @endif
            </td>
            <td>
              <a href="{{URL::to('view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắn chắn muốn xóa không') " href="{{URL::to('delete-order/'.$ord->order_id)}}" class="active styling-delete" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- import data -->
    <!-- <form action="{{url('/import-csv-order')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
       <input type="submit" value="Import file excel" name="import_csv" class="btn btn-warning">
        </form>
       <form action="{{url('/export-csv-order')}}" method="POST">
          @csrf
       <input type="submit" value="Export file excel" name="export_csv" class="btn btn-success">
        </form> -->
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">...ShopLaravel...</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          {!!$order->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection