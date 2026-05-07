@extends('layouts.app')

@section('content')

<style>
    .modern-form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2.5rem;
        border-radius: 12px 12px 0 0;
        position: relative;
        overflow: hidden;
    }

    .modern-form-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .modern-form-header h4 {
        position: relative;
        z-index: 1;
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
    }

    .modern-card {
        border: none;
        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.15);
        border-radius: 12px;
        overflow: hidden;
    }

    .form-control,
    .form-select {
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 16px;
        background: #f8fafc;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
        background: white;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #1f2937;
    }

    .laptop-box {
        background: #f3e8ff;
        border-radius: 14px;
        padding: 24px;
        margin-top: 10px;
    }

    .btn-save {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 14px 40px;
        border-radius: 12px;
        font-weight: 600;
    }

    .btn-save:hover {
        opacity: .95;
        color: white;
    }

    .btn-cancel {
        padding: 14px 40px;
        border-radius: 12px;
        font-weight: 600;
    }
</style>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="modern-card">

                <div class="modern-form-header">

                    <h4>
                        <i class="fas fa-plus-circle me-2"></i>
                        Tambah Asset Baru
                    </h4>

                </div>

                <div class="card-body p-5">

                    <form action="{{ route('assets.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Nama Perangkat
                                </label>

                                <input type="text"
                                       name="nama_perangkat"
                                       class="form-control"
                                       placeholder="Masukkan nama perangkat">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Jenis Perangkat
                                </label>

                                <select name="jenis_perangkat"
                                        id="jenis_perangkat"
                                        class="form-select">

                                    <option value="">
                                        -- Pilih Jenis --
                                    </option>

                                    <option value="Laptop">
                                        Laptop
                                    </option>

                                    <option value="PC">
                                        PC
                                    </option>

                                    <option value="Printer">
                                        Printer
                                    </option>

                                    <option value="Monitor">
                                        Monitor
                                    </option>

                                    <option value="Router">
                                        Router
                                    </option>

                                    <option value="Switch">
                                        Switch
                                    </option>

                                    <option value="Access Point">
                                        Access Point
                                    </option>

                                    <option value="Server">
                                        Server
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Versi Perangkat
                                </label>

                                <input type="text"
                                       name="versi_perangkat"
                                       class="form-control"
                                       placeholder="Contoh: v2.1">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Dipakai Oleh
                                </label>

                                <input type="text"
                                       name="pengguna"
                                       class="form-control"
                                       placeholder="Nama pengguna">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Departemen
                                </label>

                                <select name="departemen"
                                        class="form-select">

                                    <option value="">
                                        -- Pilih Departemen --
                                    </option>
                                    <
                                    <option value="HRD">
                                        HRD
                                    </option>

                                    <option value="Plant Manager">
                                        Plant Manager
                                    </option>

                                    <option value="Quality">
                                        Quality
                                    </option>

                                    <option value="QAQC">
                                        QA QC
                                    </option>

                                    <option value="PPIC">
                                        PPIC
                                    </option>

                                    <option value="Design">
                                        Design
                                    </option>

                                    <option value="Sales&Marketing">
                                        Sales &Marketing
                                    </option>

                                    <option value="Purchasing">
                                        Purchasing
                                    </option>

                                    <option value="Finance&Accounting">
                                        Finance & Accounting
                                    </option>
                                    <option value="IT">
                                        IT
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Tanggal Beli
                                </label>

                                <input type="date"
                                       name="tanggal_beli"
                                       class="form-control">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Condition
                                </label>

                                <select name="condition"
                                        class="form-select">

                                    <option value="">
                                        -- Pilih Condition --
                                    </option>

                                    <option value="Ok">
                                        Ok
                                    </option>

                                    <option value="NG">
                                        NG
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    No Seri
                                </label>

                                <input type="text"
                                       name="no_seri"
                                       class="form-control"
                                       placeholder="Masukkan nomor seri">

                            </div>

                        </div>

                        <!-- LAPTOP FIELDS -->

                        <div id="laptop-fields"
                             class="laptop-box mt-4"
                             style="display:none;">

                            <h5 class="mb-4 fw-bold">
                                Informasi Laptop
                            </h5>

                            <div class="row g-4">

                                <div class="col-md-6">

                                    <label class="form-label">
                                        SN Windows
                                    </label>

                                    <input type="text"
                                           name="sn_windows"
                                           class="form-control"
                                           placeholder="Masukkan SN Windows">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        SN Office
                                    </label>

                                    <input type="text"
                                           name="sn_office"
                                           class="form-control"
                                           placeholder="Masukkan SN Office">

                                </div>

                            </div>

                        </div>

                        <div class="row g-4 mt-2">

                            <div class="col-md-12">

                                <label class="form-label">
                                    Harga
                                </label>

                                <input type="text"
                                       name="harga"
                                       id="harga"
                                       class="form-control"
                                       placeholder="Rp 0">

                            </div>

                            <div class="col-md-12">

                                <label class="form-label">
                                    Foto Asset
                                </label>

                                <input type="file"
                                       name="foto"
                                       class="form-control"
                                       accept="image/*">

                            </div>

                        </div>

                        <div class="d-flex gap-3 mt-5">

                            <button class="btn btn-save">

                                <i class="fas fa-save me-2"></i>
                                Simpan Asset

                            </button>

                            <a href="{{ route('assets.index') }}"
                               class="btn btn-outline-secondary btn-cancel">

                                Batal

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

    // FORMAT RUPIAH

    const hargaInput =
        document.getElementById('harga');

    hargaInput.addEventListener('keyup', function(e) {

        let angka = this.value.replace(/[^,\d]/g, '');

        let split = angka.split(',');

        let sisa = split[0].length % 3;

        let rupiah = split[0].substr(0, sisa);

        let ribuan = split[0]
            .substr(sisa)
            .match(/\d{3}/gi);

        if (ribuan) {

            let separator = sisa ? '.' : '';

            rupiah += separator + ribuan.join('.');

        }

        rupiah = split[1] != undefined
            ? rupiah + ',' + split[1]
            : rupiah;

        this.value = 'Rp ' + rupiah;

    });

    // JENIS LAPTOP

    const jenisPerangkat =
        document.getElementById('jenis_perangkat');

    const laptopFields =
        document.getElementById('laptop-fields');

    function toggleLaptopFields() {

        if(jenisPerangkat.value === 'Laptop') {

            laptopFields.style.display = 'block';

        } else {

            laptopFields.style.display = 'none';

        }

    }

    jenisPerangkat.addEventListener('change', toggleLaptopFields);

    toggleLaptopFields();

</script>

@endsection