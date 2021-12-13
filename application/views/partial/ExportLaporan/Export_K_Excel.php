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

      <h5>Tabel Mahasiswa</h5>
      <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Jenis Kebutuhan</th>
                          <th>Permintaan</th>
                          <th>Nama Lengkap</th>
                          <th>NIM</th>
                          <th>Fakultas</th>
                          <th>Prodi</th>
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
                     <?php $i=1; foreach($Mahasiswa as $Mahasiswa) { ?>
                     <tr>
                          <td><?php echo $Mahasiswa->type; ?></td>
                          <td><?php echo $Mahasiswa->nama_kebutuhan; ?></td>
                          <td><?php echo $Mahasiswa->nama; ?></td>
                          <td><?php echo $Mahasiswa->nim; ?></td>
                          <td><?php echo $Mahasiswa->nama_fakultas; ?></td>
                          <td><?php echo $Mahasiswa->nama_prodi; ?></td>
                          <td><?php echo $Mahasiswa->jenis_kelamin; ?></td>
                          <td><?php echo $Mahasiswa->nama_bidang; ?></td>
                          <td><?php echo $Mahasiswa->alamat; ?></td>
                          <td><?php echo $Mahasiswa->no_handphone; ?></td>
                          <td><?php echo $Mahasiswa->email; ?></td>
                          <td><?php echo $Mahasiswa->tgl_pengajuan; ?></td>
                          <td><?php echo $Mahasiswa->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
           </table>
           <br>
           <h5>Tabel Dosen</h5>
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
                     <?php $i=1; foreach($Dosen as $Dosen) { ?>
                     <tr>
                          <td><?php echo $Dosen->type; ?></td>
                          <td><?php echo $Dosen->nama_kebutuhan; ?></td>
                          <td><?php echo $Dosen->nama; ?></td>
                          <td><?php echo $Dosen->nip; ?></td>
                          <td><?php echo $Dosen->jenis_kelamin; ?></td>
                          <td><?php echo $Dosen->nama_bidang; ?></td>
                          <td><?php echo $Dosen->alamat; ?></td>
                          <td><?php echo $Dosen->no_handphone; ?></td>
                          <td><?php echo $Dosen->email; ?></td>
                          <td><?php echo $Dosen->tgl_pengajuan; ?></td>
                          <td><?php echo $Dosen->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
            </table>
            <br>
            <h5>Tabel Staff</h5>
            <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Jenis Kebutuhan</th>
                          <th>Permintaan</th>
                          <th>Nama Lengkap</th>
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
                     <?php $i=1; foreach($Staff as $Staff) { ?>
                     <tr>
                          <td><?php echo $Staff->type; ?></td>
                          <td><?php echo $Staff->nama_kebutuhan; ?></td>
                          <td><?php echo $Staff->nama; ?></td>
                          <td><?php echo $Staff->jenis_kelamin; ?></td>
                          <td><?php echo $Staff->nama_bidang; ?></td>
                          <td><?php echo $Staff->alamat; ?></td>
                          <td><?php echo $Staff->no_handphone; ?></td>
                          <td><?php echo $Staff->email; ?></td>
                          <td><?php echo $Staff->tgl_pengajuan; ?></td>
                          <td><?php echo $Staff->status; ?></td>
                     </tr>
                     <?php $i++; } ?>
                </tbody>
            </table>