<html>
<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
<!--  
      <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody>
          <tr>
            <td width="10%" class="center">
              <img src="<?=assets_url('logo.png', false);?>" style="width:100px"/>
            </td>
            <td class="center">
              <h3 style="text-align:center; font-family: 'Times New Roman', Times, serif;">
                <b style="font-size:27px;">UNIVERSITAS TEKNOLOGI SUMBAWA</b>
                <br>
                <b style="font-size:25px;">Bidang Pengembangan Sumber Daya Manusia</b>
                <br>
                <i style="font-size:20px;">Jalan Raya Olat Maras, Batu Alang, Sumbawa Besar - NTB</i>
              </h3>
            </td>
          </tr>
        </tbody>
      </table> -->

    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>
      <h4 style="text-align:center">KOLEKSI DATA KEBUTUHAN</h4>
    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>

    <h5>Tabel Dosen Tetap</h5>
      <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Jenis Kebutuhan</th>
                          <th>Permintaan</th>
                          <th>Nama Lengkap</th>
                          <th>NIDN / NIP</th>
                          <th>Jenis Kelamin</th>
                          <th>Status Civitas</th>
                          <th>Alamat</th>
                          <th>Kontak</th>
                          <th>Email</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status</th>
                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($Dosentetap as $Dosentetap) { ?>
                     <tr>
                          <td><?php echo $Dosentetap->type; ?></td>
                          <td><?php echo $Dosentetap->nama_kebutuhan; ?></td>
                          <td><?php echo $Dosentetap->nama; ?></td>
                          <td><?php echo $Dosentetap->nip; ?></td>
                          <td><?php echo $Dosentetap->jenis_kelamin; ?></td>
                          <td><?php echo $Dosentetap->nama_bidang; ?></td>
                          <td><?php echo $Dosentetap->alamat; ?></td>
                          <td><?php echo $Dosentetap->no_handphone; ?></td>
                          <td><?php echo $Dosentetap->email; ?></td>
                          <td><?php echo $Dosentetap->tgl_pengajuan; ?></td>
                          <td><?php echo $Dosentetap->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
           </table>
           <br>
           <h5>Tabel Dosen SKS</h5>
            <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Jenis Kebutuhan</th>
                          <th>Permintaan</th>
                          <th>Nama Lengkap</th>
                          <th>NIDN / NIP</th>
                          <th>Jenis Kelamin</th>
                          <th>Status Civitas</th>
                          <th>Alamat</th>
                          <th>Kontak</th>
                          <th>Email</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status</th>
                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($Dosensks as $Dosensks) { ?>
                     <tr>
                          <td><?php echo $Dosensks->type; ?></td>
                          <td><?php echo $Dosensks->nama_kebutuhan; ?></td>
                          <td><?php echo $Dosensks->nama; ?></td>
                          <td> - </td>
                          <td><?php echo $Dosensks->jenis_kelamin; ?></td>
                          <td><?php echo $Dosensks->nama_bidang; ?></td>
                          <td><?php echo $Dosensks->alamat; ?></td>
                          <td><?php echo $Dosensks->no_handphone; ?></td>
                          <td><?php echo $Dosensks->email; ?></td>
                          <td><?php echo $Dosensks->tgl_pengajuan; ?></td>
                          <td><?php echo $Dosensks->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
            </table>
            <br>
            <h5>Tabel Tenaga Pendidik</h5>
            <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Jenis Kebutuhan</th>
                          <th>Permintaan</th>
                          <th>Nama Lengkap</th>
                          <th>NIP</th>
                          <th>Jenis Kelamin</th>
                          <th>Status Civitas</th>
                          <th>Alamat</th>
                          <th>Kontak</th>
                          <th>Email</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status</th>
                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($Tedik as $Tedik) { ?>
                     <tr>
                          <td><?php echo $Tedik->type; ?></td>
                          <td><?php echo $Tedik->nama_kebutuhan; ?></td>
                          <td><?php echo $Tedik->nama; ?></td>
                          <td><?php echo $Tedik->nip; ?></td>
                          <td><?php echo $Tedik->jenis_kelamin; ?></td>
                          <td><?php echo $Tedik->nama_bidang; ?></td>
                          <td><?php echo $Tedik->alamat; ?></td>
                          <td><?php echo $Tedik->no_handphone; ?></td>
                          <td><?php echo $Tedik->email; ?></td>
                          <td><?php echo $Tedik->tgl_pengajuan; ?></td>
                          <td><?php echo $Tedik->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
            </table>
            <br>
            <h5>Tabel Tenaga Penunjang</h5>
            <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Jenis Kebutuhan</th>
                          <th>Permintaan</th>
                          <th>Nama Lengkap</th>
                          <th>NITK / NIP</th>
                          <th>Jenis Kelamin</th>
                          <th>Status Civitas</th>
                          <th>Alamat</th>
                          <th>Kontak</th>
                          <th>Email</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status</th>
                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($Tepen as $Tepen) { ?>
                     <tr>
                          <td><?php echo $Tepen->type; ?></td>
                          <td><?php echo $Tepen->nama_kebutuhan; ?></td>
                          <td><?php echo $Tepen->nama; ?></td>
                          <td><?php echo $Tepen->nik; ?></td>
                          <td><?php echo $Tepen->jenis_kelamin; ?></td>
                          <td><?php echo $Tepen->nama_bidang; ?></td>
                          <td><?php echo $Tepen->alamat; ?></td>
                          <td><?php echo $Tepen->no_handphone; ?></td>
                          <td><?php echo $Tepen->email; ?></td>
                          <td><?php echo $Tepen->tgl_pengajuan; ?></td>
                          <td><?php echo $Tepen->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
            </table>