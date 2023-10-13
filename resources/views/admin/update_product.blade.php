<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
    <base href="/public">

    <head>
        @include('admin.css');

        <style>
            .div_center {
                text-align: center;
                padding-top: 20px;
            }

            .font_size {
                font-size: 30px;
                padding-bottom: 20px;
            }

            .text-color {
                color: black;
                padding-bottom: 20px;
            }

            label {
                display: inline-block;
                width: 200px;
            }

            .dev_design {
                padding-bottom: 15px;
            }
        </style>
    </head>

    <body>
        <div class="container-scroller">
            <div class="row p-0 m-0 proBanner" id="proBanner">
                <div class="col-md-12 p-0 m-0">
                    <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                        <div class="ps-lg-1">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                    and more with this template!</p>
                                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                    target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                    class="mdi mdi-home me-3 text-white"></i></a>
                            <button id="bannerClose" class="btn border-0 p-0">
                                <i class="mdi mdi-close text-white me-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- partial:partials/_sidebar.html -->
            @include('admin.slidebar');
            <!-- partial -->
            @include('admin.header');
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="div_center">
                        <h1 class="font_size">Add Products</h1>

                        <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="dev_design">
                                <label for="title">Product Title: </label>
                                <input class="text-color" type="text" name="title" value="{{ $product->title }}"
                                    required>
                            </div>
                            <div class="dev_design">
                                <label for="title">Product Description: </label>
                                <input class="text-color" type="text" name="description"
                                    value="{{ $product->description }}" required>
                            </div>

                            <div class="dev_design">
                                <label for="title">Product Quantity: </label>
                                <input class="text-color" type="number" name="quantity"
                                    value="{{ $product->quantity }}" required>
                            </div>
                            <div class="dev_design">
                                <label for="title">Product Price: </label>
                                <input class="text-color" name="price" value="{{ $product->price }}" required>
                            </div>
                            <div class="dev_design">
                                <label for="title">Discount_Price: </label>
                                <input class="text-color" type="text" name="discount_price"
                                    value="{{ $product->discount_price }}">
                            </div>
                            <div class="dev_design">
                                <label for="title">Product Category: </label>
                                <select class="text-color" name="category" id="" required>
                                    @foreach ($category as $category)
                                        <option value="{{ $product->category }}" selected>{{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="dev_design">
                                <label for="title">Current Product Image: </label>
                                <img src="/product/{{ $product->image }}" style="margin: auto;" width="100px"
                                    height="100px">
                            </div>

                            <div class="dev_design">
                                <label for="title">Change Product Image: </label>
                                <input class="text-color" type="file" name="image">
                            </div>

                            <div class="dev_design">
                                <input type="submit" name="Submit" class="btn btn-primary" value="Add Product">
                            </div>
                    </div>
                    </form>
                    <br>
                    @if (session()->has('product'))
                        <div class="alert alert-success" style="display: flex; align-items: center;">
                            {{ session()->get('product') }}
                            <button type="button" class="close" aria-hidden="true"
                                style="margin-left: auto; margin-right: 0;"
                                onclick="this.parentElement.style.display='none'">X</button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- container-scroller -->
            @include('admin.script');
    </body>

</html>
