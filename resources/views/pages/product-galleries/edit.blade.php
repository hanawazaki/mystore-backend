@extends('layouts.backend')

@section('title', 'Ubah Foto Produk')
@section('content')
    <div class="section-header">
        <h1>Ubah Kategori - {{$item->name}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('categories.index') }}">Daftar Kategori</a></div>
            <div class="breadcrumb-item active">Kategori Baru</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('categories.update',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <div class="input-group mb-2">
                                    <input type="text" 
                                           value="{{ $item->name }}" 
                                           name="name" 
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
