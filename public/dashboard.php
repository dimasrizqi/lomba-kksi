<?php 
//index.php
require('db_connect.php');
// $query = "SELECT * FROM fyp ORDER BY id DESC LIMIT 10";
//query CIP
$query = "SELECT * FROM fyp WHERE id_sensor = 'CIP' AND channel = '1' ORDER BY time DESC LIMIT 20 ";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ time:'".$row["time"]."', analog_read:".($row["analog_read"])."}, ";
}
$chart_data = substr($chart_data, 0, -2);

//query Production
$query_Production = "SELECT * FROM fyp WHERE id_sensor = 'Production' AND channel = '1' ORDER BY time DESC LIMIT 20 ";
$result_Production = mysqli_query($conn, $query_Production);
$chart_data_Production = '';
while($row = mysqli_fetch_array($result_Production))
{
 $chart_data_Production .= "{ time:'".$row["time"]."', analog_read:".$row["analog_read"]."}, ";
}
$chart_data_Production = substr($chart_data_Production, 0, -2);

//query Sterilization
$query_Sterilization = "SELECT * FROM fyp WHERE id_sensor = 'Sterilization' AND channel = '1' ORDER BY time DESC LIMIT 20 ";
$result_Sterilization = mysqli_query($conn, $query_Sterilization);
$chart_data_Sterilization = '';
while($row = mysqli_fetch_array($result_Sterilization))
{
 $chart_data_Sterilization .= "{ time:'".$row["time"]."', analog_read:".$row["analog_read"]."}, ";
}
$chart_data_Sterilization = substr($chart_data_Sterilization, 0, -2);

//query Load_Cell_Tank_1
$query_Load_Cell_Tank_1 = "SELECT * FROM fyp WHERE id_sensor = 'Load Cell Tank 1' AND channel = '1' ORDER BY time DESC LIMIT 20 ";
$result_Load_Cell_Tank_1 = mysqli_query($conn, $query_Load_Cell_Tank_1);
$chart_data_Load_Cell_Tank_1 = '';
while($row = mysqli_fetch_array($result_Load_Cell_Tank_1))
{
 $chart_data_Load_Cell_Tank_1 .= "{ time:'".$row["time"]."', analog_read:".$row["analog_read"]."}, ";
}
$chart_data_Load_Cell_Tank_1 = substr($chart_data_Load_Cell_Tank_1, 0, -2);

//query Load_Cell_Tank_2
$query_Load_Cell_Tank_2 = "SELECT * FROM fyp WHERE id_sensor = 'Load Cell Tank 2' AND channel = '1' ORDER BY time DESC LIMIT 20 ";
$result_Load_Cell_Tank_2 = mysqli_query($conn, $query_Load_Cell_Tank_2);
$chart_data_Load_Cell_Tank_2 = '';
while($row = mysqli_fetch_array($result_Load_Cell_Tank_2))
{
 $chart_data_Load_Cell_Tank_2 .= "{ time:'".$row["time"]."', analog_read:".$row["analog_read"]."}, ";
}
$chart_data_Load_Cell_Tank_2 = substr($chart_data_Load_Cell_Tank_2, 0, -2);

?>




