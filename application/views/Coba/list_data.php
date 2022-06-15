<?php
$no = 1;
foreach ($dataSasaran as $row) {
    ?>
    <tr>
        <td style="width: 10px"><?php echo $no++; ?></td>
        <td><?php echo $row->nik; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td><?php echo tgl_indo($row->tgl_lahir, false); ?></td>
        <td><?php echo $row->jenkel; ?></td>
        <td><?php echo $row->hp; ?></td>
        <td class="text-center" style="width:150px;">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
                <button class="btn btn-sm btn-warning update-dataSasaran" data-id="<?php echo $row->id; ?>"><i class="feather icon-edit-2"></i> Edit</button>
                <button class="btn btn-sm btn-danger konfirmasiHapus-sasaran" data-id="<?php echo $row->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="feather icon-x"></i> Delete</button>
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