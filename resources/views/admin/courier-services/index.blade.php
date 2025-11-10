@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">My Store Lists</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Store List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>
    <!--end breadcrumb-->
    <hr>

    {{-- Admin List Table --}}
    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-semibold">
                    My Store List
                </div>
                <div class="card-body table-responsive">
                    {{-- Search --}}
                    <form method="GET" action="{{ route('admin.register.page') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by name, email or phone" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                    <br>

                    {{-- Table --}}
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Merchant Name</th>
                                <th>Store Name</th>
                                <th>Booking Operator</th>
                                <th>Booking</th>
                                <th>Courier</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $item)
                                <tr>
                                    <td>1</td>
                                    <td>Faisal A. Salam</td>
                                    <td>Taabir</td>
                                    <td>Kashim</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            10
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking Order
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="bg-dark text-white">
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Order ID</th>
                                                                        <th scope="col">Product Name</th>
                                                                        <th scope="col">QTY</th>
                                                                        <th scope="col">Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>1234</td>
                                                                        <td>Product 1</td>
                                                                        <td>2</td>
                                                                        <td>100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>1234</td>
                                                                        <td>Product 2</td>
                                                                        <td>2</td>
                                                                        <td>200</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>1234</td>
                                                                        <td>Product 3</td>
                                                                        <td>2</td>
                                                                        <td>300</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">4</th>
                                                                        <td>1234</td>
                                                                        <td>Product 4</td>
                                                                        <td>2</td>
                                                                        <td>400</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">5</th>
                                                                        <td>1234</td>
                                                                        <td>Product 5</td>
                                                                        <td>2</td>
                                                                        <td>500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">6</th>
                                                                        <td>1234</td>
                                                                        <td>Product 6</td>
                                                                        <td>2</td>
                                                                        <td>600</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"></th>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><strong>2100</strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                    <td>
                                        <select class="form-select form-select-md" id="division_id" name="division_id"
                                            aria-label="Small select example" required>
                                            <option value="" selected>Select Courier</option>
                                            <option value="1">Pathao</option>
                                            <option value="2">Steadfast</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm d-inline-flex align-items-center btn-warning">
                                            <i class="bx bx-check"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="col-lg-12">
                        <div class="mt-3">
                            {{ $stores->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
