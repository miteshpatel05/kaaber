@extends('BackEnd.Layout.main')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="card-body">



                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#General" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-align-justify"></i></span>
                                <span class="d-none d-sm-block">General</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Company" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-building"></i></span>
                                <span class="d-none d-sm-block">Company</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ewaybill" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-money-bill-alt"></i></span>
                                <span class="d-none d-sm-block">Eway Bill</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sms" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-sms"></i></span>
                                <span class="d-none d-sm-block">SMS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#smtp" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-server"></i></span>
                                <span class="d-none d-sm-block">SMTP</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#imap" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Imap</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">

                        {{-- General Tab --}}
                        <div class="tab-pane active" id="General" role="tabpanel">
                            <p class="mb-0">

                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane active" id="seller-details">
                                    <form action="{{route('settings.store')}}" method="post">
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-firstname-input">Rows Per Page</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-firstname-input" value="{{$AllSettings['rows_per_page']}}" name="rows_per_page">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-lastname-input">Printer Name</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-lastname-input" value="{{$AllSettings['printer_name']}}" name="printer_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-phoneno-input">Service Tax</label>
                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['service_tax']}}" name="service_tax">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-text-input">Hedu Cess</label>
                                                    <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['hedu_cess']}}" name="hedu_cess">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-firstname-input">Edu Cess</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-firstname-input" value="{{$AllSettings['edu_cess']}}" name="edu_cess">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-lastname-input">Default Cc</label>
                                                    <input type="email" class="form-control"
                                                        id="basicpill-lastname-input" value="{{$AllSettings['default_cc']}}" name="default_cc">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-phoneno-input">Default Company</label>
                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['default_company']}}" name="default_company">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-text-input">Icegate Fetch Frequency Min</label>
                                                    <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['icegate_fetch_frequency_min']}}" name="icegate_fetch_frequency_min">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-firstname-input">Stamp Duty</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-firstname-input" value="{{$AllSettings['stamp_duty']}}" name="stamp_duty">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-lastname-input">Theme</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-lastname-input" value="{{$AllSettings['theme']}}" name="theme">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-phoneno-input">Tally Server</label>
                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['tally_server']}}" name="tally_server">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-text-input">Abatment</label>
                                                    <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['abatment']}}" name="abatment">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-firstname-input">Chat Window</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-firstname-input" value="{{$AllSettings['chat_window']}}" name="chat_window">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-lastname-input">Tds</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-lastname-input" value="{{$AllSettings['tds']}}" name="tds">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-phoneno-input">Tds Surcharge</label>
                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['tds_surcharge']}}" name="tds_surcharge">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-text-input">Tds Edu Cess</label>
                                                    <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['tds_edu_cess']}}" name="tds_edu_cess">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-lastname-input">Tds Hedu Cess</label>
                                                    <input type="text" class="form-control"
                                                        id="basicpill-lastname-input" value="{{$AllSettings['tds_hedu_cess']}}" name="tds_hedu_cess">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-phoneno-input">User Eway Party</label>
                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['user_eway_party']}}" name="user_eway_party">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="basicpill-text-input">User Eway From Place</label>
                                                    <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['user_eway_from_place']}}" name="user_eway_from_place">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                    Update
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            </p>
                        </div>
                        {{-- Company Tab --}}
                        <div class="tab-pane" id="Company" role="tabpanel">
                            <p class="mb-0">

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active" id="seller-details">
                                        <form action="{{route('settings.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="basicpill-firstname-input">Name</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input" value="{{$AllSettings['company_name']}}" name="company_name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Address</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['company_address']}}" name="company_address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Contact</label>
                                                        <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['company_contact']}}" name="company_contact">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Email</label>
                                                        <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['company_email']}}" name="company_email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="basicpill-firstname-input">Website</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input" value="{{$AllSettings['company_website']}}" name="company_website">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </p>
                        </div>
                        {{-- Eway Bill Tab --}}
                        <div class="tab-pane" id="ewaybill" role="tabpanel">
                            <p class="mb-0">

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active" id="seller-details">
                                        <form action="{{route('settings.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-firstname-input">Eway Test Auth Url</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input" value="{{$AllSettings['eway_test_auth_url']}}" name="eway_test_auth_url">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Eway Test Ewaybill Url</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['eway_test_ewaybill_url']}}" name="eway_test_ewaybill_url">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Eway Test Asp Id</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['eway_test_asp_id']}}" name="eway_test_asp_id">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Eway Test Password</label>
                                                        <input type="password" class="form-control" id="basicpill-text-input" value="{{$AllSettings['eway_test_password']}}" name="eway_test_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-firstname-input">Eway Test Gstin</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input" value="{{$AllSettings['eway_test_gstin']}}" name="eway_test_gstin">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Eway Test Username</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['eway_test_username']}}" name="eway_test_username">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Eway Test Ewbpwd</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['eway_test_ewbpwd']}}" name="eway_test_ewbpwd">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Eway Test Active</label>
                                                        <select class="form-control"  name="eway_test_active">
                                                            <option value="Yes" {{ ( $AllSettings['eway_test_active'] == 'Yes') ? 'selected' : '' }}>Yes</option>
                                                            <option value="No" {{ ( $AllSettings['eway_test_active'] == 'No') ? 'selected' : '' }}>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-firstname-input">Eway Auth Url</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input" value="{{$AllSettings['eway_auth_url']}}" name="eway_auth_url">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Eway Ewaybill Url</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['eway_ewaybill_url']}}" name="eway_ewaybill_url">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Eway Asp Id</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['eway_asp_id']}}" name="eway_asp_id">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Eway Password</label>
                                                        <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['eway_password']}}" name="eway_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-firstname-input">Eway Gstin</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input" value="{{$AllSettings['eway_gstin']}}" name="eway_gstin">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Eway Username</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['eway_username']}}" name="eway_username">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Eway Ewbpwd</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['eway_ewbpwd']}}" name="eway_ewbpwd">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Eway Active</label>
                                                        <select class="form-control"  name="eway_active">
                                                            <option value="Yes" {{ ( $AllSettings['eway_active'] == 'Yes') ? 'selected' : '' }}>Yes</option>
                                                            <option value="No" {{ ( $AllSettings['eway_active'] == 'No') ? 'selected' : '' }}>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Eway Default To</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['eway_default_to']}}" name="eway_default_to">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Eway Default Cc</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['eway_default_cc']}}" name="eway_default_cc">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Eway Default Bcc</label>
                                                        <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['eway_default_bcc']}}" name="eway_default_bcc">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Eway Default Source</label>
                                                        <select class="form-control"  name="eway_default_source">
                                                            <option value="TEST" {{ ( $AllSettings['eway_default_source'] == 'TEST') ? 'selected' : '' }}>Test Server</option>
                                                            <option value="LIVE" {{ ( $AllSettings['eway_default_source'] == 'LIVE') ? 'selected' : '' }}>Live Server</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </p>
                        </div>
                        {{-- SMS ----- Tab --}}
                        <div class="tab-pane" id="sms" role="tabpanel">
                            <p class="mb-0">


                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active" id="seller-details">
                                        <form action="{{route('settings.store')}}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Sms Api Url</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['sms_api_url']}}" name="sms_api_url">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Sms Api Username</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['sms_api_username']}}" name="sms_api_username">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Sms Api Password</label>
                                                        <input type="password" class="form-control" id="basicpill-text-input" value="{{$AllSettings['sms_api_password']}}" name="sms_api_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Sms Api Senderid</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['sms_api_senderid']}}" name="sms_api_senderid">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">Sms Api Route</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['sms_api_route']}}" name="sms_api_route">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Sms Api Otp Temp</label>
                                                        <input type="text" class="form-control" id="basicpill-text-input" value="{{$AllSettings['sms_api_otp_temp']}}" name="sms_api_otp_temp">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Sms Api Active</label>
                                                        <select class="form-control" name="sms_api_active">
                                                            <option value="Yes" {{ ( $AllSettings['sms_api_active'] == 'Yes') ? 'selected' : '' }}>Yes</option>
                                                            <option value="No" {{ ( $AllSettings['sms_api_active'] == 'No') ? 'selected' : '' }}>No</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </p>
                        </div>
                        {{-- SMTP ----- Tab --}}
                        <div class="tab-pane" id="smtp" role="tabpanel">
                            <p class="mb-0">


                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active" id="seller-details">
                                        <form  action="{{route('settings.store')}}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Host</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['smtp_host']}}" name="smtp_host">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">User</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['smtp_user']}}" name="smtp_user">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Password</label>
                                                        <input type="password" class="form-control" id="basicpill-text-input" value="{{$AllSettings['smtp_password']}}"  name="smtp_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Port</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input"  value="{{$AllSettings['smtp_port']}}" name="smtp_port">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </p>
                        </div>
                        {{-- IMAP ----- Tab --}}
                        <div class="tab-pane" id="imap" role="tabpanel">
                            <p class="mb-0">


                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active" id="seller-details">
                                        <form action="{{route('settings.store')}}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Host</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['imap_host']}}" name="imap_host">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-phoneno-input">User</label>
                                                        <input type="text" class="form-control" id="basicpill-phoneno-input" value="{{$AllSettings['imap_user']}}" name="imap_user">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-text-input">Password</label>
                                                        <input type="password" class="form-control" id="basicpill-text-input" value="{{$AllSettings['imap_password']}}" name="imap_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-lastname-input">Port</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input" value="{{$AllSettings['imap_port']}}" name="imap_port">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
