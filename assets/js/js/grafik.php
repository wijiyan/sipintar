<script>

  $(window).on("load", function () {

    var $primary = '#7367F0';
    var $success = '#28C76F';
    var $danger = '#EA5455';
    var $warning = '#FF9F43';
    var $label_color = '#1E1E1E';
    var grid_line_color = '#dae1e7';
    var scatter_grid_color = '#f3f3f3';
    var $scatter_point_light = '#D1D4DB';
    var $scatter_point_dark = '#5175E0';
    var $white = '#fff';
    var $black = '#000';

    var themeColors = [$primary, $success, $danger, $warning, $label_color, $warning, $primary, $success, $danger, $warning, $label_color, $warning];

// Bar Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var barChartctx = $("#bar-chart");

  // Chart Options
  var barchartOptions = {
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each bar to be 2px wide
    elements: {
      rectangle: {
        borderWidth: 2,
        borderSkipped: 'left'
      }
    },
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    legend: { display: false },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        },
        ticks: {
          stepSize: 50
        },
      }],
    },
    title: {
      display: true,
      text: 'Kasus Positif'
    },

  };





  // Chart Data
  <?php $data = $this->db->query('SELECT count(id) as `test`, tgl_pelaporan FROM tbl_pelaporan WHERE hasil_swab = "POSITIF" GROUP BY tgl_pelaporan ORDER BY id ASC');?>
  <?php //$data2 = $this->db->query('SELECT count(id) as `pos`, tgl_pelaporan FROM tbl_pelaporan WHERE hasil_swab = "POSITIF" GROUP BY tgl_pelaporan ORDER BY id ASC');?>
  const labels = [
  <?php foreach ($data->result() as $row){
   echo '"'.$row->tgl_pelaporan.'", ';
 } ?>
 ];
 const backgroundcolor = [];
 for (i = 0; i < labels.length; i++){
  const r = Math.floor(Math.random() * 255);
  const g = Math.floor(Math.random() * 255);
  const b = Math.floor(Math.random() * 255);
  console.log('rgba('+r+', '+g+', '+b+')');
  backgroundcolor.push('rgba('+r+', '+g+', '+b+')');
}

var barchartData = {
  labels: [
  <?php foreach ($data->result() as $row){
    echo '"'.$row->tgl_pelaporan.'", ';
  } ?>
  ],
  datasets: [
  // {
  //   label: "Positif Rate",
  //   data: [<?php //foreach ($data2->result() as $row){ echo $row->pos.', '; } ?>],
  //   //backgroundColor: backgroundcolor,
  //   borderColor: "#EA5455",
  //   type: 'line',
  //   order: 1
  // },
  {
    label: "Kasus Positif",
    data: [<?php foreach ($data->result() as $row){ echo $row->test.', '; } ?>],
    backgroundColor: backgroundcolor,
    borderColor: "transparent",
    order: 0
  }
  ]
};

var barChartconfig = {
  type: 'bar',

    // Chart Options
    options: barchartOptions,

    data: barchartData
  };

  // Create the chart
  var barChart = new Chart(barChartctx, barChartconfig);
  


// Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  //var lineChartctx = $("#line-chart");

  // Chart Options
  // var linechartOptions = {
  //   responsive: true,
  //   maintainAspectRatio: false,
  //   legend: {
  //     position: 'top',
  //   },
  //   hover: {
  //     mode: 'label'
  //   },
  //   scales: {
  //     xAxes: [{
  //       display: true,
  //       gridLines: {
  //         color: grid_line_color,
  //       },
  //       scaleLabel: {
  //         display: true,
  //       }
  //     }],
  //     yAxes: [{
  //       display: true,
  //       gridLines: {
  //         color: grid_line_color,
  //       },
  //       scaleLabel: {
  //         display: true,
  //       }
  //     }]
  //   },
  //   title: {
  //     display: true,
  //     text: 'Grafik Pelaporan'
  //   }
  // };

  // Chart Data
  // var linechartData = {
  //   labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus', 'September', 'Oktober', 'November', 'Desember'],
  //   datasets: [{
  //     label: "PELAPORAN MASUK",
  //     data: [
  //     <?php 
  //     for ($i=1; $i <= date('m'); $i++) { 

  //       $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
  //         WHERE
  //         MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan)');

  //       echo $total_kunjungan->num_rows()." ,";
  //     }?>
  //     ],
  //     borderColor: $primary,
  //     fill: false
  //   }, {
  //     data: [
  //     <?php 
  //     for ($i=1; $i <= date('m'); $i++) { 

  //       $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
  //         WHERE hasil_swab = "POSITIF" AND
  //         (MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan))');

  //       echo $total_kunjungan->num_rows()." ,";
  //     }?>
  //     ],
  //     label: "POSITIF",
  //     borderColor: $danger,
  //     fill: false
  //   }, {
  //     data: [
  //     <?php 
  //     for ($i=1; $i <= date('m'); $i++) { 

  //       $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
  //         WHERE hasil_swab = "NEGATIF" AND
  //         MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan)');

  //       echo $total_kunjungan->num_rows()." ,";
  //     }?>
  //     ],
  //     label: "NEGATIF",
  //     borderColor: $success,
  //     fill: false
  //   }, {
  //     data: [
  //     <?php 
  //     for ($i=1; $i <= date('m'); $i++) { 

  //       $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
  //         WHERE status_pantau = "Meninggal" AND
  //         MONTH(tgl_selesai_pantau) = '.$i.' AND YEAR(tgl_selesai_pantau)');

  //       echo $total_kunjungan->num_rows()." ,";
  //     }?>
  //     ],
  //     label: "Meninggal",
  //     borderColor: $warning,
  //     fill: false
  //   }]
  // };


  //Chart Data
 //  <?php //$data = $this->db->query('SELECT count(id) as `test`, tgl_pelaporan FROM tbl_pelaporan GROUP BY tgl_pelaporan ORDER BY id DESC');?>
 //  var linechartData = {
 //    labels: [
 //    <?php //foreach ($data->result() as $row){
 //      echo '"'.$row->tgl_pelaporan.'", ';
 //    } ?>
 //    ],
 //    datasets: [{
 //      label: "PELAPORAN MASUK",
 //      data: [
 //      <?php //foreach ($data->result() as $row){
 //       echo $row->test.', ';
 //     } ?>
 //     ],
 //     borderColor: $primary,
 //     fill: false
 //   }]
 // };

 // var lineChartconfig = {
 //  type: 'line',

 //    // Chart Options
 //    options: linechartOptions,

 //    data: linechartData
 //  };

 //  // Create the chart
 //  var lineChart = new Chart(lineChartctx, lineChartconfig);



 // Pie Chart
  // --------------------------------


  //Get the context of the Chart canvas element we want to select
  var pieChartctx = $("#status-chart");

  // Chart Options
  var piechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    title: {
      display: true,
      text: 'Distribusi Kasus Covid-19'
    }
  };

  // Chart Data
  var piechartData = {
    labels: [ "Rawat", "Sembuh", "Isolasi Mandiri", "Meninggal"],
    datasets: [{
      label: "My First dataset",
      data: [
      <?php 
      echo $total_rawat.", ".$total_sembuh.", ".$total_isoman.", ".$total_meninggal;
      ?>
      ],
      backgroundColor: themeColors,
    }]
  };

  var pieChartconfig = {
    type: 'pie',

    // Chart Options
    options: piechartOptions,

    data: piechartData
  };

  // Create the chart
  var pieSimpleChart = new Chart(pieChartctx, pieChartconfig);


  // var pieChartcty = $("#wilayah-chart");

  // // Chart Options
  // var piechartOptions = {
  //   responsive: true,
  //   maintainAspectRatio: false,
  //   responsiveAnimationDuration: 500,
  //   title: {
  //     display: true,
  //     text: 'Kasus/Wilayah'
  //   }
  // };

  // // Chart Data
  // var piechartWilayah = {
  //   labels: [ "Cempaka Putih Barat", "Cempaka Putih Timur", "Rawasari"],
  //   datasets: [{
  //     label: "Kasus Per Wilayah",
  //     data: [
  //     <?php 
  //     $this->db->select('*');
  //     $this->db->from('tbl_sasaran');
  //     $this->db->join('tbl_pelaporan', 'tbl_sasaran.nik = tbl_pelaporan.nik', 'right');
  //     $this->db->where('tbl_sasaran.kel_domisili', 'Cempaka Putih Barat');
  //     echo $this->db->get()->num_rows().", ";

  //     $this->db->select('*');
  //     $this->db->from('tbl_sasaran');
  //     $this->db->join('tbl_pelaporan', 'tbl_sasaran.nik = tbl_pelaporan.nik', 'right');
  //     $this->db->where('tbl_sasaran.kel_domisili', 'Cempaka Putih Timur');
  //     echo $this->db->get()->num_rows().", ";

  //     $this->db->select('*');
  //     $this->db->from('tbl_sasaran');
  //     $this->db->join('tbl_pelaporan', 'tbl_sasaran.nik = tbl_pelaporan.nik', 'right');
  //     $this->db->where('tbl_sasaran.kel_domisili', 'Rawasari');
  //     echo $this->db->get()->num_rows().", ";
  //     ?>
  //     ],
  //     backgroundColor: themeColors,
  //   }]
  // };

  // var pieChartconfig = {
  //   type: 'pie',

  //   // Chart Options
  //   options: piechartOptions,

  //   data: piechartWilayah
  // };

  // // Create the chart
  // var pieWilayahChart = new Chart(pieChartcty, pieChartconfig);

});
</script>