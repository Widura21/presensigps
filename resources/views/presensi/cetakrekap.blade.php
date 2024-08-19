<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { 
    size: A4 
    }
    #title{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        font-weight: bold;
    }
    .tabeldatakaryawan{
        margin-top: 40px;
    }
    .tabeldatakaryawan tr td{
        padding: 5px;
    }
    .tabelpresensi {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-size: 10px;
    }
    .tabelpresensi tr th{
        border: 2px solid #797777;
        padding: 6px;
        background-color: #dbdbdb;
    }
    .tabelpresensi tr td {
        border: 2px solid #797777;
        padding: 6px; 
        font-size: 12px;  
    }
    .foto{
        width: 60px;
        height: 50px;
    }

</style>
</head> 

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">
  <table style="width: 100%">
    <tr>
        <td style="width: 30px">
            <img src="{{ asset('assets/img/logo1.PNG')}}" width="80" height="80" alt="">
        </td>
        <td>
            <center><span id="title">
                SMK PGRI NEGLASARI<br>
                REKAP PRESENSI KARYAWAN
                PERIODE {{ strtoupper($namabulan[$bulan])}} {{ $tahun}}<br>
            </span></center>
            <center><span><i>
                JL. MARSEKAL Suryadharma No.1 Selapajang Jaya.Kec.Neglasari<br>
                Kota Tangerang-Banten 15127 Telp : 021-29879042<br>
                Email : smkpgrineglasari.tng@gmail.com
            </i></span></center>
        </td>
    </tr>
  </table>
  <table class="tabelpresensi">
    <tr>
        <th rowspan="2">Nik</th>
        <th rowspan="2">Nama Karyawan</th>
        <th colspan="31">Tanggal</th>
        <th rowspan="2">TH</th>
    </tr>
    <tr>
        <?php
        for($i=1; $i<=31; $i++){
        ?>
        <th>{{ $i }}</th>
        <?php
        }
        ?>
    </tr>
    <tr>
        @foreach ($rekap as $d)
        <tr>
            <td>{{$d->nik}}</td>
            <td>{{ $d->nama_lengkap}}</td>

            <?php
            $totalhadir = 0;
            for($i=1; $i<=31; $i++){
                $tgl = "tgl_".$i;
                if(empty($d->$tgl)){
                    $hadir = ['',''];
                    $totalhadir += 0;
                }else{
                    $hadir = explode("-",$d->$tgl);
                    $totalhadir += 1;
                }
            ?>

            <td>
                {{ $hadir[0] }}<br>
                {{ $hadir[1] }}
            </td>
            <?php
            }
            ?>
            <td>{{$totalhadir}}</td>
        </tr>
        @endforeach
    </tr>
  </table>
  
  <table width="100%" style="margin-top: 100px">
    <tr>
        <td></td>
        <td style="text-align: center">Tangerang, {{date('d-m-Y')}}</td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align:bottom" height="100px" >
            <u>Widura Ecsuci, Amd.T</u><br>
            <i><b>Information Technology</b></i>
        </td>
        <td style="text-align: center; vertical-align:bottom" >
            <u>Rini Saraswati</u><br>
            <i><b>Direktur</b></i>
        </td>
    </tr>
  </table>
  </section>

</body>

</html>