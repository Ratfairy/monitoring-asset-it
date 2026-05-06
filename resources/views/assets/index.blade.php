@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    
    .stat-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
        position: relative;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, rgba(255,255,255,0.3), transparent);
    }
    
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2) !important;
    }
    
    .stat-card h5 {
        font-weight: 600;
        font-size: 0.9rem;
        opacity: 0.85;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .stat-card h2 {
        font-weight: 800;
        font-size: 2.5rem;
        margin: 0;
    }
    
    .filter-card {
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        background: white;
    }
    
    .filter-card .form-control,
    .filter-card .form-select {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }
    
    .filter-card .form-control:focus,
    .filter-card .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
    
    .filter-card .btn {
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .filter-card .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }
    
    .page-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .page-header h3 {
        font-weight: 700;
        font-size: 1.8rem;
        color: #333;
        margin: 0;
    }
    
    .data-table {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e0e0e0;
    }
    
    .data-table .table {
        margin-bottom: 0;
    }
    
    .data-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .data-table thead th {
        color: white;
        font-weight: 600;
        border: none;
        padding: 16px 12px;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .data-table tbody td {
        vertical-align: middle;
        padding: 14px 12px;
        border-color: #f0f0f0;
    }
    
    .data-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .data-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
    }
    
    .badge {
        border-radius: 8px;
        padding: 6px 12px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    
    .btn-group-action {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
    
    .btn-sm {
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }
    
    .btn-sm:hover {
        transform: translateY(-2px);
    }
    
    .pagination {
        margin-top: 20px;
    }
    
    .pagination .page-link {
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }
    
    .pagination .page-link:hover {
        background-color: #667eea;
        border-color: #667eea;
        color: white;
        transform: translateY(-2px);
    }
    
    .pagination .page-item.active .page-link {
        background-color: #667eea;
        border-color: #667eea;
    }
</style>

<div class="card shadow border-0 mb-4">

    <div class="card-body">

        <form method="GET" action="{{ route('assets.index') }}">

            <div class="row">

                <div class="col-md-3 mb-2">

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search"
                           value="{{ request('search') }}">

                </div>

                <div class="col-md-2 mb-2">

                    <select name="status" class="form-select">

                        <option value="">Semua Status</option>

                        <option value="Active"
                            {{ request('status') == 'Active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="Maintenance"
                            {{ request('status') == 'Maintenance' ? 'selected' : '' }}>
                            Maintenance
                        </option>

                        <option value="Rusak"
                            {{ request('status') == 'Rusak' ? 'selected' : '' }}>
                            Rusak
                        </option>

                        <option value="Dipinjam"
                            {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>

                    </select>

                </div>

                <div class="col-md-3 mb-2">

                    <select name="jenis_perangkat" class="form-select">

                        <option value="">Semua Jenis</option>

                        <option value="Laptop">Laptop</option>
                        <option value="PC">PC</option>
                        <option value="Printer">Printer</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Router">Router</option>
                        <option value="Switch">Switch</option>
                        <option value="Access Point">Access Point</option>
                        <option value="Server">Server</option>

                    </select>

                </div>

                <div class="col-md-2 mb-2 d-grid">

                    <button class="btn btn-dark">
                        Filter
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="row mb-5">

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm bg-primary text-white">
            <div class="card-body p-4">
                <h5>Total Asset</h5>
                <h2>{{ $totalAsset }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm bg-success text-white">
            <div class="card-body p-4">
                <h5>Active</h5>
                <h2>{{ $active }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm bg-warning text-white">
            <div class="card-body p-4">
                <h5>Maintenance</h5>
                <h2>{{ $maintenance }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm bg-danger text-white">
            <div class="card-body p-4">
                <h5>Rusak</h5>
                <h2>{{ $rusak }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row mb-4">

    <div class="col-lg-3 col-md-6">
        <div class="card stat-card shadow-sm bg-info text-white">
            <div class="card-body p-4">
                <h5>Dipinjam</h5>
                <h2>{{ $dipinjam }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Asset IT</h3>

    <a href="{{ route('assets.create') }}" class="btn btn-primary">
        Tambah Asset
    </a>
</div>

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>User</th>
                    <th>Departemen</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($assets as $asset)

                <tr>
                    <td>{{ $asset->kode_asset }}</td>
                    <td>{{ $asset->nama_perangkat }}</td>
                    <td>{{ $asset->jenis_perangkat }}</td>
                    <td>{{ $asset->pengguna }}</td>
                    <td>{{ $asset->departemen }}</td>
                    <td>
                        Rp {{ number_format($asset->harga, 0, ',', '.') }}
                    </td>
                    <td>
                        <a href="{{ route('assets.show', $asset->id) }}" class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('assets.destroy', $asset->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus asset ini?')">

                                Hapus

                            </button>

                        </form>
                    </td>
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

                @endforeach

            </tbody>

        </table>

    </div>
    <div class="mt-3">
        {{ $assets->links() }}
    </div>

</div>

@endsection