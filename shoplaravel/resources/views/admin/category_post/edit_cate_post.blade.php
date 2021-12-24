@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CẬP NHẬT DANH MỤC BÀI VIẾT
                </header>
                    <div class="panel-body">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" >' .$message. '</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-cate-post/'.$category_post->cate_post_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục bài biết</label>
                                <input type="text" name="cate_post_name" class="form-control" value="{{$category_post->cate_post_name}}" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="cate_post_slug" class="form-control" value="{{$category_post->cate_post_slug}}" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                       <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục bài viết</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="cate_post_desc" id="ckeditor10"  placeholder="Mô tả danh mục">{{$category_post->cate_post_desc}}</textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="cate_post_status" class="form-control input-sm m-bot15">
                                    @if($category_post->cate_post_status==0)
                                        <option selected value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    @else
                                        <option value="0">Ẩn</option>
                                        <option selected value="1">Hiển thị</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="update_cate_post" class="btn btn-info">Cập nhật danh mục bài viết</button>
                            </form>
                        </div>
                    </div>
        </section>
    </div>                
</div>
@endsection