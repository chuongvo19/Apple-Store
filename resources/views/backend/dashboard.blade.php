@extends('backend.layouts.app')
@section('title')
    <!-- //market-->
    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-users" ></i>
                </div>
                <div class="col-md-8 market-update-left">
                <h4>Người Dùng</h4>
                    <h3>{{ $countUser }}</h3>
                    <p></p>
                </div>
            <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Sản Phẩm</h4>
                    <h3>{{ $countProduct }}</h3>
                    <p></p>
                </div>
            <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Đơn Hàng</h4>
                    <h3>{{ $countOrder }}</h3>
                    <p></p>
                </div>
            <div class="clearfix"> </div>
            </div>
        </div>
    <div class="clearfix"> </div>
    </div>	
    <!-- //market-->
            </div>
        </div>
    </div>
    <div class="agil-info-calendar">
    <!-- calendar -->
    <div class="col-md-12 agile-calendar">
        <div class="calendar-widget">
            <div class="panel-heading ui-sortable-handle">
                <span class="panel-icon">
                <i class="fa fa-calendar-o"></i>
                </span>
                <span class="panel-title"> Lịch (Dương lịch)</span>
            </div>
            <!-- grids -->
                <div class="agile-calendar-grid">
                    <div class="page">
                        
                        <div class="w3l-calendar-left">
                            <div class="calendar-heading">
                                
                            </div>
                            <div class="monthly" id="mycalendar"></div>
                        </div>
                        
                        <div class="clearfix"> </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- //calendar -->
    {{-- <div class="col-md-6 w3agile-notifications">
        
    </div> --}}
    <div class="clearfix"> </div>
    </div>
@endsection