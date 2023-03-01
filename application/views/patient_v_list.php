<?php $this->load->view('admin_v_header');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">List Patients</h1>

                    <!-- Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Patients</h6>
                        </div>
                        <div class="card-body">
                            <!-- ADD NEW SERVICE BUTTON -->
                            <a href="new_emp.php" class="btn btn-success btn-md" style="margin-bottom: 10px;">
                                <i class="fa fa-user-plus"></i>
                                Add Patient
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover" id="all" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Profile Img</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count=1;
                                            foreach($list as $key => $value){
                                        ?>
                                            <tr>
                                                <td> <?php echo $count++; ?> </td>
                                                <td> <?php echo $value['lv_id']; ?> </td>
                                                <td> <?php echo $value['lv_type']; ?> </td>
                                                <td class="justify-content-center"> <img src="./uploads/employees/<?php echo $emp['emp_img']; ?>" width="100px"> </td>
                                                <td>
                                                    <li class="list-inline-item" data-toggle="tooltip" title="Edit profile">
                                                        <button class="btn btn-success btn-sm rounded-2 shadow-sm" type="button" data-toggle="modal" data-target="#" data-placement="top">
                                                            <a href="edit-emp.php?emp_id=<?php echo $emp['emp_id']; ?> " style="color: white;">
                                                                <i class="fas fa-eye fa-lg"></i>
                                                            </a>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm rounded-2 shadow-sm" type="button" data-toggle="modal" data-target="#" data-placement="top">
                                                            <a href="#" style="color: white;">
                                                                <i class="fas fa-edit fa-lg"></i>
                                                            </a>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm rounded-2 shadow-sm" type="button" data-toggle="modal" data-target="#" data-placement="top">
                                                            <a href="#" style="color: white;">
                                                                <i class="fas fa-trash fa-lg"></i>
                                                            </a>
                                                        </button>
                                                    </li>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  <!-- End Card Example -->
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded m-3 position-fixed bottom-0 end-0" href="#page-top">
        <!-- <i class="fas fa-angle-up"></i> -->
        <i class="fa-sharp fa-solid fa-circle-chevron-up fa-2x"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url()."index.php/admin/logout"?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS FROM - (SB-ADMIN) -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- TEST MASUK JS 2 (SB-ADMIN) -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    
    <!-- JS BS 5 - ORIGINAL -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    
    <!-- IMORT JQUERY -->
    <!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <!-- JS DATATABLE -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#all').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );

    (function($) {
        "use strict"; // Start of use strict

        // Toggle the side navigation
        $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
            $("body").toggleClass("sidebar-toggled");
            $(".sidebar").toggleClass("toggled");
            if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
            };
        });

        // Close any open menu accordions when window is resized below 768px
        $(window).resize(function() {
            if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
            };
            
            // Toggle the side navigation when window is resized below 480px
            if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
            $("body").addClass("sidebar-toggled");
            $(".sidebar").addClass("toggled");
            $('.sidebar .collapse').collapse('hide');
            };
        });

        // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
        $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
            if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
            }
        });

        // Scroll to top button appear
        $(document).on('scroll', function() {
            var scrollDistance = $(this).scrollTop();
            if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
            } else {
            $('.scroll-to-top').fadeOut();
            }
        });

        // Smooth scrolling using jQuery easing
        $(document).on('click', 'a.scroll-to-top', function(e) {
            var $anchor = $(this);
            $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
            }, 1000, 'easeInOutExpo');
            e.preventDefault();
        });

    })(jQuery); // End of use strict

</script>