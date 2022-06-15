<?php
$no = 1;
foreach ($dataIbu as $row) {
    ?>
    <tr>
        <td style="width: 10px"><?php echo $no++; ?></td>
        <td><a href="<?php echo base_url('Pelaporan/NIK/'.$row->nik);?>"><?php echo $row->nik; ?></a></td>
        <td><?php echo $row->no_rm; ?></td>
        <td><?php echo $row->nama_ibu; ?></td>
        <td><?php echo $row->alamat; ?></td>
        <td><?php echo $row->tpt_persalinan; ?></td>
        <td><a target="_blank" href="https://wa.me/62<?php echo substr($row->hp, 1);?>"><?php echo $row->hp;?></a></td>
        <td><?php echo $row->wilayah; ?></td>
        <td class="text-center" style="width:150px;">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
                <button class="btn btn-sm btn-warning update-dataIbu" data-id="<?php echo $row->id; ?>"><i class="feather icon-edit-2"></i> Edit</button>
                <button class="btn btn-sm btn-danger konfirmasiHapus-ibu" data-id="<?php echo $row->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="feather icon-x"></i> Delete</button>
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
} ?>