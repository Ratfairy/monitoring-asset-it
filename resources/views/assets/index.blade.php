@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f6fa;
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        gap: 2rem;
    }

    .page-header h3 {
        font-weight: 700;
        font-size: 2rem;
        color: #1f2937;
        margin: 0;
    }

    .btn-add-asset {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.8rem;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-add-asset:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .stat-card {
        border-radius: 16px;
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: rgba(255, 255, 255, 0.3);
    }
    
    .stat-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }
    
    .stat-card h5 {
        font-weight: 600;
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }
    
    .stat-card h2 {
        font-weight: 800;
        font-size: 2.8rem;
        margin: 0;
        line-height: 1;
    }
    
    .filter-section {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2.5rem;
        box-shadow: 0 10px 35px rgba(102, 126, 234, 0.1);
        border: 1px solid #ebedf3;
    }

    .filter-section .form-control,
    .filter-section .form-select {
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #f8fafc;
    }
    
    .filter-section .form-control:focus,
    .filter-section .form-select:focus {
        border-color: #667eea;
        background-color: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .filter-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
    }

    .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        color: white;
    }
    
    .data-table-section {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(102, 126, 234, 0.1);
        border: 1px solid #ebedf3;
    }

    .data-table-section .table {
        margin-bottom: 0;
    }
    
    .data-table-section thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .data-table-section thead th {
        color: white;
        font-weight: 700;
        border: none;
        padding: 1.2rem;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .data-table-section tbody td {
        vertical-align: middle;
        padding: 1rem 1.2rem;
        border-color: #f0f4f8;
        font-weight: 500;
        color: #374151;
    }
    
    .data-table-section tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f4f8;
    }
    
    .data-table-section tbody tr:hover {
        background-color: #f8fafc;
    }
    
    .badge {
        border-radius: 50px;
        padding: 0.5rem 0.9rem;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        display: inline-block;
    }
    
    .btn-group-action {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .btn-action {
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 0.65rem 1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        color: white;
        text-decoration: none;
    }

    .btn-action i {
        font-size: 1.1rem;
        line-height: 1;
    }

    .btn-detail {
        background-color: #3b82f6;
        color: white;
    }

    .btn-detail:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(59, 130, 246, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #f59e0b;
        color: white;
    }

    .btn-edit:hover {
        background-color: #d97706;
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(245, 158, 11, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        padding: 0.65rem 1rem;
    }

    .btn-delete:hover {
        background-color: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(239, 68, 68, 0.3);
        color: white;
    }
    
    .pagination {
        margin-top: 2rem;
        justify-content: center;
    }
    
    .pagination .page-link {
        border-radius: 8px;
        border: 1.5px solid #e2e8f0;
        color: #667eea;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 0.3rem;
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
        color: white;
    }

    .stat-row {
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-group-action {
            flex-direction: row;
        }

        .btn-action {
            padding: 0.65rem 1rem;
            min-width: 40px;
            height: 40px;
        }

        .filter-section {
            padding: 1.5rem;
        }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h3><i class="fas fa-laptop me-2" style="color: #667eea;"></i>Data Asset IT</h3>
    </div>
    <a href="{{ route('assets.create') }}" class="btn-add-asset">
        <i class="fas fa-plus-circle"></i> Tambah Asset
    </a>
</div>

<!-- Statistics Cards -->
<div class="row stat-row">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card bg-primary text-white">
            <div class="card-body p-4">
                <h5><i class="fas fa-boxes me-2"></i>Total Asset</h5>
                <h2>{{ $totalAsset }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card bg-success text-white">
            <div class="card-body p-4">
                <h5><i class="fas fa-check-circle me-2"></i>Active</h5>
                <h2>{{ $active }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card bg-warning text-white">
            <div class="card-body p-4">
                <h5><i class="fas fa-tools me-2"></i>Maintenance</h5>
                <h2>{{ $maintenance }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card bg-danger text-white">
            <div class="card-body p-4">
                <h5><i class="fas fa-exclamation-circle me-2"></i>Rusak</h5>
                <h2>{{ $rusak }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row stat-row">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card stat-card bg-info text-white">
            <div class="card-body p-4">
                <h5><i class="fas fa-hand-holding me-2"></i>Dipinjam</h5>
                <h2>{{ $dipinjam }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="filter-section">
    <form method="GET" action="{{ route('assets.index') }}" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label fw-600" style="color: #2d3748; margin-bottom: 0.6rem;">Cari Asset</label>
            <input type="text" name="search" class="form-control" placeholder="Cari nama atau kode asset..." value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <label class="form-label fw-600" style="color: #2d3748; margin-bottom: 0.6rem;">Status</label>
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Maintenance" {{ request('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                <option value="Rusak" {{ request('status') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-600" style="color: #2d3748; margin-bottom: 0.6rem;">Jenis Perangkat</label>
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

        <div class="col-md-2">
            <button type="submit" class="filter-btn w-100">
                <i class="fas fa-search me-2"></i>Filter
            </button>
        </div>
    </form>
</div>

<!-- Data Table -->
<div class="data-table-section">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><i class="fas fa-barcode me-2"></i>Kode</th>
                    <th><i class="fas fa-laptop me-2"></i>Nama Perangkat</th>
                    <th><i class="fas fa-tag me-2"></i>Jenis</th>
                    <th><i class="fas fa-user me-2"></i>Pengguna</th>
                    <th><i class="fas fa-building me-2"></i>Departemen</th>
                    <th><i class="fas fa-dollar-sign me-2"></i>Harga</th>
                    <th><i class="fas fa-info-circle me-2"></i>Status</th>
                    <th><i class="fas fa-cog me-2"></i>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <td><strong>{{ $asset->kode_asset }}</strong></td>
                    <td>{{ $asset->nama_perangkat }}</td>
                    <td>{{ $asset->jenis_perangkat }}</td>
                    <td>{{ $asset->pengguna }}</td>
                    <td>{{ $asset->departemen }}</td>
                    <td>Rp {{ number_format($asset->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($asset->status == 'Active')
                            <span class="badge bg-success">Active</span>
                        @elseif($asset->status == 'Maintenance')
                            <span class="badge bg-warning text-dark">Maintenance</span>
                        @elseif($asset->status == 'Rusak')
                            <span class="badge bg-danger">Rusak</span>
                        @else
                            <span class="badge bg-primary">Dipinjam</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group-action">
                            <a href="{{ route('assets.show', $asset->id) }}" class="btn-action btn-detail" title="Lihat detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('assets.edit', $asset->id) }}" class="btn-action btn-edit" title="Edit asset">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display:contents;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Hapus asset" onclick="return confirm('Yakin ingin menghapus asset ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $assets->links() }}
    </div>
</div>

@endsection