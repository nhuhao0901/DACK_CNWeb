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
            @csrf
            <div class="col-md-2">
                <p>Từ ngày:<input type="text" id="datepicker" class="from-control"></p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn sm" value="Lọc kết quả">
            </div>
            <div class="col-md-2">
                <p>Đến ngày:<input type="text" id="datepicker2" class="from-control"></p>

            </div>
        </form>
        <div class="col-md-12">
        <div id="chart" style="height: 250px;"></div>
        </div>
    </div>
    <div class="row">
        <style type ="text/css">
            table.table.table-bordered.table-dark{
                background: #32383e;
            }
            table.table.table-bordered.table-dark.tr td{
               color: #fff;
            }
            
        </style>
        <p class="title_thongke"> Thống kê truy cập </p>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th cope="col">Đang online</th>
                    <th cope="col">Tổng tháng trước</th>
                    <th cope="col">Tổng tháng này</th>
                    <th cope="col">Tổng 1 năm</th>
                    <th cope="col">Tổng truy câp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$visitor_count}}</td>
                    <td>{{$visitor_last_month_count}}</td>
                    <td>{{$visitor_this_month_count}}</td>
                    <td>{{$visitor_year_count}}</td>
                    <td>{{$visitor_total}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <p class="title_thongke">Thống kê tổng sản phẩm, bài viết, đơn hàng</p>
            <div id="donut"></div>
        </div>
    </div>
@endsection