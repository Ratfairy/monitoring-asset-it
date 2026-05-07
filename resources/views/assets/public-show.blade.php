<!DOCTYPE html>
<html>
<head>
    <title>Informasi Asset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body style="background:#f5f6fa;">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-body p-5">

            <div class="text-center mb-4">

                <h2>{{ $asset->nama_perangkat }}</h2>

            </div>

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($asset->foto)

                        <img src="{{ asset('storage/' . $asset->foto) }}"
                             class="img-fluid rounded shadow">

                    @endif

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>
                            <th width="35%">Kode Asset</th>
                            <td>{{ $asset->kode_asset }}</td>
                        </tr>

                        <tr>
                            <th>Jenis Perangkat</th>
                            <td>{{ $asset->jenis_perangkat }}</td>
                        </tr>

                        <tr>
                            <th>Versi</th>
                            <td>{{ $asset->versi_perangkat }}</td>
                        </tr>

                        <tr>
                            <th>Pengguna</th>
                            <td>{{ $asset->pengguna }}</td>
                        </tr>

                        <tr>
                            <th>Departemen</th>
                            <td>{{ $asset->departemen }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Beli</th>
                            <td>{{ $asset->tanggal_beli }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>

                            <td>
                                Rp {{ number_format($asset->harga, 0, ',', '.') }}
                            </td>
                        </tr>

                        <tr>

                            <th>Status</th>

                            <td>

                                @if($asset->status == 'Active')

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @elseif($asset->status == 'Maintenance')

                                    <span class="badge bg-warning text-dark">
                                        Maintenance
                                    </span>

                                @elseif($asset->status == 'Rusak')

                                    <span class="badge bg-danger">
                                        Rusak
                                    </span>

                                @elseif($asset->status == 'Dipinjam')

                                    <span class="badge bg-primary">
                                        Dipinjam
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @if($asset->status == 'Dipinjam')

                        <tr>

                            <th>Dipinjam Ke</th>

                            <td>
                                {{ $asset->dipinjam_ke }}
                            </td>

                        </tr>

                        <tr>

                            <th>Tanggal Pinjam</th>

                            <td>
                                {{ $asset->tanggal_pinjam }}
                            </td>

                        </tr>

                        <tr>

                            <th>Tanggal Kembali</th>

                            <td>
                                {{ $asset->tanggal_kembali }}
                            </td>

                        </tr>

                        @endif

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>