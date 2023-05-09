@extends('BackEnd.Layout.main')
@section('content')
    <!-- DataTables -->
    {{-- <link href="{{url('theme').'/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'}}" rel="stylesheet" type="text/css" />
        <link href="{{url('theme').'/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{url('theme').'/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'}}" rel="stylesheet" type="text/css" />

        <!-- Required datatable js -->
        <script src="{{url('theme').'/assets/libs/datatables.net/js/jquery.dataTables.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'}}"></script>

        <!-- Responsive examples -->
        <script src="{{url('theme').'/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'}}"></script>

        <!-- Datatable init js -->
        <script src="{{url('theme').'/assets/js/pages/datatables.init.js'}}"></script>
        <script src="{{url('theme').'/assets/js/app.js'}}"></script>

        <!-- Buttons examples -->
        <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/jszip/jszip.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/pdfmake/build/pdfmake.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/pdfmake/build/vfs_fonts.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/buttons.html5.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/buttons.print.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js'}}"></script>

        <!-- JAVASCRIPT -->
        <script src="{{url('theme').'/assets/libs/bootstrap/js/bootstrap.bundle.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/metismenu/metisMenu.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/simplebar/simplebar.min.js'}}"></script>
        <script src="{{url('theme').'/assets/libs/node-waves/waves.min.js'}}"></script> --}}




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script>



    {{-- <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">



                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-1">
                                            <label class="form-label mb-0">Select Date Range</label>
                                            <div class="input-daterange input-group" id="datepicker6"
                                                data-date-format="dd-mm-yyyy" data-date-autoclose="true"
                                                data-provide="datepicker" data-date-container='#datepicker6'>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="from_date" value="01-04-2023" placeholder="Start Date"
                                                        id="frmDate">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="to_date" value="03-05-2023" placeholder="End Date"
                                                        id="toDate">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 d-none">
                                        <div class="mb-1">
                                            <label class="form-label">Search</label>
                                            <div class="input-group">
                                                <input type="search" class="form-control main-search Focus" name="search"
                                                    value="" id="Search">
                                                <button type="submit" class="btn btn-primary btn-sm" id="SearchButton"><i
                                                        class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-1"><label class="form-label mb-0">Vehicle No</label>
                                            <div class="input-group btn-group">
                                                <div class="dropdown btn-group">
                                                    <button class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-filter-menu font-size-16"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                                        <label class="form-label">Filter Method</label><select
                                                            name="filter[]" class="form-select" id="child_vehicleNo">
                                                            <option value="1">Is equal to</option>
                                                            <option value="2">Is not equal to</option>
                                                            <option value="3">Starts with</option>
                                                            <option value="4" selected="selected">Contains</option>
                                                            <option value="5">Does not contain</option>
                                                            <option value="6">Ends with</option>
                                                        </select>
                                                    </div>
                                                </div><input type="text" name="search_input[]" value=""
                                                    class="form-control form-control-sm" id="child_vehicleNo" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-1"><label class="form-label mb-0">Ewb No</label>
                                            <div class="input-group btn-group">
                                                <div class="dropdown btn-group">
                                                    <button class="btn btn-secondary dropdown-toggle pt-0 pb-0"
                                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-filter-menu font-size-16"></i>
                                                    </button>
                                                    <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                                        <label class="form-label">Filter Method</label><select
                                                            name="filter[]" class="form-select" id="ewbNo">
                                                            <option value="1">Is equal to</option>
                                                            <option value="2">Is not equal to</option>
                                                            <option value="3">Starts with</option>
                                                            <option value="4" selected="selected">Contains</option>
                                                            <option value="5">Does not contain</option>
                                                            <option value="6">Ends with</option>
                                                        </select>
                                                    </div>
                                                </div><input type="text" name="search_input[]" value=""
                                                    class="form-control form-control-sm" id="ewbNo" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2 bg-info">
                                    <div class="mt-2 mb-2">
                                        <!-- start accordion -->
                                        <div id="accordion">
                                            <div class="card mb-1 shadow-none">
                                                <div class="card-header" id="headingOne">
                                                    <h6 class="m-0">
                                                        <a href="#collapseOne" class="text-dark collapsed"
                                                            data-toggle="collapse" aria-expanded="false"
                                                            aria-controls="collapseOne">
                                                            <i class="bx bx-search-alt"></i> Advance Search
                                                        </a>
                                                    </h6>
                                                </div>

                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                    data-parent="#accordion" style="">
                                                    <div class="card-body">
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
                                                                                    class="form-select"
                                                                                    id="child_transDocNo">
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
                                                                                    class="form-select" id="fromPlace">
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
                                                                            id="fromPlace" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-2"><label
                                                                        class="form-label mb-0">To</label>
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
                                                                                    class="form-select" id="toPlace">
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
                                                                            id="toPlace" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
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
                                                            <div class="col-lg-6">
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
                                                                                    class="form-select"
                                                                                    id="ewbVehicleType">
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

                                {{-- <div class="row">
                                    <div class="col-lg-11 mb-3">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button name="addtogrp" type="button"
                                                class="btn btn-primary btn-sm waves-effect waves-light" id="groupList"> <i
                                                    class="mdi mdi-12px mdi-account-group-outline"></i> Add To Tracking</button>
                                            <button name="unload" type="button"
                                                class="btn btn-warning btn-sm waves-effect waves-light" id="unloadList"> <i
                                                    class="mdi mdi-12px mdi-delete-alert-outline"></i> Unload</button>
                                            <button name="refresh" type="button"
                                                class="btn btn-primary btn-sm waves-effect waves-light" id="Refresh"> <i
                                                    class="mdi mdi-12px mdi-refresh"></i> Refresh</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 mb-3 text-end">
                                        <button name="reset" type="button" class="btn btn-danger btn-sm waves-effect waves-light"
                                            id="Reset"> <i class="mdi mdi-lock-reset"></i> Reset</button>
                                    </div>
                                </div> --}}
                                <div class="card-body">

                                    <h4 class="card-title">Eway Bills and Vehicle Details</h4>
                                    <p class="card-title-desc">The Buttons extension for DataTables
                                        provides a common set of options, API methods and styling to display
                                        buttons on a page that will interact with a DataTable. The core library
                                        provides the based framework upon which plug-ins can built.
                                    </p>

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
                                                <div class="table-responsive" id="form-data">
                                                    {{-- data receive from ajax --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="mitesh">mitesh</div>
                                    <form id="tracking-form">
                                        {{-- <form id="my-form1" method="post" action="{{route('ewb.AddtoTracking')}}" > --}}
                                        @csrf
                                        <button type="submit" id="btntracksubmit"
                                            class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal"
                                            data-target=".exampleModal">
                                            <i class="mdi mdi-12px mdi-account-group-outline"></i> Add To Tracking
                                        </button>
                                        <table class="table table-bordered yajra-datatable"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Vehicle NO</th>
                                                    <th>Eway Bill No</th>
                                                    <th>Eway Bill Date</th>
                                                    <th>From Place</th>
                                                    <th>To Place</th>

                                                    {{-- <th>From Trader</th>
                                                    <th>To Trader</th> --}}
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                                  @foreach ($vem as $field)
                                                    <tr>
                                                        <td><input type="checkbox" id="customCheck1" name="vemid[]"
                                                                value={{ $field->id }}></td>
                                                        <td>{{ $field->vehicleno }}</td>
                                                        <td>{{ $field->ewaybills->ewbNo }}</td>
                                                        <td>{{ $field->ewaybills->ewayBillDate }}</td>
                                                        <td>{{ $field->ewaybills->fromPlace }}</td>
                                                        <td>{{ $field->ewaybills->toPlace }}</td>
                                                        {{-- <td>{{$field->ewaybills->fromTrdName}}</td>
                                                        <td>{{$field->ewaybills->toTrdName}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody> --}}
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function() {
            var table = $('.yajra-datatable').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ route('ewb.getEwayBillList') }}",
                columns: [{
                        // data: 'action',
                        // name: 'action',
                        // orderable: true,
                        // searchable: true
                        data: 'vehicleno',
                        name: 'vehicleno'
                    },
                    {
                        data: 'vehicleno',
                        name: 'vehicleno'
                    },
                    {
                        data: 'ewaybills.ewbNo',
                        name: 'ewaybills.ewbNo'
                    },
                    {
                        data: 'ewaybills.ewayBillDate',
                        name: 'ewaybills.ewayBillDate'
                    },
                    {
                        data: 'ewaybills.fromPlace',
                        name: 'ewaybills.fromPlace'
                    },
                    {
                        data: 'ewaybills.toPlace',
                        name: 'ewaybills.toPlace'
                    },

                ]
            });
        });
    </script>
