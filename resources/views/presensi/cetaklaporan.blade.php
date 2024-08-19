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
<body class="A4">

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
                LAPORAN PRESENSI KARYAWAN
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
  <table class="tabeldatakaryawan">
    <tr>
        <td rowspan="6">
            @php
                $path = Storage::url('uploads/karyawan/'. $karyawan->foto);
            @endphp
            <img src="{{ url($path) }}" alt="" width="100">
        </td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td>{{ $karyawan->nik }}</td>
    </tr>
    <tr>
        <td>Nama Karyawan</td>
        <td>:</td>
        <td>{{ $karyawan->nama_lengkap}}</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $karyawan->jabatan}}</td>
    </tr>
    <tr>
        <td>Departemen</td>
        <td>:</td>
        <td>{{ $karyawan->nama_dept}}</td>
    </tr>
    <tr>
        <td>No. Hp</td>
        <td>:</td>
        <td>{{ $karyawan->no_hp}}</td>
    </tr> 
  </table>
  <table class="tabelpresensi">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Foto Masuk</th>
        <th>Jam Pulang</th>
        <th>Foto Pulang</th>
    </tr>
    @foreach ( $presensi as $d)
    @php
    $path_in = Storage::url('uploads/absensi/'. $d->foto_in);
    $path_out = Storage::url('uploads/absensi/'. $d->foto_out);
    @endphp
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</td>
            <td>{{ $d->jam_in }}</td>
            <td><img src="{{url($path_in)}}" alt="" class="foto"></td>
            <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}</td>
            <td><img src="{{ url($path_out)}}" alt="" class="foto"></td>
            <!--<td>
               @if ($d->jam_in > '07:00')
                    Terlambat
                @else
                Tepat Waktu
                @endif
            </td>-->
        </tr>
    @endforeach
  </table>
  <table width="100%" style="margin-top: 100px">
    <tr>
        <td colspan="2" style="text-align: right">Tangerang, {{date('d-m-Y')}}</td>
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