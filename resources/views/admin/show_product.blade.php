<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

    <head>
        @include('admin.css');
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
                    <h2 style="font-size: 30px; text-align:center">List of Products</h2>
                    <div class="container text-center">
                        <table class="table table-bordered mt-3 mb-3 text-white table-hover table-stripped"
                            style="margin: 0 auto; max-width: fit-content; color:white">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Discount-Price</td>
                                    <td>Category</td>
                                    <td>Image</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>
                                            <img src="/product/{{ $product->image }}" alt="" width="100px"
                                                height="100px">
                                        </td>
                                        <td> <a href="{{ url('/delete_product', $product->id) }}"
                                                onclick="return confirm('Are you sure to delete this?')"> <button
                                                    class="btn btn-danger">Delete</button></a>

                                            <a href="{{ url('/update_product', $product->id) }}"
                                                onclick="return confirm('Are you sure to Update this?')"> <button
                                                    class="btn btn-warning">Edit</button></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    @if (session()->has('message'))
                        <div class="alert alert-success" style="display: flex; align-items: center;">
                            {{ session()->get('message') }}
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
