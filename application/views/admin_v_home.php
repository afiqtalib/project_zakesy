<?php $this->load->view('admin_v_header');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard - Hi Admin, <?php echo $nama; ?></h1>  
                        <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report
                        </a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-start border-0 border-5 border-primary shadow-lg h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Data 1
                                            </div>
                                                
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                23432
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-truck-medical fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-start border-0 border-5 border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                            Total Data 2
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                55
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-truck-medical fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-start border-0 border-5 border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Data 3
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    55
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-sharp fa-solid fa-user-doctor fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-start border-0 border-5 border-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Data 4
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                34
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-sharp fa-solid fa-circle-plus fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <?php echo $this->session->userdata['email'];?>
                    <?php print_r($this->session->userdata)?> -->
                    <!-- CARD Tables -->
                    <div class="card shadow mb-4 border-0">
                        <div class="card-header tab rounded-top" style="padding: 0px !important;background: #674188 !important">
                            <button class="tablinks active" onclick="openTab(event, 'all')">
                                Table 1
                            </button>
                            <button class="tablinks" onclick="openTab(event, 'completed')">
                                Table 2
                            </button>
                            <button class="tablinks" onclick="openTab(event, 'pending')">
                                Table 3
                            </button>
                            <button class="tablinks" onclick="openTab(event, 'unpaid')">
                                Table 4
                            </button>
                            <button class="tablinks" onclick="openTab(event, 'cancelled')">
                                Table 5
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- ALL  -->                
                                <table class="table table-bordered tabcontent active" id="all" style="display:table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Position
                                            </th>
                                            <th>
                                                City
                                            </th>
                                            <th>
                                                Age
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>
                                                <a href="#"  class="btn btn-sm btn-primary shadow-sm">
                                                <i class="fas fa-edit fa-sm text-white-50"></i>
                                                    Update
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                        </tr>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>2009/06/25</td>
                                            <td>$675,000</td>
                                        </tr>
                                        <tr>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td>Doris Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>23</td>
                                            <td>2010/09/20</td>
                                            <td>$85,600</td>
                                        </tr>
                                        <tr>
                                            <td>Olivia Liang</td>
                                            <td>Support Engineer</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2011/02/03</td>
                                            <td>$234,500</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- COMPLETED -->                
                                <table class="table table-bordered tabcontent" id="completed" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                #Book ID
                                            </th>
                                            
                                            <th>
                                                COMPLETED
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <!-- PENDING  -->                
                                <table class="table table-bordered tabcontent" id="pending" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                #Book ID
                                            </th>
                                            
                                            <th>
                                                PENDING
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <!-- UNPAID  -->                
                                <table class="table table-bordered tabcontent" id="unpaid" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                #Book ID
                                            </th>
                                            
                                            <th>
                                                UNPAID
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <!-- CANCELLED  -->                
                                <table class="table table-bordered tabcontent" id="cancelled" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                #Book ID
                                            </th>
                                            
                                            <th>
                                                Barber
                                            </th>
                                            <th>
                                                ORDER CANCELLED
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END CARD Tables -->
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