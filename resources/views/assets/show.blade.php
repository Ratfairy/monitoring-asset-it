@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between">
        <h4>Detail Asset</h4>

        <a href="{{ route('assets.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>


    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                @if($asset->foto)
                    <img src="{{ asset('storage/' . $asset->foto) }}"
                         class="img-fluid rounded">
                @endif

            </div>

            <div class="col-md-8">

               <div class="mb-4 text-center">

                <h5>QR Code Asset</h5>

                {!! QrCode::size(200)->generate(route('assets.public', $asset->id)) !!}

                <div class="mt-3">

                    <a href="{{ route('assets.print', $asset->id) }}"
                    target="_blank"
                    class="btn btn-dark">

                        Print QR

                    </a>

                </div>

            </div>

                <table class="table table-bordered">

                    <tr>
                        <th width="30%">Kode Asset</th>
                        <td>{{ $asset->kode_asset }}</td>
                    </tr>

                    <tr>
                        <th>Nama Perangkat</th>
                        <td>{{ $asset->nama_perangkat }}</td>
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

                                <span class="badge bg-warning">
                                    Maintenance
                                </span>

                            @elseif($asset->status == 'Rusak')

                                <span class="badge bg-danger">
                                    Rusak
                                </span>

                            @else

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

@endsection