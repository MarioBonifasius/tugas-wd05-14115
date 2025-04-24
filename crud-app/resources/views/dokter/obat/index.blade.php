@extends('layout.main') {{-- directive --}}

@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dokter.dashboard') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokter.periksa') }}" class="nav-link">
                    <p>
                        Periksa
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokter.obat') }}" class="nav-link ">
                    <p>
                        Obat
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Periksa</h3>
                    </div>
                    <form method="POST" action="{{ route('dokter.obat.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaObat">Nama Obat</label>
                                <input type="text" name="nama_obat" class="form-control" id="namaObat" placeholder="Input obat's name">
                            </div>
                            <div class="form-group">
                                <label for="kemasan">Kemasan</label>
                                <input type="text" name="kemasan" class="form-control" id="kemasan" placeholder="Input kemasan's name">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Input the price">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah Obat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Obat</h3>
                        <div class="card-tools">
                            <input type="text" class="form-control float-right" placeholder="Search">
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Kemasan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $obat )
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $obat->id}}</td>
                                    <td>{{ $obat->nama_obat}}</td>
                                    <td>{{ $obat->kemasan}}</td>
                                    <td>{{ $obat->harga}}</td>
                                    <td class="d-flex">
                                        <!-- Form Hapus -->
                                        <a href="{{ route('dokter.obat.edit', $obat->id) }}" type="button" class="btn btn-warning mr-2">Edit</a>
                                        <form action="{{ route('dokter.obat.delete', $obat->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection