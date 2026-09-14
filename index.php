<?php
// Database
require_once "config/conn.php";
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

?>
<!-- Header Include -->
<?php require_once "includes/header.php"; ?>
<!-- Sidebar Include -->
<?php require_once "includes/sidebar.php"; ?>
<!-- Navbar Include -->
<?php require_once "includes/navbar.php"; ?>
<!-- Dashboard Content Start -->
<div class="container-fluid pt-4 px-4">
    <!-- ================= ROW 1 : SUMMARY CARDS ================= -->
    <div class="row g-4">
        <!-- Today Sale -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Sale</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <!-- Total Sale -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Sale</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <!-- Today Revenue -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Revenue</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Revenue</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- ================= ROW 2 : CHARTS ================= -->
    <div class="row g-4 mt-1">
        <!-- Worldwide Sales -->
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <!-- Sales & Revenue -->
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Sales & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
    <!-- ================= ROW 3 : RECENT SALES ================= -->
    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Sales</h6>
                    <a href="">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">
                                    <input class="form-check-input" type="checkbox">
                                </th>
                                <th scope="col">Date</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0123</td>
                                <td>Jhon Doe</td>
                                <td>$123</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0124</td>
                                <td>Jhon Doe</td>
                                <td>$250</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>

                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>01 Jan 2045</td>
                                <td>INV-0125</td>
                                <td>Jhon Doe</td>
                                <td>$320</td>
                                <td>Pending</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>

                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0126</td>
                                <td>Jhon Doe</td>
                                <td>$150</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>

                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0127</td>
                                <td>Jhon Doe</td>
                                <td>$450</td>
                                <td>Pending</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ================= ROW 4 : TESTIMONIAL + MAP ================= -->
    <div class="row g-4 mt-1 mb-4">
        <!-- Testimonial -->
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <h6 class="mb-4">Testimonial</h6>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-1.jpg"
                            style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Client Name</h5>
                        <p>Profession</p>
                        <p class="mb-0">
                            Dolor et eos labore, stet justo sed est sed.
                            Diam sed sed dolor stet amet eirmod eos labore diam.
                        </p>
                    </div>
                    <!-- Testimonial Item -->
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-2.jpg"
                            style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Client Name</h5>
                        <p>Profession</p>
                        <p class="mb-0">
                            Dolor et eos labore, stet justo sed est sed.
                            Diam sed sed dolor stet amet eirmod eos labore diam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map -->
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <iframe class="position-relative rounded w-100" style="height: 315px; border:0;"
                    src="https://www.google.com/maps?q=Lahore%2C%20Punjab%2C%20Pakistan&output=embed" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard Content End -->
<!-- footer include  -->
<?php require_once "includes/footer.php"; ?>