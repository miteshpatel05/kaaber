@extends('BackEnd.Layout.main')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="card-body">



                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#general" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-align-justify"></i></span>
                                <span class="d-none d-sm-block">General</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#company" role="tab">
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


                        {{-- GENERAL ----- Tab --}}
                        <div class="tab-pane" id="general" role="tabpanel">
                            <p class="mb-0">

                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane active" id="seller-details">
                                    <form action="{{ route('settings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            @foreach ($SettingsData as $key => $value)
                                                @if (substr($value->name, 0, 7) <> 'company' &&
                                                        substr($value->name, 0, 4) <> 'eway' &&
                                                        substr($value->name, 0, 3) <> 'sms' &&
                                                        substr($value->name, 0, 4) <> 'smtp' &&
                                                        substr($value->name, 0, 4) <> 'imap'
                                                )
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="basicpill-lastname-input">{{ strtoupper(preg_replace('/_/i', ' ', $value->name)) }}</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input" value="{{ $value->value }}"
                                                                name="settings[{{ $value->id }}]">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
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

                        {{-- COMPANY ----- Tab --}}
                        <div class="tab-pane" id="company" role="tabpanel">
                            <p class="mb-0">

                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane active" id="seller-details">
                                    <form action="{{ route('settings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            @foreach ($SettingsData as $key => $value)
                                                @if (substr($value->name, 0, 7) == 'company')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="basicpill-lastname-input">{{ strtoupper(preg_replace('/_/i', ' ', $value->name)) }}</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input" value="{{ $value->value }}"
                                                                name="settings[{{ $value->id }}]">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
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

                        {{-- EWAY BILL ----- Tab --}}
                        <div class="tab-pane" id="ewaybill" role="tabpanel">
                            <p class="mb-0">

                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane active" id="seller-details">
                                    <form action="{{ route('settings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            @foreach ($SettingsData as $key => $value)
                                                @if (substr($value->name, 0, 4) == 'eway')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="basicpill-lastname-input">{{ strtoupper(preg_replace('/_/i', ' ', $value->name)) }}</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input" value="{{ $value->value }}"
                                                                name="settings[{{ $value->id }}]">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
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
                                    <form action="{{ route('settings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            @foreach ($SettingsData as $key => $value)
                                                @if (substr($value->name, 0, 3) == 'sms')
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="basicpill-lastname-input">{{ strtoupper(preg_replace('/_/i', ' ', $value->name)) }}</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input" value="{{ $value->value }}"
                                                                name="settings[{{ $value->id }}]">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
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
                                    <form action="{{ route('settings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            @foreach ($SettingsData as $key => $value)
                                                @if (substr($value->name, 0, 4) == 'smtp')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="basicpill-lastname-input">{{ strtoupper(preg_replace('/_/i', ' ', $value->name)) }}</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input" value="{{ $value->value }}"
                                                                name="settings[{{ $value->id }}]">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
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
                                    <form action="{{ route('settings.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            @foreach ($SettingsData as $key => $value)
                                                @if (substr($value->name, 0, 4) == 'imap')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="basicpill-lastname-input">{{ strtoupper(preg_replace('/_/i', ' ', $value->name)) }}</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input" value="{{ $value->value }}"
                                                                name="settings[{{ $value->id }}]">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
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
