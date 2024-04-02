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
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
                <p>Cases Assigned Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>53<sup style="font-size: 20px"></sup></h3>
                <p>Cases Solved Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>59</h3>
                <p>Technicians Present Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>65</h3>
                <p>Wep Cases</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
        </div><!-- /.row -->




        <!-- Main row -->
        <div class="row">
      

          <section class="col-lg-12 connectedSortable">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Case Details</h3>
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
                        $sql = "SELECT id, brand_name, case_type, date_attempted, region, city, case_number, vin_number, engineer_name, parts_taken_from, action_taken, final_status, remarks, location_type, from_location, customer_location, total_km, home_or_ec, jb_number, rectified_by_ecl, rectified_by_finance_team, note FROM worksheet";
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
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</section>

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- Map box -->
            <div class="box box-solid bg-light-blue-gradient">
              <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                  <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->

                <i class="fa fa-map-marker"></i>
                <h3 class="box-title">
                  Active Technicians
                </h3>
              </div>
              <div class="box-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div><!-- /.box-body-->
              <div class="box-footer no-border">
                <div class="row">
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-1"></div>
                    <div class="knob-label">Total</div>
                  </div><!-- ./col -->
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-2"></div>
                    <div class="knob-label">Online</div>
                  </div><!-- ./col -->
                  <div class="col-xs-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="knob-label">Offline</div>
                  </div><!-- ./col -->
                </div><!-- /.row -->
              </div>
            </div>
            <!-- /.box -->

          </section><!-- right col -->
           <!-- Left col -->
           <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
              <!-- Tabs within a box -->
              <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                <!-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> -->
                <li class="pull-left header"><i class="fa fa-inbox"></i> Today's Performance</li>
              </ul>
              <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
              </div>
            </div><!-- /.nav-tabs-custom -->

          </section>
          
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

</body>

</html>