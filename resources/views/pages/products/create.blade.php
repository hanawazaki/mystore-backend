@extends('layouts.backend')

@section('title', 'Product Create')
@section('content')
    <div class="section-header">
        <h1>Buat Produk Baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('products.index') }}">Daftar Produk</a></div>
            <div class="breadcrumb-item active">Produk Baru</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <div class="input-group mb-2">
                                    <input type="text" 
                                           value="{{ old('name') }}" 
                                           name="name" 
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori Produk</label>
                                <div class="input-group mb-2">
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <div class="input-group mb-2">
                                    <textarea name="description" id="mytextarea" cols="30" rows="10" 
                                              class="form-control @error ('description') is-invalid @enderror"
                                              placeholder="isi deskripsi kategori"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga Produk</label>
                                <div class="input-group mb-2">
                                    <input type="number" 
                                           value="{{ old('price') }}" 
                                           name="price" 
                                           class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Jumlah Produk</label>
                                <div class="input-group mb-2">
                                    <input type="number" 
                                           value="{{ old('quantity') }}" 
                                           name="quantity" 
                                           class="form-control @error('quantity') is-invalid @enderror">
                                    @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
