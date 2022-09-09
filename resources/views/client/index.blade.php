<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <div id="container_body">
        <header id="container_header">
            <div class="container_content">
                <div class="header_wrapper">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset('client/img/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <form action="#" method="get" class="header_search" autocomplete="off">
                        <input type="text" placeholder="Search..." id="search">
                        <span>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </form>
                    <div class="cart">
                        <a href="#"><i class="fa fa-cart-shopping"></i></a>
                    </div>
                    <div class="hotline">
                        <a href="">
                            <i class="fa fa-phone"></i>&nbsp;
                            (024)33 811 188
                        </a>
                        <a href="">
                            <i class="fa fa-phone"></i>&nbsp;
                            0971 881 886
                        </a>
                    </div>
                </div>
            </div>
            <nav class="container_nav">
                <ul>
                    @foreach($menu as $item)
                    <li>
                        <a href="{{$item->id}}">{{$item->name}}</a>
                        <ul>
                            @if($item->child)
                                @foreach($item->child as $value)
                                <li><a href="{{$value->id}}">{{$value->name}}</a></li>
                                @endforeach
                            @endif
                            <!-- <li>
                                <a href="#"> ổ cứng 1</a>
                                <ul>
                                    <li><a href="#">2.1</a>
                                        <ul>
                                            <li><a href="#">3.1</a></li>
                                            <li><a href="#">3.2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">2.2</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="#">ổ cứng 3</a>
                                <ul>
                                    <li><a href="#">2.1</a>
                                        <ul>
                                            <li><a href="#">3.1</a></li>
                                            <li><a href="#">3.2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">2.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">ổ cứng 4</a>
                                <ul>
                                    <li><a href="#">2.1</a>
                                        <ul>
                                            <li><a href="#">3.1</a></li>
                                            <li><a href="#">3.2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">2.2</a>
                                        <ul>
                                            <li><a href="#">2.1</a>
                                                <ul>
                                                    <li><a href="#">3.1</a></li>
                                                    <li><a href="#">3.2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">ổ cứng 5</a></li> -->
                        </ul>
                    </li>
                    @endforeach
                    <!-- <li><a href="#">ram</a></li>
                    <li><a href="#">thẻ nhớ</a></li>
                    <li><a href="#">usb</a></li>
                    <li><a href="#">phụ kiện máy tính</a></li>
                    <li><a href="#">phụ kiện</a></li>
                    <li><a href="#">tin tức</a></li> -->
                </ul>
            </nav>
            <div class="container_banner"></div>
        </header>
        <div id="container_content">
            <div class="product_thumb deal_product">
                <a href="#">
                    <h2 class="title">hot deal</h2>
                </a>
                <div class="data data_sale">
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="#">
                            <div class="hot_deal"></div>
                            <div class="picture">
                                <span>
                                    <img src="{{asset('client/img/sp-1.jpg')}}" alt="san-pham-1">
                                </span>
                            </div>
                            <div class="information">
                                <div class="name">SSD 128 Lexar NS 100</div>
                                <div class="price">
                                    <strong>390.000</strong>
                                    <span class="Initial_price">500.000</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <footer id="container_footer"></footer>
    </div>
</body>

</html>