<!DOCTYPE html>
<html>
<head>
  <title>Laporan Kunjungan</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      border-radius: 5px;
      font-family: 'arial';
      font-size:8;
    }

    .short{
      width: 50px;
    }

    .normal{
      width: 150px;
    }

    .long{
      width: 250px;
    }

    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }

    thead th{
      text-align: left;
      padding: 5px;
    }

    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 5px;
    }

    tbody tr:nth-child(even){
      background: #F6F5FA;
    }

    tbody tr:hover{
      background: 
    }
  </style>
</head>
<center><h3>Laporan Kunjungan</h3></center>
<body>
  <div id="outtable">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>No HP</th>
          <th>Jadwal KN1</th>
          <th>Kunjugnan KN1</th>
          <th>Jadwal KN2</th>
          <th>Kunjugnan KN2</th>
          <th>Jadwal KN3</th>
          <th>Kunjugnan KN3</th>
          <th>Jadwal KN4</th>
          <th>Kunjugnan KN4</th>
        </tr>
      </tr>
    </thead>
    <tbody>
      <?php 
      $data = $this->input->post();
      $no=1;
      foreach ($isi->result() as $row){ ?>
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $row->nik;?></td>
          <td><?php echo $row->nama_ibu;?></td>
          <td><?php echo $row->hp;?></td>
          <td style="color: red"><?php echo TanggalIndonesia($row->jd_kn1);?></td>
          <td style="color: green"><?php echo TanggalIndonesia($row->tgl_kn1);?></td>
          <td style="color: red"><?php echo TanggalIndonesia($row->jd_kn2);?></td>
          <td style="color: green"><?php echo TanggalIndonesia($row->tgl_kn2);?></td>
          <td style="color: red"><?php echo TanggalIndonesia($row->jd_kn3);?></td>
          <td style="color: green"><?php echo TanggalIndonesia($row->tgl_kn3);?></td>
          <td style="color: red"><?php echo TanggalIndonesia($row->jd_kn4);?></td>
          <td style="color: green"><?php echo TanggalIndonesia($row->tgl_kn4);?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php

function TanggalIndonesia($date) {
    if($date == '0000-00-00' OR $date == '')
    return '-';
    
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);
    
    switch ($bln) {
        case 1 : {
            $bln = 'Jan';
        }break;
        case 2 : {
            $bln = 'Feb';
        }break;
        case 3 : {
            $bln = 'Mar';
        }break;
        case 4 : {
            $bln = 'Apr';
        }break;
        case 5 : {
            $bln = 'Mei';
        }break;
        case 6 : {
            $bln = "Jun";
        }break;
        case 7 : {
            $bln = 'Jul';
        }break;
        case 8 : {
            $bln = 'Agu';
        }break;
        case 9 : {
            $bln = 'Sept';
        }break;
        case 10 : {
            $bln = 'Okt';
        }break;
        case 11 : {
            $bln = 'Nov';
        }break;
        case 12 : {
            $bln = 'Des';
        }break;
        default: {
            $bln = 'UnKnown';
        }break;
    }
    
    
    $tanggalIndonesia = $tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}

?>
</body>
</html>