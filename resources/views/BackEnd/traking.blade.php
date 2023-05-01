@extends('BackEnd.Layout.main')
@section('content')
    {{-- <!-- DataTables -->
        <link href="{{url('theme').'/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'}}" rel="stylesheet" type="text/css" />
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

    <!-- DataTables -->
    <link href="{{ url('theme') . '/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css' }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('theme') . '/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css' }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ url('theme') . '/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css' }}"
        rel="stylesheet" type="text/css" />

    <!-- Required datatable js -->
    <script src="{{ url('theme') . '/assets/libs/datatables.net/js/jquery.dataTables.min.js' }}"></script>
    <script src="{{ url('theme') . '/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js' }}"></script>

    <!-- Responsive examples -->
    <script src="{{ url('theme') . '/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js' }}"></script>
    <script src="{{ url('theme') . '/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js' }}"></script>

    <!-- Datatable init js -->
    <script src="{{ url('theme') . '/assets/js/pages/datatables.init.js' }}"></script>

    <!-- Buttons examples -->
    <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/jszip/jszip.min.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/pdfmake/build/pdfmake.min.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/pdfmake/build/vfs_fonts.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/buttons.html5.min.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/buttons.print.min.js'}}"></script>
    <script src="{{url('theme').'/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js'}}"></script>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
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
                                        <table id="datatable"
                                            class="table table-striped table-bordered dt-responsive nowrap"
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
                                            {{--<tbody>
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
                                            </tbody>--}}
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

<script>
    // jquery for add tracking

    $(document).ready(function() {

        var dtTable = $('#datatable').DataTable({
            serverSide: true,
            ordering: false,
            bLengthChange: false,
            searching: false,
            processing: true,
            autoWidth: true,
            ajax: {
                url: "{{route('ewb.getLists')}}",
                type: "POST",
                columns: [
                    { data: 'id' },
                    { data: 'vehicleno' },
                    { data: 'ewbNo' },
                    { data: 'ewayBillDate' },
                    { data: 'fromPlace' },
                    { data: 'toPlace' },
                ]
                // "data": function ( d ) {
                //     var filter = [];
                //     $("select[name='filter[]']").each(function(){
                //         filter.push({
                //             name: $(this).attr('id'),
                //             value: $(this).val(),
                //         });
                //     });

                //     var search_input = [];
                //     $("input[name='search_input[]']").each(function(){
                //         search_input.push({
                //             name: $(this).attr('id'),
                //             value: $(this).val(),
                //         });

                //     });

                //     return $.extend( {}, d, {
                //         "search_input": search_input,
                //         "filter": filter,
                //         "from_date": $('#frmDate').val(),
                //         "to_date": $('#toDate').val(),
                //     });
                // },

            },

            scrollY: 50,
            scroller: {
                loadingIndicator: true
            },
            scrollX : true,
            responsive:false,
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('id', aData[0]);
            },
            'preDrawCallback': function(settings) {
            //$("#loader").show();
            },
            'drawCallback': function(settings) {
            $("#loader").hide();
            },
        });

        dtTable.columns([0]).visible(false);

        $("select[name='filter[]']").each(function(){
            $(this).change(function(){
                dtTable.ajax.reload();
            });
        });

        $("input[name='search_input[]']").each(function(){
            $(this).keyup(function(){
                dtTable.ajax.reload();
            });
        });

        dtTable.columns([0]).visible(false);

        ////// SELECT ALL ON CLICK CHECKBOX
        $("#selectall").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        ////// From Date
        $("#frmDate").change(function(){
            dtTable.ajax.reload();
        });

        ////// To Date
        $("#toDate").change(function(){
            dtTable.ajax.reload();
        });

        ////// REFRESH DATATABLE
        $("#Refresh").click(function(){
            dtTable.ajax.reload();
        });

        ////// RESET SEARCH FORM
        $("#Reset").click(function(){
            $("input[name='search_input[]']").each(function(){
                $(this).val('');
            });
            dtTable.ajax.reload();
        });

        ////// RESET SEARCH FORM
        $("#Excel").click(function(){

            var filter = [];
            $("select[name='filter[]']").each(function(){
                filter.push({
                    name: $(this).attr('id'),
                    value: $(this).val(),
                });
            });

            var search_input = [];
            $("input[name='search_input[]']").each(function(){
                search_input.push({
                    name: $(this).attr('id'),
                    value: $(this).val(),
                });

            });

            var from_date = $('#frmDate').val();
            var to_date = $('#toDate').val();

            $.ajax({
                type: "post",
                url: "",
                data : {
                    search_input : search_input,
                    filter : filter,
                    from_date : from_date,
                    to_date : to_date,
                    length : 1,
                },
                dataType: 'json',
            }).done(function(data){
                var $a = $("<a>");
                $a.attr("href",data.file);
                $("body").append($a);
                $a.attr("download","file.xls");
                $a[0].click();
                $a.remove();
            });
        });
    });

    function onSaveChanges(e) {
        if (!confirm("Are you sure you want to save all changes?")){
            e.preventDefault();
            return false;
        }
    }
    // $(document).ready(function() {
    //     $('#tracking-form').submit(function(event) {
    //         // for stop refreshing page
    //         event.preventDefault();
    //         var form = $("#tracking-form")[0];
    //         var data = new FormData(form);
    //         // alert(data);
    //         // for disable submit button
    //         $("#btntracksubmit").prop("disabled", true);

    //         $.ajax({
    //             type: "POST",
    //             url: "{{ route('ewb.AddtoTracking') }}",
    //             data: data,
    //             processData: false,
    //             contentType: false,
    //             success: function(result) {
    //                 // alert('hi');
    //                 $("#form-data").html(result.html);
    //                 $("#btntracksubmit").prop("disabled", false);
    //             },
    //             error: function(e) {
    //                 console.log(e.responseText);
    //                 $("#btntracksubmit").prop("disabled", false);
    //             }
    //         });
    //     });


    // });

    //$('#group-form').submit(function(event) {
    //$(document).on('submit', "#group-form", function () {
    // $("body").on("click", "#btngroupsubmit", function(event) {
    //     // for stop refreshing page
    //     event.preventDefault();
    //     var form = $("#group-form")[0];
    //     var data = new FormData(form);
    //     data.append('_token', '{{ csrf_token() }}');
    //     // alert(data);
    //     // for disable submit button
    //     $("#btngroupsubmit").prop("disabled", true);

    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('ewb.AddtoGroup') }}",
    //         data: data,
    //         processData: false,
    //         contentType: false,
    //         success: function(result) {

    //             // alert('hi');
    //             // $("#form-data").html(result.html);
    //             $("#btngroupsubmit").prop("disabled", false);
    //             //window.location.href = "{{ route('ewb')}}";
    //             location.reload();
    //         },
    //         error: function(e) {
    //             console.log(e.responseText);
    //             $("#btngroupsubmit").prop("disabled", false);
    //         }
    //     });
    // });


</script>

@endsection
