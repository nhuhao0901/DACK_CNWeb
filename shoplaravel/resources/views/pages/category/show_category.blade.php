@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
<!--Chú ý: thay data-href = "{{$url_canonical}}"-->
<!--nút like -share-->
						<!-- <div class="fb-like" data-href="http://localhost:8080/shoplaravel/danh-muc-san-pham/11" 
						data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div> -->
						<!-- ----end------->
                         @foreach($category_name as $key =>$name)
                        <h2 class="title text-center">{{$name->category_name}}</h2>
                        @endforeach
                        @foreach($category_by_id as $key => $product)
                        <!-- <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"> -->
						<div class="col-sm-4">
						<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<form>
											@csrf
											<input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
											<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
												<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
												<h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
												<p>{{($product->product_name)}}</p>
												<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa
												<-shopping-cart"></i>Thêm vào giỏ hàng</a> -->
											</a>
											<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
										</form>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
									</ul>
								</div>
							</div>
						</div>
                        </a>
						@endforeach
						<!--thay data-href = "{{$url_canonical}}"--comment_fb-->
						<!-- <div class="fb-comments" data-href="http://localhost:8080/shoplaravel/danh-muc-san-pham/11" 
						data-width="" data-numposts="30"></div> -->
</div><!--features_items-->
@endsection