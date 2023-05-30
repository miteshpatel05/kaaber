@extends('BackEnd.Layout.main')
@section('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://iir2.kaabarerp.com/public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Responsive Table js -->
    <script src="{{ url('theme') . '/assets/libs/admin-resources/rwd-table/rwd-table.min.js' }}"></script>


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ewb') }}">Eway Bill List</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ewb.Workspace') }}">Group Eway Bill</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicle Detail</li>
                            </ol>
                        </nav>
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Group Vehicle Summary</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12 col-xl-12">

                        <!-- Simple card -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mt-0 text-primary">Vehicle Detail</h4>
                                <div class="col-lg-12">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="font-size-15"><b>Vehicle No : </b><span class="p-1">{{$vehicle->vehicleno}}</span></td>
                                                <td colspan="2" class="font-size-15"><b>From Place : </b><span class="p-1">{{$vehicle->fromPlace}}</span></td>
                                                <td colspan="2" class="font-size-15"><b>Driver Mobile No : </b><span class="p-1"><label id="drivermobilenumber">{{$vehicle->mobile}}</label></span></td>
                                                <td colspan="2" class="font-size-15"><b>User GSTIN : </b><span class="p-1">{{$vehicle->userGSTINTransin}}</span></td>

                                            </tr>
                                            <tr>
                                                <td colspan="2" class="font-size-15"><b>Enter Date : </b><span class="p-1">{{$vehicle->enteredDate}}</span></td>
                                                <td colspan="2" class="font-size-15"><b>Mode : </b><span class="p-1">{{$vehicle->updMode}}</span></td>
                                                <td colspan="2" class="font-size-15"><b>Last Tracking Date : </b><span class="p-1">
                                                    @if($tracking)
                                                        {{$tracking->trackingdate}}
                                                    @else
                                                        ---
                                                    @endif
                                            </span></td>
                                                <td colspan="2" class="font-size-15"><b>Last Location : </b><span class="p-1">
                                                    @if($tracking)
                                                        {{$tracking->location}}
                                                    @else
                                                            ---
                                                    @endif
                                                </span></td>
                                            </tr>
                                            <tr>

                                                <td colspan="2" class="font-size-15"><b>Last Pincode : </b><span class="p-1">
                                                    @if($tracking)
                                                    {{$tracking->pincode}}
                                                    @else
                                                            ---
                                                    @endif
                                                </span></td>
                                                <td colspan="2" class="font-size-15"><b>Status : </b><span class="p-1">
                                                    @if($tracking)
                                                        {{$tracking->status}}
                                                    @else
                                                        ---
                                                    @endif
                                                </span></td>
                                                <td colspan="2" class="font-size-15"><b>Remark : </b><span class="p-1">
                                                    @if($tracking)
                                                        {{$tracking->remark}}
                                                    @else
                                                        ---
                                                    @endif
                                                </span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-info w-sm waves-effect waves-light"  data-toggle="modal" data-target=".trackingModal" id="btnTracking" onclick="getTrackingHistory({{$vehicle->id}})">Tracking</button>
                                    <button type="button" class="btn btn-danger w-sm waves-effect waves-light" id="btnungroupVehicle" onclick="ungroupVehicle({{$vehicle->id}})">unGroup</button>

                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->

                    <div class="col-md-12 col-xl-12">

                        <div class="card">

                            <div class="card-body">
                                <h2 class="card-title mt-0 text-primary">Vehicle Eway Bill List</h2>
                                <div class="row mt-2">

                                    <div class="col-lg-3">
                                        <div class="mb-1">
                                            <label class="form-label mb-0">Select Date Range</label>
                                            <div class="input-daterange input-group" id="datepicker6"
                                                data-date-format="dd-mm-yyyy" data-date-autoclose="true"
                                                data-provide="datepicker" data-date-container='#datepicker6'>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="from_date" placeholder="Start Date" id="start_date"
                                                        onchange="filterdata()">
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
                                        <div class="mb-1"><label class="form-label mb-0">Ewb No</label>
                                            <div class="input-group btn-group">
                                                <div class="dropdown btn-group">
                                                    <button class="btn btn-secondary dropdown-toggle pt-0 pb-0" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
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

                                                <h5 class="accordion-header text-success" id="headingOne">
                                                    <a class="accordion-button fw-medium collapsed " type="button"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="bx bx-search-alt "></i> Advance Search
                                                    </a>
                                                    {{-- <a href="#collapseOne" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                                                Collapsible Group Item #2
                                                            </a> --}}
                                                </h5>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                                                    {{-- <div id="collapseOne" class="accordion-collapse  collapse" aria-labelledby="headingOne" data-parent="#accordion" style=""> --}}
                                                    <div class="accordion-body">
                                                        <div class="row mb-2">

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



                                <form>
                                    @csrf

                                    <table id="records" class="table table-bordered yajra-datatable"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Eway Bill No</th>
                                                <th>Eway Bill Date</th>
                                                <th>From Place</th>
                                                <th>To Place</th>
                                                <th>Consgnee</th>
                                                <th>Consgnor</th>
                                                <th>Lr No</th>
                                                <th>Lr Date</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </form>
                            </div>

                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>

    {{-- for updateLR form popup --}}

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
                <form id='update-form'>
                    <div class='table-responsive'>
                        <table class='table table-hover mb-0'>
                            <label style="color:red" id="lrerror"></label>
                            <thead>
                                <tr>
                                    <th colspan='7'>Driver Details</th>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                </tr>
                                <tr>
                                    <td><input type='text' name='drivermobileno' id='drivermobileno' required></td>
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
                        <button type='submit' id='btngroupsubmit' class='btn btn-primary'>Update</button>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- for tracking form popup --}}
