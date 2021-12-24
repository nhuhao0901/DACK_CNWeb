@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <!-- <th>Số lượng đã bán</th> -->
            <th>Thư viện ảnh</th>
            <th>Hình ảnh sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key =>$pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro -> product_name}}</td>
            <td>{{ $pro -> product_quantity}}</td>
            <td><a href="{{URL('/add-gallery/'. $pro -> product_id)}}">Thêm thư viện ảnh</a></td>
            <td><img src="public/upload/product/{{ $pro -> product_image}}" height="100" width="100"></td>
            <td>{{ $pro -> product_price}}</td>
            <td>{{ $pro -> category_name}}</td>
            <td>{{ $pro -> brand_name}}</td>
            <td><span class="text-ellipsis">
              <?php
                  if($pro->product_status==0){
                  ?>
                  <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
                  }else{
                  ?>
                  <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                  <?php
                  }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắn chắn muốn xóa không') " href="{{URL::to('delete-product/'.$pro->product_id)}}" class="active styling-delete" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- import data -->
      <form action="{{url('/import-csv-product')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
       <input type="submit" value="Import file excel" name="import_csv" class="btn btn-warning">
        </form>
        <!-- export data -->
       <form action="{{url('/export-csv-product')}}" method="POST">
          @csrf
       <input type="submit" value="Export file excel" name="export_csv" class="btn btn-success">
        </form>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">...ShopLaravel...</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          {!!$all_product->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection