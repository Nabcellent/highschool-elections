<?php
$page_title = "Polls";
require_once "resources/templates/header.php";
check_session();

?>
<div class="container-fluid mb-5">

    <!--    Heading    -->

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-3">
            <div class="row">
                <div class="col-lg-12 bg-light rounded">
                    <h2 class="my-2 text-center"><i class="fas fa-poll-h"></i> LIVE POLL RESULTS</h2>
                    <hr class="my-2 bg-dark">
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!--    End Heading    -->

    <!--    Polls    -->

    <div class="carousel slide" id="carousel" data-ride="carousel" data-interval="906000">

        <!-- Carousel Content -->

        <div class="carousel-inner">

            <!-- Class Prefect Polls -->

            <div class="carousel-item active">
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <h3 class="text-center">CLASS LEVEL</h3>
                    </div>
                </div>
                <div class="row justify-content-center bg-dark text-light text-center px-4">
                    <div class="col-md-6 p-2">
                        <h4>FORM 1 CLASS PREFECT</h4>
                        <hr class="my-2 bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>1 EARTH</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="1_E_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>1 JUPITER</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="1_J_id"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>1 MARS</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="1_M_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>1 NEPTUNE</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="1_N_id"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h5>1 VENUS</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="1_V_id"></div>
                            </div>
                        </div>
                    </div>

                    <!--    Form 2 Class Prefect    -->
                    <div class="col-md-6 p-2">
                        <h4>FORM 2 CLASS PREFECT</h4>
                        <hr class="my-2 bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>2 EARTH</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="2_E_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>2 JUPITER</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="2_J_id"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>2 MARS</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="2_M_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>2 NEPTUNE</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="2_N_id"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h5>2 VENUS</h5>
                                <hr class="my-2 mx-auto bg-light w-75">
                                <div class="text-left" id="2_V_id"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center bg-light text-dark text-center px-4">

                    <!--    Form 3 Class Prefect    -->
                    <div class="col-md-6 p-2">
                        <h4>FORM 3 CLASS PREFECT</h4>
                        <hr class="my-2 bg-dark">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>3 EARTH</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="3_E_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>3 JUPITER</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="3_J_id"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>3 MARS</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="3_M_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>3 NEPTUNE</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="3_N_id"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h5>3 VENUS</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="3_V_id"></div>
                            </div>
                        </div>
                    </div>

                    <!--    Form 4 Class Prefect    -->
                    <div class="col-md-6 p-2">
                        <h4>FORM 4 CLASS PREFECT</h4>
                        <hr class="my-2 bg-dark">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>4 EARTH</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="4_E_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>4 JUPITER</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="4_J_id"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>4 MARS</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="4_M_id"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>4 NEPTUNE</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="4_N_id"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h5>4 VENUS</h5>
                                <hr class="my-2 mx-auto bg-dark w-75">
                                <div class="text-left" id="4_V_id"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <h3 class="text-center text-white">SCHOOL LEVEL</h3>
                    </div>
                </div>
                <div class="row justify-content-center bg-dark text-light text-center p-2">
                    <div class="col-md-6 bg-light text-dark">
                        <h4>HEAD BOY</h4>
                        <hr class="my-2 bg-dark">
                        <div class="text-left" id="head_boy_id"></div>
                    </div>
                    <div class="col-md-6">
                        <h4>HEAD GIRL</h4>
                        <hr class="my-2 bg-light">
                        <div class="text-left" id="head_girl_id"></div>
                    </div>
                </div>

                <div class="row justify-content-center text-center p-2">
                    <div class="col-md-6 bg-light text-dark">
                        <h4>DINING HALL CAPTAIN</h4>
                        <hr class="my-2 bg-dark">
                        <div class="text-left" id="dh_capt_id"></div>
                    </div>
                </div>

                <div class="row justify-content-center bg-dark text-light text-center p-2">
                    <div class="col-md-6">
                        <h4>GAMES CAPTAIN</h4>
                        <hr class="my-2 bg-light">
                        <div class="text-left" id="games_capt_id"></div>
                    </div>
                    <div class="col-md-6 bg-light text-dark">
                        <h4>LIBRARY CAPTAIN</h4>
                        <hr class="my-2 bg-dark">
                        <div class="text-left" id="lib_capt_id"></div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <h3 class="text-center">FORM LEVEL</h3>
                    </div>
                </div>
                <div class="row justify-content-center bg-dark text-light text-center p-2">
                    <div class="col-md-6 bg-light text-dark">
                        <h4>FORM 1</h4>
                        <hr class="my-2 bg-dark">
                        <div class="text-left" id="form_1_id"></div>
                    </div>
                    <div class="col-md-6 text-light">
                        <h4>FORM 2</h4>
                        <hr class="my-2 bg-light">
                        <div class="text-left" id="form_2_id"></div>
                    </div>
                </div>
                <div class="row justify-content-center bg-dark text-center p-2">
                    <div class="col-md-6 text-light">
                        <h4>FORM 3</h4>
                        <hr class="my-2 bg-light">
                        <div class="text-left" id="form_3_id"></div>
                    </div>
                    <div class="col-md-6 bg-light text-dark">
                        <h4>FORM 4</h4>
                        <hr class="my-2 bg-dark">
                        <div class="text-left" id="form_4_id"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Carousel Content -->

        <!-- Carousel Indicators -->

        <ol class="carousel-indicators carousel-indicators-numbers mt-5">
            <li data-target="#carousel" data-slide-to="0" class="active">1</li>
            <li data-target="#carousel" data-slide-to="1" class="active">2</li>
            <li data-target="#carousel" data-slide-to="2" class="active">3</li>
        </ol>
        <!-- End Carousel Indicators -->
    </div>
</div>

<?php
include_once "resources/templates/footer.php";

?>

<script>
    $(document).ready(function() {
        fetch_class_poll_data();
        fetch_sch_poll_data();
        fetch_form_poll_data();

        var school_results = ['#head_boy_id', '#head_girl_id', '#dh_capt_id', '#games_capt_id', '#lib_capt_id'];
        var form_results = ['#form_1_id', '#form_2_id', '#form_3_id', '#form_4_id'];
        var class_results = [
            '#1_E_id', '#1_J_id', '#1_M_id', '#1_N_id', '#1_V_id',
            '#4_E_id', '#4_J_id', '#4_M_id', '#4_N_id', '#4_V_id',
            '#2_E_id', '#2_J_id', '#2_M_id', '#2_N_id', '#2_V_id',
            '#3_E_id', '#3_J_id', '#3_M_id', '#3_N_id', '#3_V_id',
        ];

        function fetch_sch_poll_data() {
            $.ajax({
                url: 'fetch/fetch_all_sch_lvl.php',
                type: 'POST',
                success:function(data) {
                    data = JSON.parse(data);

                    school_results.forEach(function(result, i) {
                        $(result).html(data[i]);
                    });
                }
            })
        }

        function fetch_form_poll_data() {
            $.ajax({
                url: 'fetch/fetch_all_form_lvl.php',
                type: 'POST',
                success:function(data) {
                    data = JSON.parse(data);

                    form_results.forEach(function(result, i) {
                        $(result).html(data[i]);
                    });
                }
            })
        }

        function fetch_class_poll_data() {
            $.ajax({
                url: 'fetch/fetch_all_class_lvl.php',
                type: 'POST',
                success:function(data) {
                    data = JSON.parse(data);

                    class_results.forEach(function(result, i) {
                        $(result).html(data[i]);
                    });
                }
            })
        }
    })
</script>
