@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    
    <!-- Products -->
    <section class="shop-page padding-top-100 padding-bottom-100">
    <div class="container">
        <div class="row"> 
        
        
        @include('frontend.layouts._sidebar')
        <!-- Item Content -->
        <div class="col-sm-9">
            <div class="item-display">
            <div class="row">
                <div class="col-xs-6"> <span class="product-num">Showing 1 - 10 of 30 products</span> </div>
                
                <!-- Products Select -->
                <div class="col-xs-6">
                <div class="pull-right"> 
                    
                    <!-- Short By -->
                    <select class="selectpicker">
                    <option>Short By</option>
                    <option>Short By</option>
                    <option>Short By</option>
                    </select>
                    <!-- Filter By -->
                    <select class="selectpicker">
                    <option>Filter By</option>
                    <option>Short By</option>
                    <option>Short By</option>
                    </select>
                    
                    <!-- GRID & LIST --> 
                    <a href="#." class="grid-style"><i class="icon-grid"></i></a> <a href="#." class="list-style"><i class="icon-list"></i></a> </div>
                </div>
            </div>
            </div>
            
            <!-- Popular Item Slide -->
            <div class="papular-block row single-img-demos"> 
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-2-1.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-2-1.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">stone cup</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Sale Tags -->
                <div class="on-sale"> 10% <span>OFF</span> </div>
                
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-2-2.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-2-2.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">gray bag</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-2-3.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-2-3.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">chiar</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-2-4.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-2-4.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">STool</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-5.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-5.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">stone cup</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-6.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-6.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">gray bag</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-7.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-7.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">chiar</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-8.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-8.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">STool</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            
            <!-- Item -->
            <div class="col-md-4">
                <div class="item"> 
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="images/product-9.jpg" alt="" >
                    <!-- Overlay -->
                    <div class="overlay">
                    <div class="position-center-center">
                        <div class="inn"><a href="images/product-9.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Item Name -->
                <div class="item-name"> <a href="#.">stone cup</a>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <!-- Price --> 
                <span class="price"><small>$</small>299</span> </div>
            </div>
            </div>
            
            <!-- Pagination -->
            <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            </ul>
        </div>
        </div>
    </div>
    </section>
@endsection