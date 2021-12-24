@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
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
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>
            <td>{{$customer->customer_email}}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">...ShopLarevel...</small>
        </div>
      </div>
    </footer>
  </div>
</div>

<br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>
    <div class="table-responsive">
<!-- 
    ?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert" >' .$message. '</span>';
        Session::put('message',null);
      }
    ?> -->
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người vận chuyển</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Hình thức thanh toán</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_phone}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_notes}}</td>
            <td>@if($shipping->shipping_method==0)Chuyển khoản 
              @else 
                Tiền mặt 
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">...ShopLarevel...</small>
        </div>
      </div>
    </footer>
  </div>
</div>

<br><br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
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
            <th>Số lượng </th>
            <th>Kho</th>
            <th>Giá sản phẩm</th>
            <th>Mã giảm giá</th>
            <th>Tổng tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         @php
          $i=0;
          $total=0;
         @endphp
         @foreach($order_details as $key=>$details)
         @php
          $i++;
          $subtotal = $details->product_price*$details->product_sales_quantity;
          $total+=$subtotal;
         @endphp
          <tr class="color_qty_{{$details->product_id}}">
            <td><i>{{$i}}</i></label></td>
            <td>{{$details->product_name}}</td>
            <td>
              <input type="number" min="1" {{$order_status !=1 ? 'disabled' : '' }} class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantit">
              <input type="hidden" class="order_qty_storage_{{$details->product_id}}" name="order_qty_storage" value="{{$details->product->product_quantity}}" >
              <input type="hidden" class="order_code" name="order_code" value="{{$details->order_code}}" >
              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
              @if($order_status ==1)
              <button class="btn btn-default update_quantity_order" data-product_id="{{$details->product_id}}" name="update_quantity_order">Cập nhật</button>
              @endif
            </td>
            <td>{{$details->product->product_quantity}}</td>
            <td>{{number_format($details->product_price,0,',','.')}} VNĐ</td>
            <td>
              @if($details->product_coupon!='no')
                {{$details->product_coupon}}
              @else
                Không có mã áp dụng
              @endif
            </td>
            <td>{{number_format($subtotal,0,',','.')}} VNĐ</td>
          </tr>
          @endforeach
          <tr >
            <td colspan="2">
            @php
              $total_coupon =0;
            @endphp
            @if($coupon_condition==1)
              @php
              $total_after_coupon = ($total*$coupon_number)/100;
              echo 'Giảm Voucher: '.number_format($total_after_coupon,0,',','.').'VNĐ'.'</br>';
              $total_coupon = $total - $total_after_coupon;
              @endphp
          
            @else
              @php
              echo 'Giảm Voucher: '.number_format($coupon_number,0,',','.').'VNĐ'.'</br>';
              $total_coupon = $total-$coupon_number;
              @endphp
            @endif
            Thanh toán: {{number_format($total_coupon,0,',','.')}}VNĐ
            </td>
          </tr>
          <tr>
            <td colspan="6">
              @foreach($order as $key=>$or)
                @if($or->order_status==1)
                  <form>
                    @csrf
                    <select class="form-control order_details">
                      <option value="">----Tình trạng đơn hàng-----</option>
                      <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                      <option id="{{$or->order_id}}" value="2">Đã giao hàng-Đã xử lý</option>
                      <!-- <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option> -->
                    </select>
                  </form>
                @else
                  <form>
                    @csrf
                    <select class="form-control order_details">
                      <option value="">----Tình trạng đơn hàng-----</option>
                      <option disabled id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                      <option id="{{$or->order_id}}" selected value="2" >Đã giao hàng-Đã xử lý</option>
                      <!-- <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option> -->
                    </select>
                  </form>
                @endif
              @endforeach
            </td>
          </tr>
        </tbody>
      </table>
      <a target="blank" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">...ShopLarevel...</small>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection