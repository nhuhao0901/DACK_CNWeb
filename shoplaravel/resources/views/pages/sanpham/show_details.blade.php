@extends('layout')
@section('content')
@foreach($product_details as $key =>$valus)
<div class="product-details"><!--product-details-->
						<style>
							.lSSlideOuter .lSPager.lSGallery img {
								display: block;
								height: 100px;
								max-width: 100%;
							}
							li.active {
								border:2px solid #FE980F;
							}
						</style>
						<div class="col-sm-5">
							<ul id="imageGallery">
								@foreach($gallery as $key=>$gal)
								<li data-thumb="{{asset('public/upload/gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/upload/gallery/'.$gal->gallery_image)}}">
									<img width="100%" alt="{{$gal->gallery_name}}" src="{{asset('public/upload/gallery/'.$gal->gallery_image)}}" />
								</li>
								@endforeach
							</ul>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$valus->product_name}}</h2>
								<p>Mã ID: {{$valus->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form>
									@csrf
										<input type="hidden" value="{{$valus->product_id}}" class="cart_product_id_{{$valus->product_id}}">
                                        <input type="hidden" value="{{$valus->product_name}}" class="cart_product_name_{{$valus->product_id}}">
                                        <input type="hidden" value="{{$valus->product_image}}" class="cart_product_image_{{$valus->product_id}}">
                                        <input type="hidden" value="{{$valus->product_price}}" class="cart_product_price_{{$valus->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$valus->product_id}}">
									</form>
								<span>
									<span>{{number_format($valus->product_price).' '.'VNĐ'}}</span>
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" value="1" />
									<input name="productid_hidden" type="hidden" m value="{{$valus->product_id}}" />
									<button type="button" class="btn btn-default add-to-cart" 
									data-id_product="{{$valus->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
								</span>
								<p><b>Tình trạng: </b>Còn hàng</p>
								<p><b>Danh mục: </b>{{$valus->category_name}}</p>
								<p><b>Thương hiệu: </b>{{$valus->brand_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li  class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
								<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$valus->product_desc!!}</p>
							</div>
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$valus->product_content!!}</p>
							</div>
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					@endforeach
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach($relate as $key=>$lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
											<div class="productinfo text-center">
											<form>
											@csrf
											<input type="hidden" value="{{$lienquan->product_id}}" class="cart_product_id_{{$lienquan->product_id}}">
                                            <input type="hidden" value="{{$lienquan->product_name}}" class="cart_product_name_{{$lienquan->product_id}}">
                                            <input type="hidden" value="{{$lienquan->product_image}}" class="cart_product_image_{{$lienquan->product_id}}">
                                            <input type="hidden" value="{{$lienquan->product_price}}" class="cart_product_price_{{$lienquan->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$lienquan->product_id}}">
											<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
												<img src="{{URL::to('public/upload/product/'.$lienquan->product_image)}}" alt="" />
												<h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
												<p>{{($lienquan->product_name)}}</p>
											</a>
											<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$lienquan->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
											</form>
											</div>
										</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection