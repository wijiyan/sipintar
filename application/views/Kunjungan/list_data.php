<?php
$no = 1;
foreach ($Kunjungan as $row) {
    ?>
    <tr>
        <td style="width: 10px"><?php echo $no++; ?></td>
        <td><?php echo $row->nik; ?></td>
        <td><?php echo $row->nama_ibu; ?></td>
        <td><a target="_blank" href="https://wa.me/62<?php echo substr($row->hp, 1);?>"><?php echo $row->hp;?></a></td>
        <td><?php echo $row->wilayah; ?></td>
        <td>
            J : <?php if(!empty($row->jd_kn1)) { echo TanggalIndonesia($row->jd_kn1); } ?><br>
            K : <?php if(!empty($row->tgl_kn1)) { echo TanggalIndonesia($row->tgl_kn1); } ?>
        </td>
        <td>
            J : <?php if(!empty($row->jd_kn2)) { echo TanggalIndonesia($row->jd_kn2); } ?><br>
            K : <?php if(!empty($row->tgl_kn2)) { echo TanggalIndonesia($row->tgl_kn2); } ?>
        </td>
        <td>
            J : <?php if(!empty($row->jd_kn3)) { echo TanggalIndonesia($row->jd_kn3); } ?><br>
            K : <?php if(!empty($row->tgl_kn3)) { echo TanggalIndonesia($row->tgl_kn3); } ?>
        </td>
        <td>
            J : <?php if(!empty($row->jd_kn4)) { echo TanggalIndonesia($row->jd_kn4); } ?><br>
            K : <?php if(!empty($row->tgl_kn4)) { echo TanggalIndonesia($row->tgl_kn4); } ?>
        </td>
        <td class="text-center" style="width:150px;">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
                <button class="btn btn-sm btn-warning update-kunjungan" data-id="<?php echo $row->id; ?>"><i class="feather icon-edit-2"></i> Edit</button>
                <!-- <button class="btn btn-sm btn-danger konfirmasiHapus-kunjungan" data-id="<?php echo $row->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="feather icon-x"></i> Delete</button> -->
            </div>
        </td>
    </tr>
    <?php
}

function tgl_indo($tanggal, $cetak_hari = true)
{
    $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
} 

function TanggalIndonesia($date) {
    if($date == '0000-00-00')
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