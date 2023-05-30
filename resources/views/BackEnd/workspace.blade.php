@extends('BackEnd.Layout.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Responsive Table js -->
    <script src="{{url('theme').'/assets/libs/admin-resources/rwd-table/rwd-table.min.js'}}"></script>


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="{{route('ewb')}}">Eway Bill List</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Group Eway Bill</li>
                        </ol>
                      </nav>

                    <div class="card row ">

                        <h4 class="card-header bg-transparent border-bottom text-uppercase">
                            <i class="fas fa-check-square fa-lg"></i> Group Ewaybill List
                        </h4>
                        <div class="col-12">
                            {{-- <div class="card">
                                <div class="row"> --}}
                            <div class="row mt-2">

                                <div class="col-lg-3">
                                    <div class="mb-1">
                                        <label class="form-label mb-0">Select Date Range</label>
                                        <div class="input-daterange input-group" id="datepicker6"
                                            data-date-format="dd-mm-yyyy" data-date-autoclose="true"
                                            data-provide="datepicker" data-date-container='#datepicker6'>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control form-control-sm" name="from_date"
                                                    placeholder="Start Date" id="start_date" onchange="filterdata()">
                                                <div class="input-group-append mr-2">
                                                    <span class="input-group-text form-control-sm"><i
                                                            class="mdi mdi-calendar" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm" name="to_date"
                                                    placeholder="End Date" id="end_date" onchange="filterdata()">
                                                <div class="input-group-append">
                                                    <span class="input-group-text form-control-sm"><i
                                                            class="mdi mdi-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1"><label class="form-label mb-0">Vehicle No</label>
                                        <div class="input-group btn-group">
                                            <div class="dropdown btn-group">
                                                <button class="btn btn-secondary dropdown-toggle pt-0 pb-0" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-filter-menu font-size-16"></i>
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                                    <label class="form-label">Filter Method</label><select name="filter[]"
                                                        class="form-select" id="child_vehicleNo">
                                                        <option value="1">Is equal to</option>
                                                        <option value="2">Is not equal to</option>
                                                        <option value="3">Starts with</option>
                                                        <option value="4" selected="selected">Contains</option>
                                                        <option value="5">Does not contain</option>
                                                        <option value="6">Ends with</option>
                                                    </select>
                                                </div>
                                            </div><input type="text" name="search_input[]" value=""
                                                class="form-control form-control-sm" id="vehicleNo"
                                                onkeyup="filterdata()" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1"><label class="form-label mb-0">Ewb No</label>
                                        <div class="input-group btn-group">
                                            <div class="dropdown btn-group">
                                                <button class="btn btn-secondary dropdown-toggle pt-0 pb-0" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-filter-menu font-size-16"></i>
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                                    <label class="form-label">Filter Method</label><select name="filter[]"
                                                        class="form-select">
                                                        <option value="1">Is equal to</option>
                                                        <option value="2">Is not equal to</option>
                                                        <option value="3">Starts with</option>
                                                        <option value="4" selected="selected">Contains</option>
                                                        <option value="5">Does not contain</option>
                                                        <option value="6">Ends with</option>
                                                    </select>
                                                </div>
                                            </div><input type="text" name="search_input[]" value=""
                                                class="form-control form-control-sm" id="ewbNo"
                                                onkeyup="filterdata()" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-1"><label class="form-label mb-0"></label>
                                        <div class="input-group btn-group">
                                            <button
                                                class="btn-danger col-lg-4 form-control form-control-sm waves-effect waves-light"
                                                id="reset">
                                                <i class="mdi mdi-lock-reset"></i> Reset</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="">
                                    <!-- start accordion -->
                                    <div id="accordion">
                                        <div class="accordion-item m-3 ">

                                            <h4 class="accordion-header" id="headingOne">
                                                <a class="accordion-button fw-medium collapsed " type="button"
                                                    data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="bx bx-search-alt"></i> Advance Search
                                                </a>
                                                {{-- <a href="#collapseOne" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                                            Collapsible Group Item #2
                                                        </a> --}}
                                            </h4>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                                                {{-- <div id="collapseOne" class="accordion-collapse  collapse" aria-labelledby="headingOne" data-parent="#accordion" style=""> --}}
                                                <div class="accordion-body">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">LR
                                                                    No</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="child_transDocNo">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="child_transDocNo" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">LR
                                                                    Date</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select"
                                                                                id="child_transDocDate">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="child_transDocDate" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label
                                                                    class="form-label mb-0">From</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="fromPlace" onkeyup="filterdata()" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">To</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="toPlace" onkeyup="filterdata()" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label
                                                                    class="form-label mb-0">Consignor</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="fromTrdName">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="fromTrdName" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label
                                                                    class="form-label mb-0">Consignee</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="toTrdName">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="toTrdName" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">Vehicle
                                                                    Type</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="ewbVehicleType">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="ewbVehicleType" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">Driver
                                                                    No</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="driverNo">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="driverNo" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">Party
                                                                    No</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="partyNo">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="partyNo" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-2"><label class="form-label mb-0">Owner
                                                                    No</label>
                                                                <div class="input-group btn-group">
                                                                    <div class="dropdown btn-group">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="mdi mdi-filter-menu font-size-16"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu p-2"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <label class="form-label">Filter
                                                                                Method</label><select name="filter[]"
                                                                                class="form-select" id="ownerNo">
                                                                                <option value="1">Is equal to
                                                                                </option>
                                                                                <option value="2">Is not equal to
                                                                                </option>
                                                                                <option value="3">Starts with
                                                                                </option>
                                                                                <option value="4"
                                                                                    selected="selected">
                                                                                    Contains</option>
                                                                                <option value="5">Does not contain
                                                                                </option>
                                                                                <option value="6">Ends with
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><input type="text" name="search_input[]"
                                                                        value=""
                                                                        class="form-control form-control-sm"
                                                                        id="ownerNo" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end accordion -->
                                </div>
                                <!-- end col -->
                            </div>

                            <!-- Button trigger modal -->

                            <div class="modal fade exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tracking Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <span class='pull-right text-danger'></span>
                                        <form id='group-form'>
                                            <div class='table-responsive'>
                                                <table class='table table-hover mb-0'>
                                                    <thead>
                                                        <tr>
                                                            <th colspan='7'>Driver Details</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Mobile No</th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type='text' name='drivermobileno' required></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan='7'>Other Details</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Vehicle No</th>
                                                            <th>Eway Bill No</th>
                                                            <th>Eway Bill Date</th>
                                                            <th>From Place</th>
                                                            <th>To Place</th>
                                                            <th>LR No</th>
                                                            <th>LR Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="form-data">

                                                            {{-- data fetch from ajax --}}

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='submit' id='btngroupsubmit' class='btn btn-primary'>Save
                                                    Group</button>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                           <form id="tracking-form">
                                @csrf

                                <table id="records" class="table table-bordered yajra-datatable"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Vehicle NO</th>
                                            <th>From Place</th>>
                                            <th>Mobile No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </form>

                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" rel="stylesheet" type="text/javascript">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });


        function fetch(start_date, end_date, vehicleNo, ewbNo, fromPlace, toPlace) {
            // function fetch(pera){
            // fetch records

            //     mydata = pera;
            // mypera =  mydata;
            // var mypera = $(this).attr('data-code');
            // console.log(mypera);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('ewb.getGroupList') }}",
                type: "POST",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    vehicleNo: vehicleNo,
                    ewbNo: ewbNo,
                    fromPlace: fromPlace,
                    toPlace: toPlace,
                    // pera: JSON.stringify(mypera),
                    // pera: mypera,
                },

                dateType: "JSON",
                success: function(data) {
                    //datatable

                    $('#records').DataTable({
                        //it destroy old table and generate new table, helpfull in fast events like keyup
                        destroy: true,
                        "data": data.vem,
                        //responsive
                        "responsive": true,
                        "columns": [
                            {
                                "data": "vehicleno",
                            },
                            {
                                "data": "fromPlace",
                            },
                            {
                                "data": "mobile",
                            },
                            {
                                "data": "id",
                                render: function(data, type, row, meta) {
                                    $id = (row.id);
                                    $html ='<div class="text-center"><a href="{{url('EwayBills/Workspace/VehicleDetailView')}}/'+$id+'"  type="button" class="btn btn-success btn-sm waves-effect waves-light">View</a></div>';
                                    return $html;
                                }
                            },
                        ]
                    });
                }
            });
        }

        fetch();

        $(document).on("click", "#reset", function(e) {
            document.getElementById('start_date').value = "";
            document.getElementById('end_date').value = "";
            document.getElementById("vehicleNo").value = "";
            document.getElementById("end_date").value = "";
            document.getElementById("ewbNo").value = "";
            document.getElementById("fromPlace").value = "";
            document.getElementById("toPlace").value = "";
            filterdata();
        });

        function filterdata() {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var vehicleNo = $("#vehicleNo").val();
            var ewbNo = $("#ewbNo").val();
            var fromPlace = $("#fromPlace").val();
            var toPlace = $("#toPlace").val();

            fetch(start_date, end_date, vehicleNo, ewbNo, fromPlace, toPlace);
            // fetch(pera);
        }

    </script>

@endsection
