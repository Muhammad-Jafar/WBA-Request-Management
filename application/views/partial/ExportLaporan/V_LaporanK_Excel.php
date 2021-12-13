<html>
<head>
<meta charset="UTF-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
<title> <?= $title; ?> </title> 
<style>
  @media print{.no-print,.no-print *{display:none!important}}
  @font-face {
    font-family: 'Tim New Roman';
    font-style: normal;
    font-weight: 400;
    src: url('https://s3-us-west-2.amazonaws.com/lob-assets/timesnewroman.ttf') format('truetype');
  }

  *, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  ::selection { background-color: #E13300; color: white; }
  ::-moz-selection { background-color: #E13300; color: white; }

  body {
    /* width: 11in; */
    margin: auto;  
    padding: 0;
    font-family: 'Times New Roman';
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  .page-portrait {
    page-break-after: always;
    visibility: visible;
    padding: .5rem;
  }


  .page-content {
    margin-left: 5rem;
    margin-right: 5rem;
    
  }

  .wrapper {
    position: absolute;
    top: 0in;
  }

  .signature {
    font-family: 'Times New Roman',;
    font-size: 20px;
  }

  main {
  width: 80%;
  padding: 20px;
  background-color: white;
  min-height: 300px;
  border-radius: 5px;
  margin: 30px auto;
  box-shadow: 0 0 8px #D0D0D0;
  }
  table {
  border-top: solid thin #000;
  border-collapse: collapse;
  }
  th, td {
  border-top: border-top: solid thin #000;
  padding: 6px 12px;
  }
 
   a {
  color: #003399;
  background-color: transparent;
  font-weight: normal;
  }

</style>
</head>
<body onload="window.print();">
  <div class="page-landscape">
    <div id="header">
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
      </table>
    </div>

    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>
      <h4 style="text-align:center">KOLEKSI DATA KEBUTUHAN</h4>
    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>

    <div class="page-content">
      <p><a href="<?php echo base_url('laporan/exportk_excel') ?>"> <b>Export ke Excel</b></a></p>
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
    </div>
  </div>  
</body>
</html>