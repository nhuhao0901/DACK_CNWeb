@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center" style="font-size:21px;margin:0;position: inherit;">{{$meta_title}}</h2>

			<!-- <div class="col-sm-4"> -->
				<div class="product-image-wrapper">
                @foreach($post as $key => $p)
					<div class="single-products" style="margin:10px 0">
						<div class="text-center">
									    <img style="float:left;width:33%;height:180px;padding:5px;" src="{{asset('public/upload/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" />
										<h4 style = "color:black;padding:5px;">{{($p->post_title)}}</h4>
                                        
						</div>
                        <p style="float:left;">{!!$p->post_desc!!}</p>
                        <div class="text-center">
                            <a href="{{url('/bai-viet/'.$p->post_slug)}}" class="btn btn-success btn-sm" >Xem bài viết</a>
                        </div>
					</div>
                    <div class="clearfix"></div>
                @endforeach
				</div>
			<!-- </div> -->
          <ul class="pagination pagination-sm m-t-none m-b-none">
              {!!$post->links()!!}
          </ul>
</div><!--features_items-->
@endsection