<script>
// $("#toDate").change(function(event) {
//     event.preventDefault();
//             var start_date = $('#frmDate').val();
//             var end_date = $('#toDate').val();
//             $.ajaxSetup({
//             headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//          });
//                 $.ajax({
//                     type: "post",
//                     url: "{{ route('ewb.getEwayBillList') }}",

//                     data: {

//                         start_date: start_date,
//                         end_date: end_date,

//                     },

//                     processData: true,
//                     success: function(result) {
//                         alert('hi');
//                         $("#mitesh").html(result.html);
//                     },
//                     error: function(e) {
//                         console.log(e.responseText);
//                     }
//                 });
// });

</script>
    {{-- <script>
        $("#toDate").change(function() {
            var start_date = $('#frmDate').val();
            var end_date = $('#toDate').val();
            // console.log(start_date, end_date);
            $('.yajra-datatable').DataTable().destroy();
            $(function() {
                var table = $('.yajra-datatable').DataTable({

                    processing: true,
                    serverSide: true,
                    data: {
                        "start_date": start_date,
                        "end_date": end_date
                    },
                    ajax: "{{ route('ewb.getEwayBillList') }}",
                    columns: [{
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'vehicleno',
                            name: 'vehicleno'
                        },
                        {
                            data: 'ewaybills.ewbNo',
                            name: 'ewaybills.ewbNo'
                        },
                        {
                            data: 'ewaybills.ewayBillDate',
                            name: 'ewaybills.ewayBillDate'
                        },
                        {
                            data: 'ewaybills.fromPlace',
                            name: 'ewaybills.fromPlace'
                        },
                        {
                            data: 'ewaybills.toPlace',
                            name: 'ewaybills.toPlace'
                        },

                    ]
                });
            });
        });
    </script> --}}


    <script>
        $(document).ready(function() {
            $('#tracking-form').submit(function(event) {
                // for stop refreshing page
                event.preventDefault();
                var form = $("#tracking-form")[0];
                var data = new FormData(form);
                // alert(data);
                // for disable submit button
                $("#btntracksubmit").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('ewb.AddtoTracking') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        // alert('hi');
                        $("#form-data").html(result.html);
                        $("#btntracksubmit").prop("disabled", false);
                    },
                    error: function(e) {
                        console.log(e.responseText);
                        $("#btntracksubmit").prop("disabled", false);
                    }
                });
            });
        });


        $('#group-form').submit(function(event) {
            $(document).on('submit', "#group-form", function() {
                $("body").on("click", "#btngroupsubmit", function(event) {
                    // for stop refreshing page
                    event.preventDefault();
                    var form = $("#group-form")[0];
                    var data = new FormData(form);
                    data.append('_token', '{{ csrf_token() }}');
                    // alert(data);
                    // for disable submit button
                    $("#btngroupsubmit").prop("disabled", true);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('ewb.AddtoGroup') }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(result) {

                            // alert('hi');
                            // $("#form-data").html(result.html);
                            $("#btngroupsubmit").prop("disabled", false);
                            //window.location.href = "{{ route('ewb') }}";
                            location.reload();
                        },
                        error: function(e) {
                            console.log(e.responseText);
                            $("#btngroupsubmit").prop("disabled", false);
                        }
                    });
                });
            });
        });
    </script>
@endsection
