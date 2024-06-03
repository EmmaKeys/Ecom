@extends('layout.admin')

@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                <li class="breadcrumb-item active">Create product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="" method="POST" id="createproduct-form" autocomplete="off" class="needs-validation">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                <i class="bi bi-box-seam"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-1">Product Information</h5>
                                        <p class="text-muted mb-0">Fill all information below.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Product Name</label>
                                    <input type="text" name="productName" class="form-control" id="product-title-input" value="" placeholder="Enter product name">
                                </div>

                                <div>
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-label">Product category</label>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="form-select" id="choices-category-input" name="productCategory">
                                            <option disabled="true" selected="false">Select product category</option>
                                            @foreach($categoryLinks as $category)
                                            <option value="">{{$category->category }}"></option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                <i class="bi bi-images"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-1">Product Gallery</h5>
                                        <p class="text-muted mb-0">Add product gallery image.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="file" name="productImage" class="form-control">
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Description</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-2">Add short description for product</p>
                                <textarea class="form-control" name="productDescription" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                            </div>
                            <!-- end card body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                                <i class="bi bi-list-ul"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-1">General Information</h5>
                                        <p class="text-muted mb-0">Fill all information below.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Manufacturer Name</label>
                                            <input type="text" value="" name="manufacturerName" class="form-control" id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="choices-publish-status-input" class="form-label">Status</label>

                                            <select class="form-select" name="status">
                                                <option value="available">Available</option>
                                                <option value="not-available">Not Available</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-5 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                <input type="text" value="" name="productPrice" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                <input type="text" value="" name="discountPrice" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="">Quantity</label>
                                            <input type="text" value="" name="quantity" class="form-control" id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="choices-publish-status-input" class="form-label">Status</label>

                                            <select class="form-select" name="status">
                                                <option value="available">Available</option>
                                                <option value="not-available">Not Available</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Submit</button>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </form>
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Toner.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
@endsection