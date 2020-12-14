/*=======  USER CRUD FORM FUNCTIONS  =======*/
$(document).on('click','.update-user',function(e) {
    var user_id = $(this).attr("data-user_id");
    var user_fname = $(this).attr("data-user_first_name");
    var user_lname = $(this).attr("data-user_last_name");
    var user_class = $(this).attr("data-user_class");
    var user_email = $(this).attr("data-user_email");
    var user_username = $(this).attr("data-user_username");

    $('#user_id_e').val(user_id);
    $('#user_first_name_e').val(user_fname);
    $('#user_last_name_e').val(user_lname);
    $('#user_class_e').val(user_class);
    $('#user_email_e').val(user_email);
    $('#user_username_e').val(user_username);
});


/*  POSITIONS CRUD FORM FUNCTIONS   */
$(document).on('click','#btn-add',function(e) {
    var data = $("#positions_form").serialize();

    $.ajax({
        data: data,
        type: "post",
        url: "insert/position_ins.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);

            if(dataResult.statusCode === 200) {
                $('#addPositionModal').modal('hide');
                alert('Position Added Successfully !');
                location.reload();
            } else if(dataResult.statusCode===201) {
                alert(dataResult);
            }
        }
    });
});

$(document).on('click','.update',function(e) {
    var pos_id = $(this).attr("data-pos_id");
    var pos_name = $(this).attr("data-pos_name");
    var pos_level = $(this).attr("data-pos_level");
    var pos_eligibility = $(this).attr("data-pos_eligibility");

    $('#position_id_edit').val(pos_id);
    $('#position_name_edit').val(pos_name);
    $('#position_level_edit').val(pos_level);
    $("input[name='eligibility']").val(pos_eligibility);
});

$(document).on('click','#update-position',function(e) {
    var data = $("#update_positions_form").serialize();

    $.ajax({
        data: data,
        type: "POST",
        url: "insert/position_ins.php",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);

            if(dataResult.statusCode === 200){
                $('#editEmployeeModal').modal('hide');
                alert('Position Updated Successfully !');
                location.reload();
            } else if(dataResult.statusCode === 201){
                alert(dataResult);
            }
        }
    });
});

$(document).on("click", ".delete", function() {
    var position_id=$(this).attr("data-id");
    $('#position_id_d').val(position_id);
});

$(document).on("click", "#delete-position", function() {
    $.ajax({
        url: "insert/position_ins.php",
        type: "POST",
        cache: false,
        data:{
            type:3,
            position_id: $("#position_id_d").val()
        },
        success: function(dataResult){
            $('#deletePositionModal').modal('hide');
            $("#"+dataResult).remove();
        }
    });
});

$(document).on("click", "#delete_multiple_positions", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-id'));
    });
    let WRN_PROFILE_DELETE;
    if (user.length <= 0) {
        alert("Please select records.");
    } else {
        WRN_PROFILE_DELETE = "Are you sure you want to delete " + (user.length > 1 ? "these rows" : "this row");
        var checked = confirm(WRN_PROFILE_DELETE);
        if (checked === true) {
            var selected_values = user.join(",");
            console.log(selected_values);
            $.ajax({
                type: "POST",
                url: "insert/position_ins.php",
                cache: false,
                data: {
                    type: 4,
                    position_id: selected_values
                },
                success: function (response) {
                    var ids = response.split(",");
                    for (var i = 0; i < ids.length; i++) {
                        $("#" + ids[i]).remove();
                    }
                }
            });
        }
    }
});

/*  STUDENTS CRUD FORM FUNCTIONS    */
$(document).on('click', '#btn-add-student', function (e) {
    var data = $('#students_form').serialize();
    console.log(data);

    $.ajax({
        data: data,
        type: 'POST',
        url: 'insert/student_ins.php',
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);

            if(dataResult.statusCode === 200) {
                $('#addStudentModal').modal('hide');
                alert('Student Added Successfully!');
                location.reload();
            } else if(dataResult.statusCode === 201) {
                alert(dataResult);
            }
        }
    })
});

$(document).on('click', '.update-student', function (e) {
    var stu_id = $(this).attr('data-student_id');
    var stu_first_name = $(this).attr('data-student_first_name');
    var stu_last_name = $(this).attr('data-student_last_name');
    var stu_class = $(this).attr('data-student_class');
    var stu_gender = $(this).attr('data-student_gender');

    $('#student_id_edit').val(stu_id);
    $('#first_name_edit').val(stu_first_name);
    $('#last_name_edit').val(stu_last_name);
    $('#students_class_edit').val(stu_class);
});

$(document).on('click', '#update-student', function(e) {
    var data = $('#update_students_form').serialize();
    console.log(data);

    $.ajax({
        data: data,
        type: 'POST',
        url: 'insert/student_ins.php',

        success: function(dataResult) {
            dataResult = JSON.parse(dataResult);

            if(dataResult.statusCode === 200) {
                $('#editStudentModal').modal('hide');
                alert('Student Updated Successfully!');
                location.reload();
            } else if(dataResult.statusCode === 201){
                alert(dataResult);
            }
        }
    })
});

$(document).on("click", ".delete", function() {
    var student_id =$(this).attr("data-id");

    $('#student_id_d').val(student_id);
});

$(document).on('click', '#delete-student', function(e) {
    $.ajax({
        url: "insert/student_ins.php",
        type: "POST",
        cache: false,
        data:{
            type:3,
            student_id: $("#student_id_d").val()
        },
        success: function(dataResult){
            $('#deleteStudentModal').modal('hide');
            $("#"+dataResult).remove();

        }
    });
});

