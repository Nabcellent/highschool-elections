$(document).ready(function () {

//enable dropdown in nomination form
    $('input:radio[name="position_id"]').unbind('change').change(function() {
        $("#select_class").val();
        var position = $('[name="position_id"]:checked').val();
        var form_number = $('#form_number').val();
        var nominator_id = $('#nominator_id').val();

        if(position === "8") {
            var nominee_class = $('#nominator_class').val();
            $("#select_student").attr("disabled", false);
            $("#select_class_div").attr("hidden", true);
            $("#select_student").attr("hidden", false);
            $('#nominee_class').val(nominee_class);

            if(position !== ""){
                $.ajax({
                    url: "../fetch/fetch_nominees.php",
                    data: {
                        nominator_id:nominator_id,
                        position:position,
                        form_number:form_number,
                        nominee_class:nominee_class
                    },
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#select_student").html(resp);
                    }
                });
            } else {
                $("#select_student").html("<option value=''>------- Select -------</option>");
            }
        } else {
            $("#select_class_div").attr("hidden", false);
            $("#select_student").attr("hidden", true);

            $("#select_class").unbind('change').change(function () {
                var nominee_class = $(this).val();
                $('#nominee_class').val(nominee_class);

                $("#select_student").attr("hidden", false);
                $("#select_student").attr("disabled", false);

                if(position !== ""){
                    $.ajax({
                        url: "../fetch/fetch_nominees.php",
                        data: {
                            nominator_id:nominator_id,
                            position: position,
                            form_number:form_number,
                            nominee_class:nominee_class
                        },
                        type: 'POST',
                        success: function (response) {
                            var resp = $.trim(response);
                            $("#select_student").html(resp);
                        }
                    });
                } else {
                    $("#select_student").html("<option value=''>------- Select -------</option>");
                }
            })
        }
    });
});

//Check/Uncheck all checkboxes
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
            });
        } else{
            checkbox.each(function(){
                this.checked = false;
            });
        }
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    var check_eligible = $('form input[type="checkbox"]');
    $('.check_all').click(function() {
        if(this.checked) {
            check_eligible.each(function() {
                this.checked = true;
            });
        } else {
            check_eligible.each(function() {
                this.checked = false;
            });
        }
    })

    //  Contestants tables
    $(document).ready(function() {
        $('#all_all').unbind('click').click(function () {
            $('.child_div').toggleClass('show');
        });
    });
});



/*=======  ENABLE DATATABLES  =======*/

$(document).ready(function() {
    $('.users_datatable').DataTable( {
        scrollY: 400,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
    } );
});


$(document).ready(function() {
    $('.students_datatable').DataTable( {
        "aoColumns": [
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
        ],
        scrollY: 450,
        scrollCollapse: true,
        pagingType: 'full_numbers',
        aLengthMenu: [[10, 20, 40, -1],[10, 20, 40, 'All']],
        order: [[2, 'asc'], [1, 'asc'], [0, 'asc']],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
    } );
});


$(document).ready(function() {
    var students_table = $('#students_table').DataTable({
        destroy: true,
        aLengthMenu: [[10, 20, 40, -1],[10, 20, 40, 'All']],
        language: {
            sSearchPlaceholder: "Search Student"
        }
    });
    var classes_table = $('#classes_table').DataTable({
        destroy: true,
        aLengthMenu: [[5, 10, 20, -1],[5, 10, 20, 'All']],
        language: {
            sSearchPlaceholder: "Search Class"
        }
    });
});




/*=======  VOTING PAGE  =======*/

