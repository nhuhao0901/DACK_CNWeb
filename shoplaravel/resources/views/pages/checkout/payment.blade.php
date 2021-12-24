@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chính</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
            </div>
            <div class="table-responsive cart_info">
                <?php
				$content=Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    @foreach($content as $v_content)
                         <tr>
							<td class="cart_product">
                            <a href=""><img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
							</td>
							<td class="cart_price">
                                 <p>{{number_format($v_content->price,0,',','.').'VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                </form>
								</div>
							</td>
							<td class="cart_total">
                                <p class="cart_total_price">
                                <?php
                                    $subtotal=$v_content->price * $v_content->qty;
                                    echo $subtotal.' '.'VNĐ';
                                ?>
                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    @endforeach
					</tbody>
				</table>
			</div>
            <h4 style="margin:40px 0;font-size:20px;">Phương thức thanh toán </h4>
            <form action="{{URL::to('/order-place')}}" method="POST">
            {{csrf_field()}}
			<div class="payment-options">
					<span>
						<label><input type="checkbox" name="payment_option" value="1">Thẻ ATM</label>
					</span>
					<span>
						<label><input type="checkbox" name="payment_option" value="2"> Tiền mặt</label>
					</span>
					<span>
						<label><input type="checkbox" name="payment_option" value="3"> Thanh toán thẻ ghi nợ</label>
					</span>
                    </br>
                    <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
			</div>
            </form>
		</div>
</section> <!--/#cart_items-->

@endsection