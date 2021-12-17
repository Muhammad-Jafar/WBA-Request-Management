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
                <b style="font-size:25px;">Direktorat Pengembangan Sumber Daya Manusia</b>
                <br>
                <i style="font-size:20px;">Jalan Raya Olat Maras, Batu Alang, Sumbawa Besar - NTB</i>
              </h3>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>
      <h4 style="text-align:center">KOLEKSI DATA KELUHAN</h4>
    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>

    <div class="page-content">
      <p><a href="<?php echo base_url('laporan/exportk_excel') ?>"> <b>Export ke Excel</b></a></p>
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
                          <td><?php echo $Dosentetap->keluhan; ?></td>
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
                          <td><?php echo $Dosensks->keluhan; ?></td>
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
                          <td><?php echo $Tedik->keluhan; ?></td>
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
                          <td><?php echo $Tepen->keluhan; ?></td>
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
    </div>
  </div>  
</body>
</html>