<div class="modal fade trackingModal" tabindex="-1" role="dialog"
aria-labelledby="trackingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="trackingModalLabel">Tracking Details</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class='pull-right text-danger'></span>
                <form id='tracking-form'>
                    <div class='table-responsive'>
                        <table class='table table-hover mb-0'>
                            <label style="color:red" id="tracking_error"></label>
                                <tr>
                                    <td>Pin Code :</td>
                                    <td><input type='text' id="pincode" name='pincode' required>
                                        <input type='hidden' name='vid' value="{{$vehicle->id}}">
                                        <input type='hidden' id='tid' name='tid' value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Location :</td>
                                    <td><input type='text' id="location" name='location' required></td>
                                </tr>
                                <tr>
                                    <td>Vehicle Reach or Not :</td>
                                    <td>
                                        <div class="square-switch"><input type="checkbox" id="isChecked" onclick="selectstatus()" name="isReach" switch="bool"><label for="isChecked" data-on-label="Yes" data-off-label="No"></label></div>

                                    </td>
                                    <td class="d-none" id="trackingstatus">
                                        Select Status :
                                            <select class="form-control" id="vehicleStatus" name="vehicleStatus" id="vehicleStatus">
                                                <option value="1">InTransit</option>
                                                <option value="2">Reach at Party</option>
                                                <option value="3">Reach at Depot</option>
                                                <option value="4">Unloading Point 1</option>
                                                <option value="5">Unloading Point 2</option>
                                                <option value="6">Unloading Point 3</option>
                                                <option value="7">Unloading Point 4</option>
                                                <option value="8">Unloading Point 5</option>
                                                <option value="9">Unloading Point 6</option>
                                                <option value="10">Vehicle Unload</option>
                                            </select>
                                        </td>
                                </tr>
                                <tr>
                                    <td>Tracking Date :</td>
                                    <td><input type='date' id="trackingdate" name='trackingdate' required></td>
                                </tr>
                                <tr>
                                    <td>Remark :</td>
                                    <td><textarea id="remark" name='remark'></textarea></td>
                                </tr>

                        </table>
                        <div class='modal-footer'>
                            <button type='submit' id='btntrackingsubmit' class='btn btn-primary'>Save
                                Tracking</button>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                        </div>
                    </div>
                </form>
                <table class='table table-hover mb-0'>
                    <tr >
                        <th>#</th>
                        <th>Pincode</th>
                        <th>Location</th>
                        <th>Update Date</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                    <tbody id="tracking-history">
                        {{-- get data from ajex --}}
                    </tbody>
                </table>
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

        function fetch(start_date, end_date, ewbNo, fromPlace, toPlace) {
            // function fetch(pera){
            // fetch records

            //     mydata = pera;
            // mypera =  mydata;
            // var mypera = $(this).attr('data-code');
            // console.log(mypera);

            var vehicleid = "<?php echo $vehicle->id; ?>";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('work.getVehicleDetailList') }}",
                type: "POST",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    ewbNo: ewbNo,
                    fromPlace: fromPlace,
                    toPlace: toPlace,
                    vehicleid: vehicleid,
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
                        "columns": [{
                                "data": "ewaybills.ewbNo",
                            },
                            {
                                "data": "ewaybills.ewayBillDate",
                            },
                            {
                                "data": "ewaybills.fromPlace",
                            },
                            {
                                "data": "ewaybills.toPlace",
                            },
                            {
                                "data": "ewaybills.fromTrdName",
                            },
                            {
                                "data": "ewaybills.toTrdName",
                            },
                            {
                                "data": "lrno",
                            },
                            {
                                "data": "lrdate",
                            },
                            {
                                "data": "id",
                                render: function(data, type, row, meta) {
                                    $id = (row.id);
                                    $html ='<div id="btnupdatesubmit" class="text-center"><button onclick="updatelr('+$id+')"  type="button" class="btn btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">Edit</a><button type="button" onclick="extendewb('+$id+')" class="btn m-1 btn-warning btn-sm waves-effect waves-light" id="btnextendewb">Extend</button></div>';
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

            document.getElementById("end_date").value = "";
            document.getElementById("ewbNo").value = "";
            document.getElementById("fromPlace").value = "";
            document.getElementById("toPlace").value = "";
            filterdata();
        });

        function filterdata() {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            var ewbNo = $("#ewbNo").val();
            var fromPlace = $("#fromPlace").val();
            var toPlace = $("#toPlace").val();
            fetch(start_date, end_date, ewbNo, fromPlace, toPlace);
            // fetch(pera);
        }

        function updatelr(id){
            event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{ route('work.UpadateLR') }}",
                    data: {
                        id: id,
                    },
                    processData: true,
                    dateType: "JSON",
                    success: function(result) {
                        if (result.message == "Fail") {

                            $('#btnupdatesubmit').removeAttr('data-toggle');
                            event.preventDefault();

                        } else {
                            // alert('hi');
                            $('#btnupdatesubmit').attr("data-toggle", "modal");
                            $("#form-data").html(result.html);
                            $("#drivermobileno").val(result.mobileno);
                            $("#btnupdatesubmit").prop("disabled", false);
                        }

                    },
                    error: function(e) {
                        console.log(e.responseText);
                        $("#btnupdatesubmit").prop("disabled", false);
                    }
                });
        }

        // save lr
        $(document).ready(function() {
            $('#update-form').submit(function(event) {

                // for stop refreshing page
                event.preventDefault();
                var form = document.querySelector('#update-form');
                var data = new FormData(form);
                const values = [...data.entries()];

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                // for disable submit button
                $("#btngroupsubmit").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('work.SaveLR') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success: function(result) {

                        $("#btngroupsubmit").prop("disabled", false);
                        $("#drivermobilenumber").text(result.mobileno);
                        filterdata();
                        $(".modal .close").click()

                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText );
                        $("#lrerror").text(err.message);
                        console.log(xhr.responseText);
                        $("#btngroupsubmit").prop("disabled", false);
                    }
                });
            });
        });

        // save tracking
        $(document).ready(function() {
            $('#tracking-form').submit(function(event) {

                // for stop refreshing page
                event.preventDefault();
                var form = document.querySelector('#tracking-form');
                var data = new FormData(form);
                const values = [...data.entries()];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                // for disable submit button
                $("#btntrackingsubmit").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('work.SaveTracking') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    dateType: "JSON",
                    success: function(result) {
                        swal({
                                    title: "Tracking",
                                    text: "Tracking History Saved!",
                                    icon: "success",
                                    button: "OK",
                                });
                        getTrackingHistory(result.vid);
                        $("#btntrackingsubmit").prop("disabled", false);
                        $("#btnEdit").prop("disabled", false);
                        // $(".modal .close").click()

                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText );
                        $("#tracking_error").text(err.message);
                        console.log(xhr.responseText);
                        $("#btntrackingsubmit").prop("disabled", false);
                    }
                });
            });
        });

        function selectstatus(){
            var checkedValue = $('#isChecked:checked').val();
            var element = document.getElementById("trackingstatus");
            if(checkedValue){
                element.classList.remove("d-none");
                element.classList.add("d-block");
            }
            else{
                element.classList.remove("d-block");
                element.classList.add("d-none");
            }

        }

        function getTrackingHistory(vid){

            $("#tid").val("");
            $("#pincode").val("");
            $("#location").val("");
            var date = "dd" + '-' + "mm" + '-' + "yyyy";
            $("#trackingdate").val(date);
            $("#remark").val("");
            $("#error").text("");

            $('#isChecked').prop('checked', false);
            var element = document.getElementById("trackingstatus");
            element.classList.remove("d-block");
            element.classList.add("d-none");
            $("#vehicleStatus").val(0);

            event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{ route('work.getTrackingHistory') }}",
                    data: {
                        vid: vid,
                    },
                    processData: true,
                    dateType: "JSON",
                    success: function(result) {
                        if (result.message == "Fail") {

                            $('#btnTracking').removeAttr('data-toggle');
                            event.preventDefault();

                        } else {

                            // $('#btnTracking').attr("data-toggle", "modal");
                            $("#tracking-history").html(result.html);
                            $("#btnTracking").prop("disabled", false);
                        }

                    },
                    error: function(e) {
                        console.log(e.responseText);
                        $("#btnTracking").prop("disabled", false);
                    }
                });
        }

        function EditTracking(){
            $("#tid").val($("#edit_tid").text());
            $("#pincode").val($("#edit_pincode").text());
            $("#location").val($("#edit_location").text());
            var edit_date = $("#edit_trackingdate").text().split("-")
            var date = edit_date[0] + '-' + edit_date[1] + '-' + edit_date[2];
            $("#trackingdate").val(date);
            $("#remark").val($("#edit_remark").text());


            if($("#edit_status").text()>0){
                $('#isChecked').prop('checked', true);
                var status = $("#edit_status").text();
                var element = document.getElementById("trackingstatus");
                element.classList.remove("d-none");
                element.classList.add("d-block");
                $("#vehicleStatus").val(parseInt(status));
            }
            $("#btnEdit").prop("disabled", true);
        }

        function DeleteTracking(tid){

            swal({
                title: "Are you sure?",
                text: "Once deleted, you can't get back!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    event.preventDefault();
                    $("#btnDelete").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('work.DeleteTracking') }}",
                        data: {
                            tid: tid,
                        },
                        processData: true,
                        dateType: "JSON",
                        success: function(result) {
                            swal({
                                    title: "Tracking",
                                    text: "Tracking History Deleted!",
                                    icon: "success",
                                    button: "OK",
                                });
                            getTrackingHistory(result.vid);
                            $("#btnDelete").prop("disabled", false);

                        },
                        error: function(e) {
                            console.log(e.responseText);
                            $("#btnDelete").prop("disabled", false);
                        }

                    });

                } else {
                    // swal("Your imaginary file is safe!");
                }
                });




        }

        function ungroupVehicle(vid){

            swal({
                title: "Are you sure?",
                text: "Once deleted, all LR detail deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    event.preventDefault();
                $("#btnungroupVehicle").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('work.UngroupVehicle') }}",
                    data: {
                        vid: vid,
                    },
                    processData: true,
                    dateType: "JSON",
                    success: function(result) {
                        if(result.message!=""){
                                swal({
                                    title: "Ungroup Vehicle",
                                    text: result.message,
                                    icon: "error",
                                    button: "OK",
                                });
                        }
                        else{
                            swal({
                                    title: "Ungroup Vehicle",
                                    text: "Successfully Vehicle Ungroup!",
                                    icon: "success",
                                    button: "OK",
                                });

                            window.location.href = "{{ route('ewb.Workspace')}}";
                        }
                        $("#btnungroupVehicle").prop("disabled", false);
                    },
                    error: function(e) {
                        console.log(e.responseText);
                        $("#btnungroupVehicle").prop("disabled", false);
                    }
                });

                } else {
                    // swal("Your imaginary file is safe!");
                }
                });


        }

        function extendewb(eid){
            swal({
                title: "Are you sure?",
                text: "Give proposal to Govt. for enxtending E-way Bill.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    event.preventDefault();
                    $("#btnextendewb").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('work.ExtendEWB') }}",
                        data: {
                            eid: eid,
                        },
                        processData: true,
                        dateType: "JSON",
                        success: function(result) {
                            if(result.message!=null){
                                    swal({
                                        title: "Extend E-way Bill",
                                        text: result.message,
                                        icon: "error",
                                        button: "OK",
                                    });

                            }
                            else{
                                swal({
                                        title: "Extend E-way Bill",
                                        text: "Request Send Successfully",
                                        icon: "success",
                                        button: "OK",
                                    });

                                // window.location.href = "{{ route('ewb.Workspace')}}";
                            }
                            $("#btnextendewb").prop("disabled", false);
                        },
                        error: function(e) {
                            console.log(e.responseText);
                            $("#btnextendewb").prop("disabled", false);
                        }
                });

                } else {
                    // swal("Your imaginary file is safe!");
                }
                });
        }
    </script>
@endsection