<!DOCTYPE html>
<html>
<head>
  <title>Graphs</title>
  <!-- <meta http-equiv="refresh" content="1">-->


  
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
</head>
<body>
  <h2 class="text-center">Mixing Machine Monitoring - PT. Futami Food & Beverages </h2>
  <div class="container">
    <div class="row ">
      <div class="col">
        <p>Status Mesin</p>
        <!-- <?php 
        $query_status_Production = "SELECT * FROM fyp WHERE id_sensor = 'Production' AND channel = '1' ORDER BY time DESC LIMIT 1 ";
        $result_status_Production = mysqli_query($conn, $query_status_Production);
        $chart_status_data_Production = '';
        while($row = mysqli_fetch_array($result_status_Production))
        {
         // $chart_data_Production .= "{ time:'".$row["time"]."', analog_read:".$row["analog_read"]."}, ";
         if ($row["analog_read"]>=500) {
            # code...
          ?> <button class = "btn btn-success btn-sm"><a href = "index.php" style = "text-decoration: none; color: #333;">Produksi Sedang Berjalan <?php echo $row["time"]?> </a></button> <?php
          } else{
            ?> <button class = "btn btn-danger btn-sm"><a href = "index.php" style = "text-decoration: none; color: #333;">Tidak Ada Produksi <?php echo $row["time"]?></a></button><?php
          }
         
       }
       ?> -->
      <button class="btn btn-warning btn-sm"><a href="index.php" style="text-decoration: none; color: #333;">Tidak ada produksi pada tanggal 2020-06-30</a></button>
       <br><br>
    <button class="btn btn-success btn-sm"><a href="index.php" style="text-decoration: none; color: #333;">lama waktu produksi pada tanggal 2020-06-26 10 Jam</a></button>
    <br><br>
    <button class="btn btn-danger btn-sm"><a href="index.php" style="text-decoration: none; color: #333;">lama waktu downtime pada tanggal 2020-06-26 2 Jam</a></button><br><br>
    <button class="btn btn-info btn-sm"><a href="index.php" style="text-decoration: none; color: #333;">Berat Pada Tank 1 12000 Kg</a></button><br><br>
    <button class="btn btn-info btn-sm"><a href="index.php" style="text-decoration: none; color: #333;">Berat Pada Tank 1 8000 Kg</a></button>
    </div>
    <div class="col">
      <p>Grafik Production</p>
      <div class="bg-light" id="Production"></div>
    </div>

  </div>
  <div class="row ">
    <div class="col">
      <p>Grafik CIP</p>
      <div class="bg-light" id="CIP"></div>
    </div>
    <div class="col ">
      <p>Grafik Sterilization</p>
      <div class="bg-light"  id="Sterilization"></div>
    </div>
    <!-- <div class="w-100"></div> -->
    <div class="col">
      <p>Grafik Load Cell Tank 2</p>
      <div class="bg-light" id="Load_Cell_Tank_1"></div>
    </div>
    <div class="col">
      <p>Load Cell Tank 2</p>
      <div class="bg-light" id="Load_Cell_Tank_2"></div>
    </div>
  </div>
</div>



</body>
</html>
<script type="text/javascript">
  setInterval(function(){
    document.getElementById('CIP').innerHTML;
    document.getElementById('Production').innerHTML ;    
  }, 100);
</script>

<script>
  Morris.Line({
   element : 'CIP',
   data:[<?php echo $chart_data; ?>],
   xkey:'time',
   ykeys:['analog_read'],
   labels:['Status'],
   hideHover:'auto',
   lineColors:['blue'],
   lineType:'Smooth'
 });
</script>
<script>
  Morris.Line({
   element : 'Production',
   data:[<?php echo $chart_data_Production; ?>],
   xkey:'time',
   ykeys:['analog_read'],
   labels:['Status'],
   hideHover:'auto',
   lineColors:['purple'],
   lineType:'Smooth'
 });
</script>

<script>
  Morris.Line({
   element : 'Sterilization',
   data:[<?php echo $chart_data_Sterilization; ?>],
   xkey:'time',
   ykeys:['analog_read'],
   labels:['Status'],
   hideHover:'auto',
   lineColors:['red'],
   lineType:'Smooth'
 });
</script>

<script>
  Morris.Line({
    element : 'Load_Cell_Tank_1',
    data:[<?php echo $chart_data_Load_Cell_Tank_1; ?>],
    xkey:'time',
    ykeys:['analog_read'],
    labels:['Status'],
    hideHover:'auto',
    lineColors:['green'],
    lineType:'Smooth'
  });
</script>

<script>
  Morris.Line({
    element : 'Load_Cell_Tank_2',
    data:[<?php echo $chart_data_Load_Cell_Tank_2; ?>],
    xkey:'time',
    ykeys:['analog_read'],
    labels:['Status'],
    hideHover:'auto',
    lineColors:['violet'],
    lineType:'Smooth'
  });
</script>
