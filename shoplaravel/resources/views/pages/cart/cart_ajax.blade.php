@extends('layout')
@section('content')
<!--<form action="/foo" method="post">
@csrf-->
<section id="cart_items" >
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chính</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
			@elseif(session()->has('error'))
					<div class="alert alert-success">
						{{session()->get('error')}}
					</div>		
			@endif
			<div class="table-responsive cart_info">
				<form action="{{url('/update-cart')}}" method="POST">
				{{ csrf_field() }}
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(Session::get('cart') == true)
						<?php
							$total=0;
						?>
                        @foreach(Session::get('cart') as $key=>$cart)
                        <?php
                            $subtotal = $cart['product_qty'] *$cart['product_price'];
							$total+=$subtotal;
                        ?>
                         <tr>
							<td class="cart_product">
                            <img src="{{asset('public/upload/product/'.$cart['product_image'])}}" width="50" alt="{{$cart['product_name']}}" />
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
                                <p>{{$cart['product_name']}}</p>
							</td>
							<td class="cart_price">
                                 <p>{{number_format($cart['product_price'],0,',','.').' '.'VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                
									<input class="cart_quantity_" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" >
									<!-- <input type="hidden" value="" name="rowId_cart" class="form-control"> -->
								</div>
							</td>
							<td class="cart_total">
                                <p class="cart_total_price">
                                    {{number_format($subtotal,0,',','.').' '.'VNĐ'}}
                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
						<tr>
							<td>
							<input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-default check_out"></td>
							<td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
							<td>
								@if(Session::get('coupon'))
								<a class="btn btn-default check_out" href="{{url('/del-all-coupon')}}">Xóa mã khuyến mãi</a><!--del-all-coupon == unset-coupon-->
								@endif
							</td> 
							<td>
								@if(Session::get('customer'))
								<a class="btn btn-default check_out" href="{{url('/checkout')}}">Mua hàng</a><!--del-all-coupon == unset-coupon-->
								@else
								<a class="btn btn-default check_out" href="{{url('/login-checkout')}}">Mua hàng</a>
								@endif
							</td>
							<!-- <td>
								<a class="btn btn-default check_out" href="">Thanh toán</a>
                            						
							</td> -->
							<td>
								<li>Tổng tiền hàng: <span>{{number_format($total,0,',','.').' '.'VNĐ'}}</span></li>
								@if(Session::get('coupon'))
								<li>
									@foreach(Session::get('coupon') as $key=>$cou)
										@if($cou['coupon_condition']==1)
											Mã giảm giá: {{$cou['coupon_number']}} %
											<p>
												@php
												$total_coupon = ($total /100)*$cou['coupon_number'];
													echo '<p><li>Tổng Voucher giảm giá: '.number_format($total_coupon,0,',','.').' '.'VNĐ'.'</li></p>';
												@endphp
											</p>
											<p><li>Tổng thanh toán: {{number_format($total - $total_coupon,0,',','.').' '.'VNĐ'}}</li></p>
	
										@elseif($cou['coupon_condition']==2)
										Mã giảm: {{number_format($cou['coupon_number'],0,',','.').' '.'VNĐ'}}
										<p>
											@php
												$total_coupon = $total - $cou['coupon_number'];
											@endphp
										</p>
										<p><li>Tổng đã giảm: {{number_format($total_coupon,0,',','.').' '.'VNĐ'}}</li></p>
										@endif
									@endforeach
								</li>
								@endif
								<!-- <li>Thuế <span></span></li>
								<li>Phí vận chuyển<span>Free</span></li> 
								<li>Tiền sau khi giảm <span></span></li>-->
							</td>
						</tr>
					@else
					
						<tr>
							<td colspan ="5" style="color:green"><center><b>
							<?php
								echo 'Vui lòng thêm sản phẩm vào giỏ hàng';
							?></b></center>
							</td>
						</tr>
					@endif
					</tbody>
				</table>
				</form>
				@if(Session::get('cart'))
				<tr>
					<td>
					<form method="POST" action="{{url('/check-coupon')}}">
						@csrf
						<input type="text" action="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br><br>
						<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
					</form>	
					</td>
				</tr>
				@endif
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection