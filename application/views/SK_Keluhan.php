<html>
<head>
<meta charset="UTF-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
<title>Surat Keterangan</title>
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

  body {
    width: 8.5in;
    margin: auto;  
    padding: 0;
    font-family: 'Times New Roman';
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

</style>
</head>
<body>
  <div class="page-portrait">
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
      <h4 style="text-align:center">SURAT PENGAJUAN KELUHAN</h4>
    <hr height="2" width="90%" color="#000000" border-style="inset" border-width="3px"/>

    <div class="page-content">
      <P style="text-align:right; font-size: 15px;">Sumbawa, <?= $tanggal; ?> </P>
      <div align="left">
        <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr> 
              <td width="15%">Nomor</td>
              <td width="70%">: 0<?=$id;?> / Pengajuan Keluhan / <?=date('Y');?></td>
            </tr>
            <tr> 
              <td width="15%">Perihal</td>
              <td width="70%">: Keluhan <?=$type_id;?></td>
            </tr>
          </table>
        </td>
      </div>
      <br>
      <br>
      <div align="left">
      <td> 
        Kepada Yth, 
        <br>
        Kepala Bidang PSDM UTS 
        <br>
        Di Tempat 
        <br>
      </td>
      <br><br><br>
      <td>Yang bertanda tangan dibawah ini :<br></td>
      <td> 
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr><td>&nbsp;</td></tr>
          <tr> 
            <td width="1%">&nbsp;</td>
            <td width="29%">Nama Pemohon</td>
            <td width="70%">:&nbsp; <b> <?=($data->nama);?> </b> </td>
            <!-- <td width="70%">:&nbsp; <b> <?=strtoupper($data->nama);?> </b> </td> -->
          </tr>
            <tr> 
            <td width="1%">&nbsp;</td>
            <td width="29%">Status Civitas</td>
            <td width="70%">:&nbsp; <?=$data->nama_bidang;?></td>
          </tr>
          <tr>
            <td width="1%">&nbsp;</td>
            <td width="29%">Alamat Pemohon</td>
            <td width="70%" valign="top">:&nbsp; <?=$data->alamat;?></td>
          </tr>
          <tr>
            <td width="1%">&nbsp;</td>
            <td width="29%">Kategori Keluhan</td>
            <td width="70%" valign="top">:&nbsp; <?=$data->type;?></td>
          </tr>
          <tr>
            <td width="1%">&nbsp;</td>
            <td width="29%">Poin Keluhan</td>
            <td width="70%" valign="top">:&nbsp; <?=$data->keluhan;?></td>
          </tr>
        </table>
    </td>
    <br>  
    <tr>
      <td> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Bermaksud untuk mengajukan keluhan <?=$type;?> ini. Agar sekiranya dapat dipertimbangkan untuk diselesaikan.<br></td>
    </tr>
    <tr>
      <td> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Demikian surat pengajuan keluhan ini dibuat agar dapat dipergunakan sebagaimana mestinya, atas &ensp; perhatian&ensp;dan kebijaksanaannya saya ucapkan banyak terima kasih.</td>
    </tr>
    <tr>
      <td>&nbsp;<br><br><br><br><br></td>
    </tr>
  <tr> 
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="50%" align="center">Disetujui oleh,<br></td>
          <td width="50%" align="center">Pemohon,<br></td>
        </tr>
        <tr>
          <td width="50%"></td>
          <td width="50%"><br><br><br><br><br><br></td>
        </tr>
        <tr> 
          <td width="45%"></td>
          <td width="45%"></td>
        </tr>
        <tr>
          <td width="45%" align="center"><p class="signature" style="text-align: center;">Abdul Hadi Ilman, S.E., M.P.P </p><hr size="1" align="center" width="80%" color="#000000"></td>
          <td width="45%" align="center"><p class="signature" style="text-align: center;"><?=$data->nama;?></p><hr size="1" align="center" width="80%" color="#000000"></td>
        </tr>
        <tr>
          <td width="45%" align="center" > Kepala Bidang PSDM </td>
          <td width="45%" align="center" > <?=$data->nama_bidang;?></td>
		    </tr>
      </table>
    </td>
  </tr>
    </div>

    </div>
     
  </div>
  
  <tr>
    <?php if(!$dl) { ?>
    <td><div class="no-print" style="margin:0 0 30px 30px;text-align:center;"><a href="javascript:history.go(-1);">Kembali ke beranda</a> | <a href="javascript:window.print();">Cetak Dokumen</a></div></td>
    <?php } ?>
  </tr>
   <?php if(!$dl) { ?>
<script type="text/javascript">window.print();</script>
<?php } ?>
</body>
</html>