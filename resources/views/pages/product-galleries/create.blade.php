@extends('layouts.backend')

@section('title', 'Buat Foto Produk')
@section('content')
    <div class="section-header">
        <h1>Buat Foto Baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('product-galleries.index') }}">Daftar Kategori</a></div>
            <div class="breadcrumb-item active">Foto Baru</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product">Nama Produk</label>
                                <div class="input-group mb-2">
                                    <select name="products_id"
                                        class="form-control @error('products_id') is-invalid @enderror" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('products_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <div class="input-group mb-2">
                                    <input type="file" 
                                           name="photo" accept="image/*" 
                                           value="{{ old('photo') }}" class="form-control
                                               @error('photo') is-invalid @enderror" required>
                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_default" class="form-control-label">Jadikan default</label>
                                <br>
                                <label>Ya
                                <input type="radio" name="is_default" value="1"
                                       class="form-control @error('is_default') is-invalid @enderror" checked />
                                </label>
                                &nbsp;
                                <label>Tidak
                                <input type="radio" name="is_default" value="0"
                                       class="form-control no-radio @error('is_default') is-invalid @enderror" /> 
                                </label>
                                @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
