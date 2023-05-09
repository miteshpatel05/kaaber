@extends('BackEnd.Layout.main')
@section('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script>
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
                                                        id="start_date">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="to_date" value="03-05-2023" placeholder="End Date"
                                                        id="end_date">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                                <button class="btn btn-primary btn-sm waves-effect waves-light" id="filter">
                                                Filter</button>
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

                                    <form id="tracking-form">
                                        {{-- <form id="my-form1" method="post" action="{{route('ewb.AddtoTracking')}}" > --}}
                                        @csrf
                                        <button type="submit" id="btntracksubmit"
                                            class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal"
                                            data-target=".exampleModal">
                                            <i class="mdi mdi-12px mdi-account-group-outline"></i> Add To Tracking
                                        </button>
                                        <table id="records" class="table table-bordered yajra-datatable"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            {{-- data receive from ajax --}}
                                            <thead>
                                            <tr>
                                            <th>sno</th>
                                            <th>s name</th>
                                            </tr>
                                            </thead>
                                            <tr><td>1</td><td>mitesh</td></tr>
                                            <tr><td>2</td><td>hardik</td></tr>
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
    <link href="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" rel="stylesheet" type="text/javascript">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () {
        $('#records').DataTable();

    } );

    $(document).ready(function() {

        // for stop refreshing page
        var data = "";
        $.ajax({
            type: "get",
            url: "{{ route('ewb.AllVehicleEwaybillMasterData') }}",
            data: data,
            processData: true,
            contentType: false,
            success: function(result) {
                $("#records").html(result.html);
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    });

    $(function(){
        $("#start_date").datepicker({
            "dateFormat" : "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat" : "yy-mm-dd"
        });
    });
    function fetch(start_date,end_date){

        $(document).ready(function() {

            // for stop refreshing page
            var data = "";
            $.ajax({
                type: "get",
                url: "{{ route('ewb.AllVehicleEwaybillMasterData') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(result) {
                    $("#records").html(result.html);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        });
    }


    //filter
    $(document).on("click","#filter",function(e){
        e.preventDefault();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        if(start_date == "" || end_date == ""){
            alert('Both date required');
        }
        else{
            $('#records').DataTable().destroy();
            fetch(start_date,end_date);
        }
    });
</script>
@endsection
