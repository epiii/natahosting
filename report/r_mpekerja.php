<?php
  session_start();
  require_once '../lib/koneks.php';
  require_once '../lib/tglindo.php';
  require_once '../lib/mpdf/mpdf.php';

  $x     = (isset($_GET['idx'])?$_GET['idx']:$_GET['kategori'].$_GET['cari']).$_SESSION['namauser'].$_SESSION['passuser'];
  $token = base64_encode($x);
  
  if(!isset($_SESSION)){ // login 
    echo 'user has been logout';
  }else{ // logout
    if(!isset($_GET['token']) and $token!==$_GET['token']){
      echo 'maaf token - url tidak valid';
    }else{
      ob_start(); // digunakan untuk convert php ke html
      $out='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>SISTER::Sar - inventaris</title>
          </head>
          <body>';

      if(!isset($_GET['idx'])){//multi 
        $s = 'SELECT
                    p.NIK,
                    p.id_pekerja,
                    p.nama_pekerja,
                    if(p.jkelamin="L","Laki-laki","Perempuan") jkelamin,
                    p.tgllahir,
                    j.nama_jabatan,
                    b.nama_bagian,
                    d.nama_department,
                    s.nama_statuskerja,
                    f.nama_shiftkerja,
                    p.tgl_masuk,
                    p.tgl_keluar
                  FROM
                    tb_pekerja p
                    LEFT JOIN tb_bagian b ON b.id_bagian = p.id_bagian
                    LEFT JOIN tb_department d ON d.id_department = p.id_department
                    LEFT JOIN tb_jabatan j ON j.id_jabatan = p.id_jabatan
                    LEFT JOIN tb_statuskerja s ON s.id_statuskerja = p.id_statuskerja
                    LEFT JOIN tb_shiftkerja f ON f.id_shiftkerja = p.id_shiftkerja
                  WHERE 
                    '.$_GET['kategori'].' LIKE "%'.$_GET['cari'].'%"
                  ORDER BY 
                    p.nama_pekerja ASC'; 
        $e = mysql_query($s);
        $n = mysql_num_rows($e);
        $out.='<table class="isi" width="100%">
                <tr class="isi" >
                  <td align="center"><img src="../img/pgicon.jpg" width="60" alt="" /></td>
                  <td align="center">Data Rekapitulasi Pekerja</td>
                  <td align="center"><img src="../img/k3icon.jpg" width="60" alt="" /></td>
                </tr>
              </table><br />';

        $out.='<div class="isi">Total Data : '.$n.'</div>';
        $out.='<table class="isi" width="100%">
                <tr class="head">
                  <td align="center">NIK</td>
                  <td align="center">Nama</td>
                  <td align="center">Gender</td>
                  <td align="center">Tgl Lahir</td>
                  <td align="center">Jabatan</td>
                  <td align="center">Bagian</td>
                  <td align="center">Department</td>
                  <td align="center">Status</td>
                  <td align="center">Shift</td>
                  <td align="center">Tgl Masuk</td>
                  <td align="center">Tgl Keluar</td>
                </tr>';
                    $nox = 1;
                    if($n==0){
                      $out.='<tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>';
                    }else{
                      while ($r=mysql_fetch_assoc($e)) {
                        $out.='<tr>
                                  <td>'.$r['NIK'].'</td>
                                  <td>'.$r['nama_pekerja'].'</td>
                                  <td>'.$r['jkelamin'].'</td>
                                  <td>'.tgl_indo($r['tgllahir']).'</td>
                                  <td>'.$r['nama_jabatan'].'</td>
                                  <td>'.$r['nama_bagian'].'</td>
                                  <td>'.$r['nama_department'].'</td>
                                  <td>'.$r['nama_statuskerja'].'</td>
                                  <td>'.$r['nama_shiftkerja'].'</td>
                                  <td>'.tgl_indo($r['tgl_masuk']).'</td>
                                  <td>'.tgl_indo($r['tgl_keluar']).'</td>
                            </tr>';
                        $nox++;
                      }
                    }
            $out.='</table>';
            $out.='<p>Total : '.$n.'</p>';
          // echo $out;
      }else{ // single
        $s = 'SELECT
                  p.NIK,
                  p.nama_pekerja,
                  if(p.jkelamin="L","Laki-laki","Perempuan") jkelamin,
                  p.tgllahir,
                  j.nama_jabatan,
                  b.nama_bagian,
                  d.nama_department,
                  s.nama_statuskerja,
                  f.nama_shiftkerja,
                  p.tgl_masuk,
                  p.tgl_keluar
                FROM
                  tb_pekerja p
                  LEFT JOIN tb_bagian b ON b.id_bagian = p.id_bagian
                  LEFT JOIN tb_department d ON d.id_department = p.id_department
                  LEFT JOIN tb_jabatan j ON j.id_jabatan = p.id_jabatan
                  LEFT JOIN tb_statuskerja s ON s.id_statuskerja = p.id_statuskerja
                  LEFT JOIN tb_shiftkerja f ON f.id_shiftkerja = p.id_shiftkerja
                WHERE 
                  p.id_pekerja='.$_GET['idx'];
        // var_dump($sql);exit();
        $e = mysql_query($s);
        $r = mysql_fetch_assoc($e);
        $out.='<table class="isi" width="100%">
                <tr class="isi" >
                  <td align="center"><img src="../img/pgicon.jpg" width="60" alt="" /></td>
                  <td align="center">Data Detail Pekerja</td>
                  <td align="center"><img src="../img/k3icon.jpg" width="60" alt="" /></td>
                </tr>
              </table><br />';

        $out.='<table>
            <td>- NIK</td>
            <td>: '.($r['NIK']==''?'-':$r['NIK']).'</td>
          </tr>
          <tr>
            <td>- Nama</td>
            <td>: '.$r['nama_pekerja'].'</td>
          </tr>
          <tr>
            <td>- Jenis Kelamin</td>
            <td>: '.$r['jkelamin'].'</td>
          </tr>
          <tr>
            <td>- Tanggal Lahir</td>
            <td>: '.tgl_indo($r['tgllahir']).'</td>
          </tr>
          <tr>
            <td>- Jabatan</td>
            <td>: '.$r['nama_jabatan'].'</td>
          </tr>
          <tr>
            <td>- Bagian</td>
            <td>: '.$r['nama_bagian'].'</td>
          </tr>
          <tr>
            <td>- Department</td>
            <td>: '.$r['nama_department'].'</td>
          </tr>
          <tr>
            <td>- Status</td>
            <td>: '.$r['nama_statuskerja'].'</td>
          </tr>
          <tr>
            <td>- Shift kerja</td>
            <td>: '.$r['nama_shiftkerja'].'</td>
          </tr>
          <tr>
            <td>- Tanggal Masuk</td>
            <td>: '.tgl_indo($r['tgl_masuk']).'</td>
          </tr>
          <tr>
            <td>- Tanggal Keluar</td>
            <td>: '.($r['tgl_keluar']!='0000-00-00'?tgl_indo($r['tgl_keluar']):'-').'</td>
          </tr>
        </table>';
      }

      #generate html -> PDF ------------
      $out2 = ob_get_contents();
      ob_end_clean(); 
      $mpdf=new mPDF('c','A4','');   
      $mpdf->SetDisplayMode('fullpage');   
      $stylesheet = file_get_contents('../lib/mpdf/r_cetak.css');
      $mpdf->WriteHTML($stylesheet,1);  // The parameter 1 tells that this is css/style only and no body/html/text
      $mpdf->WriteHTML($out);
      $mpdf->Output();
    }
}
  // ---------------------- //
  // -- created by epiii -- //
  // ---------------------- // 

?>