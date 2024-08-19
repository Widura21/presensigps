<form action="/karyawan/{{$karyawan->nik}}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
          </span>
          <input type="text" id="nik" readonly value="{{$karyawan->nik }}" class="form-control" name="nik" placeholder="NIK">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
          </span>
          <input type="text" id="nama_lengkap" value="{{$karyawan->nama_lengkap}}" class="form-control" name="nama_lengkap" placeholder="Nama Karyawan">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-jacket"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 3l-4 5l-4 -5" /><path d="M12 19a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-8.172a2 2 0 0 1 .586 -1.414l.828 -.828a2 2 0 0 0 .586 -1.414v-2.172a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v2.172a2 2 0 0 0 .586 1.414l.828 .828a2 2 0 0 1 .586 1.414v8.172a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2z" /><path d="M20 13h-3a1 1 0 0 0 -1 1v2a1 1 0 0 0 1 1h3" /><path d="M4 17h3a1 1 0 0 0 1 -1v-2a1 1 0 0 0 -1 -1h-3" /><path d="M12 19v-11" /></svg>
          </span>
          <input type="text" id="jabatan" value="{{$karyawan->jabatan}}" class="form-control" name="jabatan" placeholder="Jabatan">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
          </span>
          <input type="text" id="no_hp" value="{{$karyawan->no_hp}}" class="form-control" name="no_hp" placeholder="No Handphone">
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <input type="file" id="foto" name="foto" class="form-control" />
        <input type="hidden" name="old_foto" value="{{$karyawan->foto}}"/>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <select id="kode_dept" name="kode_dept"  class="form-select ">
          <option value="">Departemen</option>
          @foreach ($departemen as $d)
          <option {{$karyawan->kode_dept==$d->kode_dept ? 'selected' : ''}}value="{{ $d->kode_dept }}">{{ $d->nama_dept}}</option>                                    
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <button class="btn btn-primary w-100">Simpan</button>
        </div>
      </div>
    </div>
  </form>