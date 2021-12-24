@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM BÀI VIẾT
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
                            <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài biết</label>
                                <input type="text" name="post_title" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control" onkeyup="ChangeToSlug();" id="Slug" placeholder="Tên danh mục">
                           </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="post_slug" class="form-control" id="convert_slug" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="post_content" id="ckeditor11" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="post_desc" id="ckeditor12" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta từ khóa</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="post_meta_keywords" id="ckeditor13" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa nội dung</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="post_meta_desc" id="ckeditor14" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục bài viết</label>
                                <select name="cate_post_id" class="form-control input-sm m-bot15">
                                    @foreach($cate_post as $key => $cate)
                                    <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_post" class="btn btn-info">Thêm bài viết</button>
                            </form>
                        </div>
                    </div>
        </section>
    </div>                
</div>
@endsection