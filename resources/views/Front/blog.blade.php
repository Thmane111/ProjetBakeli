@extends('Front.index')
@section('content')
<section id="banner"  style="background-image: url({{asset('Front/images/p1.jpg')}});
            background-repeat: no-repeat;background-size: cover; height:200px;
         ">
    <div class="container">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
             
           <center><h2> <strong>Blog</strong></h2></center>
          </div>
          
         
        
        </div>

        <div class="swiper-pagination mb-5"></div>

      </div>
    </div>
  </section>
  <br>
<section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">Craft</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Hadnmate</a></li>
                                <li><a href="#">Interior</a></li>
                                <li><a href="#">Wood</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                <a href="#" class="blog__sidebar__recent__item d-flex">
                                   <div class="row d-flex">
                                   <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset('Front/images/blog-1.jpg')}}" alt="">
                                     
                                       
                                    </div>
                                    <div class="blog__sidebar__recent__item__text text-dark">
                                        <h6>09 Kinds Of Vegetables<br /> Protect The Liver</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                   </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                   <div class="row">
                                   <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset('Front/images/blog-1.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                   </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                   <div class="row">
                                   <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset('Front/images/blog-1.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                                        <span>MAR 05, 2019</span>
                                    </div>
                                   </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('Front/images/blog-1.jpg')}}"">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Visit the clean farm in the US</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                        quaerat </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('Front/images/blog-1.jpg')}}"">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                        quaerat </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('Front/images/blog-1.jpg')}}"">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                        quaerat </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('Front/images/blog-1.jpg')}}"">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">The Moment You Need To Remove Garlic From The Menu</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                        quaerat </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('Front/images/blog-1.jpg')}}"">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                        quaerat </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<style>
  /*---------------------
  Blog
-----------------------*/

.blog__item {
	margin-bottom: 60px;
}

.blog__item__pic img {
	min-width: 100%;
}

.blog__item__text {
	padding-top: 25px;
}

.blog__item__text ul {
	margin-bottom: 15px;
}

.blog__item__text ul li {
	font-size: 16px;
	color: #b2b2b2;
	list-style: none;
	display: inline-block;
	margin-right: 15px;
}

.blog__item__text ul li:last-child {
	margin-right: 0;
}

.blog__item__text h5 {
	margin-bottom: 12px;
}

.blog__item__text h5 a {
	font-size: 20px;
	color: #1c1c1c;
	font-weight: 700;
}

.blog__item__text p {
	margin-bottom: 25px;
}

.blog__item__text .blog__btn {
	display: inline-block;
	font-size: 14px;
	color: #1c1c1c;
	text-transform: uppercase;
	letter-spacing: 1px;
	border: 1px solid #b2b2b2;
	padding: 14px 20px 12px;
	border-radius: 25px;
}

.blog__item__text .blog__btn span {
	position: relative;
	top: 1px;
	margin-left: 5px;
}

.blog__pagination {
	padding-top: 5px;
	position: relative;
}

.blog__pagination:before {
	position: absolute;
	left: 0;
	top: -29px;
	height: 1px;
	width: 100%;
	background: #000000;
	opacity: 0.1;
	content: "";
}

/*---------------------
  Blog Sidebar
-----------------------*/

.blog__sidebar {
	padding-top: 50px;
}

.blog__sidebar__item {
	margin-bottom: 50px;
}

.blog__sidebar__item h4 {
	color: #1c1c1c;
	font-weight: 700;
	margin-bottom: 25px;
}

.blog__sidebar__item ul li {
	list-style: none;
}

.blog__sidebar__item ul li a {
	font-size: 16px;
	color: #666666;
	line-height: 48px;
	-webkit-transition: all, 0.3s;
	-moz-transition: all, 0.3s;
	-ms-transition: all, 0.3s;
	-o-transition: all, 0.3s;
	transition: all, 0.3s;
}

.blog__sidebar__item ul li a:hover {
	color: #7fad39;
}

.blog__sidebar__search {
	margin-bottom: 50px;
}

.blog__sidebar__search form {
	position: relative;
}

.blog__sidebar__search form input {
	width: 100%;
	height: 46px;
	font-size: 16px;
	color: #6f6f6f;
	padding-left: 15px;
	border: 1px solid #e1e1e1;
	border-radius: 20px;
}

.blog__sidebar__search form input::placeholder {
	color: #6f6f6f;
}

.blog__sidebar__search form button {
	font-size: 16px;
	color: #6f6f6f;
	background: transparent;
	border: none;
	position: absolute;
	right: 0;
	top: 0;
	height: 100%;
	padding: 0px 18px;
}

.blog__sidebar__recent .blog__sidebar__recent__item {
	display: block;
}

.blog__sidebar__recent .blog__sidebar__recent__item:last-child {
	margin-bottom: 0;
}

.blog__sidebar__recent__item {
	overflow: hidden;
	margin-bottom: 20px;
}

.blog__sidebar__recent__item__pic {
	float: left;
	margin-right: 20px;
}

.blog__sidebar__recent__item__text {
	overflow: hidden;
}

.blog__sidebar__recent__item__text h6 {
	font-weight: 700;
	color: #333333;
	line-height: 20px;
	margin-bottom: 5px;
}

.blog__sidebar__recent__item__text span {
	font-size: 12px;
	color: #999999;
	text-transform: uppercase;
}

.blog__sidebar__item__tags a {
	font-size: 16px;
	color: #6f6f6f;
	background: #f5f5f5;
	display: inline-block;
	padding: 7px 26px 5px;
	margin-right: 6px;
	margin-bottom: 10px;
}

/*---------------------
  Blog Details Hero
-----------------------*/

.blog-details-hero {
	height: 350px;
	display: flex;
	align-items: center;
}

.blog__details__hero__text {
	text-align: center;
}

.blog__details__hero__text h2 {
	font-size: 46px;
	color: #ffffff;
	font-weight: 700;
	margin-bottom: 10px;
}

.blog__details__hero__text ul li {
	font-size: 16px;
	color: #ffffff;
	list-style: none;
	display: inline-block;
	margin-right: 45px;
	position: relative;
}

.blog__details__hero__text ul li:after {
	position: absolute;
	right: -26px;
	top: 0;
	content: "|";
}

.blog__details__hero__text ul li:last-child {
	margin-right: 0;
}

.blog__details__hero__text ul li:last-child:after {
	display: none;
}

/*---------------------
  Blog Details
-----------------------*/
</style>
  @endsection