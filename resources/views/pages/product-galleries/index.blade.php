@extends('layouts.backend')

@section('title', 'Daftar Foto Produk')
@section('content')
    <div class="section-header">
        <a href="{{ route('products.index') }}">
            <h1>Foto Produk</h1>
        </a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-header-form ">
                            <form method="GET" action="{{ URL::to('cari-foto') }}">
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="card-header-create ">
                            <a href="{{route('categories.create')}}" 
                               class="btn btn-primary">
                               Buat Baru
                            </a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td class="p-0 text-center">{{ $loop->index + 1 }}</td>
                                            <td class="space-td">{{ $item->product->name }}</td>
                                            <td><img src="{{ url($item->thumb) }}" alt=""></td>
                                            <td class="space-td">{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <form action="{{ route('product-galleries.destroy', $item->id) }}" method="post"
                                                    class="d-inline"
                                                    onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                <i>Data Kosong</i>
                                            </td>
                                        </tr>
                                    @endforelse

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