$(document).on("click", "#delete_multiple_students", function() {
    var students = [];

    $(".student_checkbox:checked").each(function() {
        students.push($(this).data('user-id'));
    });

    let WRN_PROFILE_DELETE;

    if (students.length <= 0) {
        alert("Please select records.");
    } else {
        WRN_PROFILE_DELETE = "Are you sure you want to delete " + (students.length > 1 ? "these rows" : "this row");
        var checked = confirm(WRN_PROFILE_DELETE);

        if (checked === true) {
            var selected_values = students.join(",");
            console.log(selected_values);

            $.ajax({
                type: "POST",
                url: "insert/student_ins.php",
                cache: false,
                data: {
                    type: 4,
                    student_id: selected_values
                },
                success: function (response) {
                    var ids = response.split(",");
                    for (var i = 0; i < ids.length; i++) {
                        $("#" + ids[i]).remove();
                    }
                    location.reload();
                }
            });
        }
    }
});

/*  CLASSES CRUD FORM FUNCTIONS    */
$(document).on('click', '#btn-add-class', function (e) {
    var data = $('#classes_form').serialize();

    $.ajax({
        data: data,
        type: 'POST',
        url: 'insert/classes_ins.php',

        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);

            if(dataResult.statusCode === 200) {
                $('#addClassModal').modal('hide');
                alert('Class Added Successfully!');
                location.reload();
            } else if(dataResult.statusCode === 201) {
                alert(dataResult);
            }
        }
    })
});

$(document).on('click', '.update-class', function (e) {
    var class_id = $(this).attr('data-class_id');
    var form_number = $(this).attr('data-form_number');
    var stream_name = $(this).attr('data-stream_name');

    $('#class_id_edit').val(class_id);
    $('#form_number_edit').val(form_number);
    $('#stream_name_edit').val(stream_name);
});

$(document).on('click', '#update-class', function(e) {
    var data = $('#update_classes_form').serialize();

    $.ajax({
        url: 'insert/classes_ins.php',
        type: 'POST',
        data: data,

        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);

            if(dataResult.statusCode === 200) {
                $('#editClassModal').modal('hide');
                alert('Class Updated Successfully!');
                location.reload();
            } else if(dataResult.statusCode === 201){
                alert(dataResult);
            }
        }
    })
});

$(document).on("click", ".delete", function() {
    var class_id =$(this).attr("data-id");
    $('#class_id_d').val(class_id);
});

$(document).on('click', '#delete-class', function(e) {
    $.ajax({
        url: "insert/classes_ins.php",
        type: "POST",
        cache: false,
        data:{
            type:3,
            class_id: $("#class_id_d").val()
        },
        success: function(dataResult){
            $('#deleteClassModal').modal('hide');
            $("#"+dataResult).remove();
            location.reload();
        }
    });
});

$(document).on("click", "#delete_multiple_classes", function() {
    var classes = [];

    $(".class_checkbox:checked").each(function() {
        classes.push($(this).data('user-id'));
    });

    let WRN_PROFILE_DELETE;

    if (classes.length <= 0) {
        alert("Please select records.");
    } else {
        WRN_PROFILE_DELETE = "Are you sure you want to delete " + (classes.length > 1 ? "these rows" : "this row");
        var checked = confirm(WRN_PROFILE_DELETE);

        if (checked === true) {
            var selected_values = classes.join(",");
            console.log(selected_values);

            $.ajax({
                type: "POST",
                url: "insert/classes_ins.php",
                cache: false,
                data: {
                    type: 4,
                    class_id: selected_values
                },
                success: function (response) {
                    var ids = response.split(",");
                    for (var i = 0; i < ids.length; i++) {
                        $("#" + ids[i]).remove();
                    }
                    location.reload();
                }
            });
        }
    }
});


/*  EDIT PROFILE AJAX   */
/*  Password Change   */
$(document).on("click", "#confirm-pass", function() {
    var old_pass = $('#old_pass').val();
    var old_pass_id = $('#old_pass_id').val();

    $("#confirm_password_form").submit(function( event ) {
        event.preventDefault();
    });

    $.ajax({
        url: 'insert/profile_ins.php',
        data: {
            old_pass: old_pass,
            old_pass_id: old_pass_id,
            edit_type: 'confirm_old_pass'
        },
        type: 'POST',

        success: function(data) {
            if(data == 'Correct') {
                $('#editPasswordModal').modal('show');
            } else if(data == 'Incorrect') {
                alert('Wrong Password! Please try again...');
                $('#confirmPasswordModal').on('hidden.bs.modal', function() {
                    return false;
                });
            }
        },
    })
});

/*  Username Change */
$(document).on("click", ".update-username", function() {
    var user_id = $(this).attr('data-user_id');
    var old_username = $(this).attr('data-user_username');

    $("#edit_username_form").submit(function( event ) {
        event.preventDefault();
    });

    $('#username_id').val(user_id);
    $('#new_username').val(old_username);
});

/*  Email Change    */
$(document).on("click", ".update-email", function() {
    var user_id = $(this).attr('data-user_id');
    var old_email = $(this).attr('data-user_email');

    $("#edit_email_form").submit(function( event ) {
        event.preventDefault();
    });

    $('#email_id').val(user_id);
    $('#new_email').val(old_email);
});