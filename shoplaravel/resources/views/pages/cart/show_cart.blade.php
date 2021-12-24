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
		</div>
	</section> <!--/#cart_items-->
</form>
	<section id="do_action">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::pricetotal(0,',','.').' '.'VNĐ'}}</span></li>
							<li>Thuế <span>{{Cart::tax(0,',','.').' '.'VNĐ'}}</span></li>
							<li>Phí vận chuyển<span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total(0,',','.').' '.'VNĐ'}}</span></li>
						</ul>
						<?php
									$customer_id=Session::get('customer_id');
									if($customer_id!=NULL){
								?>
									<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
								<?php
									}else{
										?>
										<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
										<?php
									}	
								?>
							
					</div>
				</div>
		</div>
	</section><!--/#do_action-->
@endsection