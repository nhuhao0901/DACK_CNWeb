@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center" style="margin:0;position: inherit;font-size:21px;">{{$meta_title}}</h2>

			<!-- <div class="col-sm-4"> -->
				<div class="product-image-wrapper">
                @foreach($post as $key => $p)
					<div class="single-products" style="margin:10px 0">
						{!!$p->post_content!!}
					</div>
                    <div class="clearfix"></div>
                @endforeach
				</div>
			<!-- </div> -->
			<h2 class="title text-center" style="margin:0;font-size:21px;paddind:6px;">Bài viết liên quan</h2>
			<style>
				ul.post_relate li{
					list-style-type:disc;
					font-size: 16px;
					padding: 6px;
				}
				ul.post_relate li a:hover{
					color: #0000CD;
					font-weight:bold;
				}
			</style>
			<ul class="post_relate">
				@foreach( $related as $key =>$post_relate)
				<li><a href="{{url('/bai-viet/'.$post_relate->post_slug)}}">{{$post_relate->post_title}}</a></li>
				@endforeach
			</ul>
</div><!--features_items-->
@endsection