$(document).ready(function() {
    //  Remove error message
    $('input:radio[name="class_prefect"]').unbind('change').change(function() {
        $('#class_prefect-err').html('');
    });
    $('input:radio[name="form_capt"]').unbind('change').change(function() {
        $('#form_capt-err').html('');
    });
    $('input:radio[name="lib_capt"]').unbind('change').change(function() {
        $('#lib_capt-err').html('');
    });
    $('input:radio[name="games_capt"]').unbind('change').change(function() {
        $('#games_capt-err').html('');
    });
    $('input:radio[name="dh_capt"]').unbind('change').change(function() {
        $('#dh_capt-err').html('');
    });
    $('input:radio[name="head_girl"]').unbind('change').change(function() {
        $('#head_girl-err').html('');
    });
    $('input:radio[name="head_boy"]').unbind('change').change(function() {
        $('#head_boy-err').html('');
    });

    //  NEXT BUTTON
    $('#next-1').click(function(e) {
        e.preventDefault();

        if(!$('[name="class_prefect"]').is(':checked')) {
            $('#class_prefect-err').html('* Vote a Class Prefect!');
            return false;
        } else {
            $('#second').show();
            $('#first').hide();
            $('#progress_bar').css('width', '27.1%');
            $('#progress_text').html('Step - 2');
        }
    });
    $('#next-2').click(function(e) {
        e.preventDefault();

        if(!$('[name="form_capt"]').is(':checked')) {
            $('#form_capt-err').html('* Vote a Form Captain!');
            return false;
        } else {
            $('#third').show();
            $('#second').hide();
            $('#progress_bar').css('width', '41.7%');
            $('#progress_text').html('Step - 3');
        }
    });
    $('#next-3').click(function(e) {
        e.preventDefault();

        if(!$('[name="lib_capt"]').is(':checked')) {
            $('#lib_capt-err').html('* Vote a Library Captain!');
            return false;
        } else {
            $('#forth').show();
            $('#third').hide();
            $('#progress_bar').css('width', '56.3%');
            $('#progress_text').html('Step - 4');
        }
    });
    $('#next-4').click(function(e) {
        e.preventDefault();

        if(!$('[name="games_capt"]').is(':checked')) {
            $('#games_capt-err').html('* Vote a Games Captain!.');
            return false;
        } else {
            $('#fifth').show();
            $('#forth').hide();
            $('#progress_bar').css('width', '70.9%');
            $('#progress_text').html('Step - 5');
        }
    });
    $('#next-5').click(function(e) {
        e.preventDefault();

        if(!$('[name="dh_capt"]').is(':checked')) {
            $('#dh_capt-err').html('* Vote a Dining Hall Captain!.');
            return false;
        } else {
            $('#sixth').show();
            $('#fifth').hide();
            $('#progress_bar').css('width', '89.5%');
            $('#progress_text').html('Step - 6');
        }
    });
    $('#next-6').click(function(e) {
        e.preventDefault();

        if(!$('[name="head_girl"]').is(':checked')) {
            $('#head_girl-err').html('* Vote a Head Girl!.');
            return false;
        } else {
            $('#seventh').show();
            $('#sixth').hide();
            $('#progress_bar').css('width', '100%');
            $('#progress_text').html('Step - 7');
        }
    });

    //  PREVIOUS BUTTON
    $('#prev-2').click(function() {
        $('#first').show();
        $('#second').hide();
        $('#progress_bar').css('width', '12.5%');
        $('#progress_text').html('Step - 1');
    });
    $('#prev-3').click(function() {
        $('#second').show();
        $('#third').hide();
        $('#progress_bar').css('width', '27.1%');
        $('#progress_text').html('Step - 2');
    });
    $('#prev-4').click(function() {
        $('#third').show();
        $('#forth').hide();
        $('#progress_bar').css('width', '41.7%');
        $('#progress_text').html('Step - 3');
    });
    $('#prev-5').click(function() {
        $('#forth').show();
        $('#fifth').hide();
        $('#progress_bar').css('width', '56.3%');
        $('#progress_text').html('Step - 4');
    });
    $('#prev-6').click(function() {
        $('#fifth').show();
        $('#sixth').hide();
        $('#progress_bar').css('width', '70.9%');
        $('#progress_text').html('Step - 5');
    });
    $('#prev-7').click(function() {
        $('#sixth').show();
        $('#seventh').hide();
        $('#progress_bar').css('width', '89.5%');
        $('#progress_text').html('Step - 6');
    });
})