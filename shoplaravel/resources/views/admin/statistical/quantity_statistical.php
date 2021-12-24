@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
        p.title_thongke{
            text-align:center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <div class="row">
        <p class="title_thongke">Thông kê doanh số đơn hàng</p>
        <form autocomplete="off">
            @csrf_field
            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn sm" value="Lọc kết quả">
            </div>
            <div class="col-md-2">
                <p>Đến ngày:<input type="text" id="dateppicker2" class="from-control"></p>

            </div>
            <!-- <div class="col-md-2">
                <p>
                    Lọc theo:
                    <select class="dashboard-filter from-control">
                        <option>--Chọn--</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangqua">Tháng qua</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngay">365 ngày qua</option>
                    </select>
                </p>
            </div> -->
        </form>
        <div class="col-md-12">
            <div id="myfirstchart" style="height:250px;"></div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
    </div>

@endsection