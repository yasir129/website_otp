        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Website Dashboard</h2>
                            </div>
                        </div>
                    </div>

                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <h5 class="text-white">Total Users</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1 text-white"><?php echo $all['users'][0]['count(*)'];?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="text-white">Total Admin</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1 text-white"><?php echo $all['admin'][0]['count(*)'];?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-success">
                                    <div class="card-body">
                                        <h5 class="text-white">Total Notifications</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1 text-white"><?php echo $all['medic'][0]['count(*)'];?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-secondary">
                                    <div class="card-body">
                                        <h5 class="text-white">Sample</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1 text-white">Empty</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url('assets/vendor/slimscroll/jquery.slimscroll.js'); ?>"></script>
    <!-- main js -->
    <script src="<?php echo base_url('assets/libs/js/main-js.js'); ?>"></script>
    <!-- chart chartist js -->
    <script src="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.min.js'); ?>"></script>
    <!-- sparkline js -->
    <script src="<?php echo base_url('assets/vendor/charts/sparkline/jquery.sparkline.js'); ?>"></script>
    <!-- morris js -->
    <script src="<?php echo base_url('assets/vendor/charts/morris-bundle/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.js'); ?>"></script>
    <!-- chart c3 js -->
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/c3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/d3-5.4.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/C3chartjs.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/js/dashboard-ecommerce.js'); ?>"></script>
</body>
 
</html>