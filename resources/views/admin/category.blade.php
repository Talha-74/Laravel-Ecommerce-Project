<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

    <head>
        @include('admin.css');

        <style>
            .div_center {
                text-align: center;
                padding-top: 40px;
            }

            .font-size {
                font-size: 30px;
                padding-bottom: 20px;
            }

            .input_color {
                color: black;
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

                    @if (session()->has('message'))
                        <div class="alert alert-success" style="display: flex; align-items: center;">
                            {{ session()->get('message') }}
                            <button type="button" class="close" aria-hidden="true"
                                style="margin-left: auto; margin-right: 0;"
                                onclick="this.parentElement.style.display='none'">X</button>
                        </div>
                    @endif

                    <div class="div_center">
                        <h2 class="font-size">
                            Add Category
                        </h2>
                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" class="input_color" name="name" placeholder="Write Category name">

                            <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                        </form>
                    </div>

                    <div class="container text-center">
                        <table class="table table-bordered mt-3 mb-3 text-white table-hover table-stripped"
                            style="margin: 0 auto; max-width: fit-content; color:white">
                            <thead class="text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->category_name }}</td>
                                        <td>

                                            <a href="{{ url('delete_category', $data->id) }}"> <button class="btn btn-danger" >Delete</button></a>
                                             <button class="btn btn-warning">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if (session()->has('delete'))
                        <div class="alert alert-success" style="display: flex; align-items: center;">
                            {{ session()->get('delete') }}
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
