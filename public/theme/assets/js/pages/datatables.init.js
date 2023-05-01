$(document).ready(function () {

    // ('#datatable').DataTable();

    // table.buttons().disable();

    $("#datatable").DataTable(),
        $("#datatable-buttons")
            // .DataTable({ lengthChange: !1, buttons: ["copy", "excel", "pdf", "colvis"] })
            .DataTable({ lengthChange: !1, buttons: [] })
            .buttons()
            .container()
            .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

});
