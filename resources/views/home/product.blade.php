<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details', $products->id) }}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{url('/add_cart', $products->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width: 100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" value="Add to cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="/product/{{ $products->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>{{ $products->title }}</h5>

                            @if ($products->discount_price != null)
                                <h6 style="color: red;  text-decoration: line-through;">
                                    Price
                                    <br>
                                    ${{ $products->price }}
                                </h6>
                                <h6 style="color: blue; ">
                                    Discount price
                                    <br>
                                    ${{ $products->discount_price }} <!-- Display the discounted price -->
                                </h6>
                            @else
                                <h6 style="color: blue;">
                                    Price
                                    <br>
                                    ${{ $products->price }} <!-- Display the original price if no discount -->
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <span style="padding: 20px">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>
        
        @if (session()->has('message'))
        <div class="alert alert-success" style="display: flex; align-items: center;">
            {{ session()->get('message') }}
            <button type="button" class="close" aria-hidden="true"
                style="margin-left: auto; margin-right: 0;"
                onclick="this.parentElement.style.display='none'">X</button>
        </div>
    @endif

</section>
