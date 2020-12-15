$(document).ready(function () {
    $(function () {
        $.validator.setDefaults({
            errorPlacement: function (error, element) {
                error.addClass('has-error');
                if(element.prop('type') === 'radio' || element.prop('type') ==='checkbox') {
                    error.insertAfter(element.closest('div'));
                } else {
                    error.insertAfter(element)
                }
            }
        });

        //  LOGIN FORM
        $('#login_form').validate({
            rules: {
                name: {
                    required: true,
                },
                password: {
                    required: true,
                }
            }
        });

        //  VALIDATE ADMIN SIGNUP FORM
        $('#signup_form').validate({
            rules: {
                admin_level: "required",
                first_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                last_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                signup_email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "exists.php",
                        type: "POST"
                    }
                },
                password: {
                    required: true,
                    minlength: 3
                },
                password_confirm:{
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                admin_level: '<em>Admin level</em> is required.',
                first_name: {
                    required: '<em>First name</em> is Required.',
                    minlength: '<em>First name</em> MUST have at least 3 characters.',
                },
                last_name: {
                    required: '<em>Last name</em> is required.',
                    minlength: '<em>Last name</em> MUST have at least 3 characters.',
                },
                signup_email: {
                    remote: "Email already in use!"
                },
                password: {
                    minlength: 'Password must be at least 4 characters!',
                },
                password_confirm: {
                    equalTo: 'Your passwords do not match!'
                }
            }
        });


        //  VALIDATE STUDENT SIGNUP FORM
        $('#btn_student_sign_up').unbind('click').click(function() {
            $('#student_sign_up_form').validate({
                rules: {
                    admin_level: "required",
                    first_name: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    last_name: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    students_class: 'required',
                    signup_email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "exists.php",
                            type: "POST"
                        }
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    password_confirm: {
                        required: true,
                        equalTo: "#password"
                    },
                    gender: 'required'
                },
                messages: {
                    admin_level: '<em>Admin level</em> is required.',
                    first_name: {
                        required: '<em>First name</em> is Required.',
                        minlength: '<em>First name</em> MUST have at least 3 characters.',
                    },
                    last_name: {
                        required: '<em>Last name</em> is required.',
                        minlength: '<em>Last name</em> MUST have at least 3 characters.',
                    },
                    signup_email: {
                        remote: "Email already in use!"
                    },
                    password: {
                        minlength: 'Password must be at least 4 characters!',
                    },
                    password_confirm: {
                        equalTo: 'Your passwords do not match!'
                    },
                },
                submitHandler: function () {
                    var data = $("#student_sign_up_form").serialize();

                    $.ajax({
                        data: data,
                        type: 'POST',
                        url: "insert/student_sign_up_ins.php",
                        success: function () {
                            window.location.href = '../login.php?error=none';
                        }
                    });
                }
            });
        });


        /*  VALIDATE USER FORMS  */
        $('#update-user').unbind('click').click(function() {
            $('#update_user_form').validate({
                rules: {
                    user_first_name_e: {
                        required: true,
                    },
                    user_last_name_e: {
                        required: true,
                    },
                    user_class_e: {
                        required: true,
                    },
                    user_email_e: {
                        required: true,
                    },
                    User_gender_e: {
                        required: true,
                    }
                },
                messages: {
                    user_first_name_e: 'needed'
                },
                submitHandler: function () {
                    var data = $("#update_user_form").serialize();
                    console.log(data);

                    $.ajax({
                        data: data,
                        type: "POST",
                        url: "insert/user_ins.php",
                        success: function (dataResult) {
                            dataResult = JSON.parse(dataResult);

                            if (dataResult.statusCode === 200) {
                                $('#editUserModal').modal('hide');
                                alert('User Updated Successfully !');
                                location.reload();
                            } else if (dataResult.statusCode === 201) {
                                alert(dataResult);
                            }
                        }
                    });
                }
            });
        });

        //  VALIDATE STUDENTS FORMS
        $('#students_form').validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                last_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                students_class: {
                    required: true,
                },
                gender: "required"
            },
            messages: {
                first_name: {
                    required: '<em>First name</em> is required.',
                    minlength: '<em>First name</em> MUST have at least 3 characters.'
                },
                last_name: {
                    required: '<em>Last name</em> is required.',
                    minlength: '<em>Last name</em> MUST have at least 3 characters.'
                },
                students_class: {
                    required: '<em>Class</em> is required.'
                },
                gender: '<em>Gender</em> is required.'
            }
        });
        $('#update_students_form').validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                last_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                students_class: {
                    required: true,
                },
                gender: "required"
            },
            messages: {
                first_name: {
                    required: '<em>First name</em> is required.',
                    minlength: '<em>First name</em> MUST have at least 3 characters.'
                },
                last_name: {
                    required: '<em>Last name</em> is required.',
                    minlength: '<em>Last name</em> MUST have at least 3 characters.'
                },
                students_class: {
                    required: '<em>Class</em> is required.'
                },
                gender: '<em>Gender</em> is required.'
            }
        });


        //  VALIDATE CLASSES FORMS
        $('#classes_form').validate({
            rules: {
                form_number: {
                    required: true,
                },
                stream_name: {
                    required: true,
                    lettersonly: true
                }
            },
            messages: {
                form_number: {
                    required: '<em>Form number</em> is required.',
                },
                stream_name: {
                    required: '<em>Stream name</em> is required.',
                    lettersonly: 'You are only allowed to key in alphabetical characters.'
                }
            }
        });
        $('#update_classes_form').validate({
            rules: {
                form_number: {
                    required: true,
                },
                stream_name: {
                    required: true,
                    lettersonly: true
                }
            },
            messages: {
                form_number: {
                    required: '<em>Form number</em> is required.',
                },
                stream_name: {
                    required: '<em>Stream name</em> is required.',
                    lettersonly: 'You are only allowed to key in alphabetical characters.'
                }
            }
        });

        $('#positions_form').validate({
            rules: {
                position_name: {
                    required: true,
                },
                position_level: {
                    required: true,
                },
                'eligibility[]': {
                    required: true,
                }
            },
            messages: {
                position_name: {
                    required: 'Please enter <em>position name</em>.',
                },
                position_level: {
                    required: 'Please select a <em> level</em>.',
                },
                'eligibility[]': {
                    required: 'Please select at least 1 <em>eligible</em> form'
                }
            }
        });

        $('#update_positions_form').validate({
            rules: {
                position_name: {
                    required: true,
                },
                position_level: {
                    required: true,
                },
                'eligibility[]': {
                    required: true,
                }
            },
            messages: {
                position_name: {
                    required: 'Please enter <em>position name</em>.',
                },
                position_level: {
                    required: 'Please select a <em> level</em>.',
                },
                'eligibility[]': {
                    required: 'Please select at least 1 <em>eligible</em> form'
                }
            }
        });

        //  Validate Nomination Form
        $('#nomination_form').validate({
            rules: {
                nominator_type: {
                    required: true
                },
                position_name: {
                    required: true
                },
                select_student: {
                    required: true
                }
            },
            messages: {
                nominator_type: {
                    required: 'Please choose a nominator type.'
                },
                position_name: {
                    required: 'Please select a position.'
                },
                select_student: {
                    required: 'Please select your nominee.'
                }
            },
            submitHandler: function() {
                var nominator_id = $('#nominator_id').val();
                var nominator_type = $('[name="nominator_type"]:checked').val();
                var position_id = $('[name="position_id"]:checked').val();
                var nominee_id = $('#select_student').val();
                var nominator_class = $('#nominator_class').val();
                var nominee_class = $('#nominee_class').val();

                $.ajax({
                    url: 'insert/nomination_ins.php',
                    method: 'POST',
                    data: {
                        nominator_id:nominator_id,
                        nominator_type:nominator_type,
                        position_id:position_id,
                        nominee_id:nominee_id,
                        nominator_class:nominator_class,
                        nominee_class: nominee_class
                    },
                    success:function(data) {
                        alert(data);
                        if(data === 'Your nomination was successful!😎' || data === 'You have already nominated a student for this position!👀' || data === 'You CANNOT nominate the same student for 2 different positions!🧐') {
                            location.reload();
                        } else if(data === 'This student has already been nominated for a different position!🙂') {
                            location.reload();
                        } else if(data === 'This student already has already been nominated, please nominate another🙂🙂') {
                            location.reload();
                        } else if(data === 'This student already has enough seconders🙂' || data === 'This student already has a proposer but you may second him/her🙂') {
                            location.reload();
                        }
                    }
                })
            }
        });

        //  VALIDATE PROFILE FORMS
        $('#confirm_password_form').validate({
            rules: {
                old_pass: "required"
            },
            messages: {
                old_pass: {
                    required: "Verify your current password!"
                }
            }
        });

        $('#update-pass').click(function() {
            $('#edit_password_form').validate({
                rules: {
                    password: "required",
                    password_confirm:{
                        required: true,
                        equalTo: "#new_pass"
                    },
                },
                messages: {
                    password_confirm: {
                        equalTo: 'Your passwords do not match!'
                    }
                },
                submitHandler: function() {
                    var new_pass = $('#new_pass').val();
                    var new_pass_confirm = $('#new_pass_confirm').val();
                    var new_pass_id = $('#new_pass_id').val();

                    $.ajax({
                        url: 'insert/profile_ins.php',
                        data: {
                            new_pass_id: new_pass_id,
                            new_pass: new_pass,
                            new_pass_confirm: new_pass_confirm,
                            edit_type: 'edit_password'
                        },
                        type: 'POST',

                        success: function(data) {
                            alert(data);
                            $('#confirmPasswordModal').modal('toggle');
                            $('#editPasswordModal').modal('toggle');
                        }
                    })
                }
            });
        })

        $('#update-username').click(function() {
            $('#edit_username_form').validate({
                rules: {
                    new_username: {
                        required: true,
                        minlength: 3,
                        remote: {
                            url: "exists.php",
                            type: "POST"
                        }
                    },
                },
                messages: {
                    new_username: {
                        required: "Please enter new username",
                        minlength: 'Username must have atleast 3 characters',
                        remote: 'Username already taken!'
                    },
                },
                submitHandler: function() {
                    var data = $('#edit_username_form').serialize();

                    $.ajax({
                        url: 'insert/profile_ins.php',
                        data: data,
                        type: 'POST',

                        success: function(data) {
                            alert(data);

                            if(data === 'Username changed successfully!') {
                                $('#editUsernameModal').modal('toggle');
                                location.reload();
                            }
                            return false;
                        }
                    })
                }
            });
        })

        $('#update-email').click(function() {
            $('#edit_email_form').validate({
                rules: {
                    new_email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "exists.php",
                            type: "POST"
                        }
                    }
                },
                messages: {
                    new_email: {
                        remote: "Email already in use!"
                    }
                },
                submitHandler: function() {
                    var user_id = $('#email_id').val();
                    var email = $('#new_email').val();

                    $.ajax({
                        url: 'insert/profile_ins.php',
                        data: {
                            user_id: user_id,
                            email: email,
                            edit_type: 'edit_email'
                        },
                        type: 'POST',

                        success: function(data) {
                            alert(data);

                            if(data === 'Email changed successfully!') {
                                $('#editEmailModal').modal('toggle');
                                location.reload();
                            }
                        }
                    })
                }
            })
        })
    });

    //  VOTE VALIDATION
    //  Submit
    $('#submit').click(function(e) {
        e.preventDefault();

        if(!$('[name="head_boy"]').is(':checked')) {
            $('#head_boy-err').html('* Vote a Head Boy!.');
            return false;
        } else {
            var data = $('#voting_form').serialize();

            $.ajax({
                url: 'insert/vote_ins.php',
                method: 'POST',
                data: data,

                success: function(response) {
                    alert(response);
                    if(response === 'You have Voted Successfully!') {
                        $('.success_note').html('🥳 CONGRATULATIONS !!! 💯');
                        $('#success').show();
                        $('#seventh').hide();
                        $('.my_progress').hide();
                    } else if(response === 'You CANNOT vote twice!') {
                        $('.success_note').html('#StopKorapshoonn...‼😤');
                        $('#success').show();
                        $('#seventh').hide();
                        $('.my_progress').hide();
                    }
                }
            })
        }
    });
})
