<!DOCTYPE html>
<html>

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="images/favicon.png" type="">
        <title>Famms - Fashion HTML Template</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="home/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="home/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="home/css/responsive.css" rel="stylesheet" />

        <style type="text/css">
            .center {
                margin: auto;
                width: 50%;
                padding: 30px;
                text-align: center;
            }

            table,
            th,
            td {
                border: 1px solid skyblue;
                /* border-collapse: collapse; */
            }

            .th-deg {
                border: 2px solid skyblue;
                background: skyblue;
                font-size: 15px;
                padding: 5px;
            }
        </style>
    </head>

    <body>
        <div class="hero_area">
            <!-- header section strats -->
            @include('home.header');
            <!-- end header section -->

            <div class="center">
                <table class="table ">
                    <tr>
                        <th class="th-deg">Product title</th>
                        <th class="th-deg">Product quantity</th>
                        <th class="th-deg">Price</th>
                        <th class="th-deg">Image</th>
                        <th class="th-deg">Action</th>
                    </tr>

                    <?php $totalprice = 0; ?>

                    @foreach ($cart as $cart)
                        <tr>
                            <td>{{ $cart->product_title }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->price }}</td>
                            <td><img src="/product/{{ $cart->image }}" alt="" width="70px" height="70px">
                            </td>
                            <td><a href="{{url('remove_cart', $cart->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to remove the product?')">Remove</a></td>
                        </tr>
                        <?php $totalprice = $totalprice + $cart->price; ?>
                    @endforeach
                </table>
                <h5>Total Price: {{$totalprice}}</h5>

                @if (session()->has('message'))
                <div class="alert alert-success" style="display: flex; align-items: center;">
                    {{ session()->get('message') }}
                    <button type="button" class="close" aria-hidden="true"
                        style="margin-left: auto; margin-right: 0;"
                        onclick="this.parentElement.style.display='none'">X</button>
                </div>
            @endif

            </div>
            

            <!-- footer start -->
            @include('home.footer');
            <!-- footer end -->
            <div class="cpy_">
                <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html
                        Templates</a><br>

                    Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

                </p>
            </div>
            <!-- jQery -->
            <script src="home/js/jquery-3.4.1.min.js"></script>
            <!-- popper js -->
            <script src="home/js/popper.min.js"></script>
            <!-- bootstrap js -->
            <script src="home/js/bootstrap.js"></script>
            <!-- custom js -->
            <script src="home/js/custom.js"></script>
    </body>

</html>
