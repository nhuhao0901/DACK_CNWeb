@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM THƯƠNG HIỆU SẢN PHẨM
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
                            <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="brand_product_desc" id="ckeditor3" placeholder="Mô tả danh mục"></textarea>
                            </div>
                       <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa thương hiệu</label>
                                <textarea style="resize:none" row="5" cols="93px"  class="form-contronl" name="category_product_keyword" id="ckeditor6" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                            </form>
                        </div>
                    </div>
        </section>
    </div>                
</div>
@endsection