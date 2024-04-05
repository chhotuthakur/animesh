<?php
require_once 'config/database.php';
$sql = "SELECT * FROM brand_names";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<?php include 'includes/head.php'; ?>

<body class="skin-blue">
    <div class="wrapper">

        <?php include 'includes/header.php'; ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->





                <!-- Main row -->
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <button class="btn btn-primary" onclick="chooseFile()">Upload Data</button>

                        <form  id="uploadForm" style="display: none;" method="post" enctype="multipart/form-data">
                            <input class="btn bg-navy" style="margin: 5px;" type="file" name="excel_file" id="excelFile">
                            <input type="button" value="Upload" onclick="uploadFile()">
                        </form>
                    </section>

                    <section class="col-lg-12 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Case List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Brand Name</th>
                                                <th>Case Type</th>
                                                <th>Date Attempted</th>
                                                <th>Region</th>
                                                <th>City</th>
                                                <th>Case Number</th>
                                                <th>VIN Number</th>
                                                <th>Engineer Name</th>
                                                <th>Parts Taken From</th>
                                                <th>Action Taken</th>
                                                <th>Final Status</th>
                                                <th>Remarks</th>
                                                <th>Location Type</th>
                                                <th>From Location</th>
                                                <th>Customer Location</th>
                                                <th>Total KM</th>
                                                <th>Home or EC</th>
                                                <th>JB Number</th>
                                                <th>Rectified by ECL</th>
                                                <th>Rectified by Finance Team</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Establish connection to MySQL database



                                            // Fetch data from database
                                            $sql = "SELECT id, brand_name, case_type, date_attempted, region, city, case_number, vin_number, engineer_name, parts_taken_from, action_taken, final_status, remarks, location_type, from_location, customer_location, total_km, home_or_ec, jb_number, rectified_by_ecl, rectified_by_finance_team, note FROM worksheet WHERE id >= 2";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    foreach ($row as $value) {
                                                        echo "<td>" . $value . "</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='22'>No data available</td></tr>";
                                            }

                                            // Close MySQL connection

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </section>

                    <!-- right col (We are only adding the ID to make the widgets sortable)-->


                </div><!-- /.row (main row) -->


            </section><!-- /.content -->


        </div><!-- /.content-wrapper -->




        <?php include 'includes/footer.php'; ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <script>
        function chooseFile() {
            document.getElementById('uploadForm').style.display = 'block';
        }

        function uploadFile() {
            var fileInput = document.getElementById('excelFile');
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('excel_file', file);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('File uploaded successfully');
                    } else {
                        alert('Error uploading file');
                    }
                }
            };

            xhr.open('POST', 'caseupload.php');
            xhr.send(formData);
        }
    </script>

</body>

</html>