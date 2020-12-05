@extends('layouts.backend')
@section('content')

    <div class="section-header">
        <h1>Ubah Transaksi - Transaksi {{ $item->uuid }} </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Daftar Transaksi</a></div>
            <div class="breadcrumb-item active">Ubah Transaksi</div>
        </div>
    </div>
    <div class="card">
        <div class="card-body card-block">
            <form action="{{ route('transactions.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Barang</label>
                    <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="number" class="form-control-label">Nomor HP</label>
                    <input type="number" name="number" value="{{ old('number') ? old('number') : $item->number }}"
                        class="form-control @error('number') is-invalid @enderror">
                    @error('number') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-label">Alamat Pemesan</label>
                    <input type="text" name="address" value="{{ old('address') ? old('price') : $item->address }}"
                        class="form-control @error('address') is-invalid @enderror">
                    @error('address') <div class="text-muted">{{ message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Ubah Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
