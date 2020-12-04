@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="box-title">Daftar Foto Barang <small>{{$product->name}}</small></h4>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>
                                        <img src="{{ url($item->thumb)}}" alt=""/>
                                    </td>
                                    <td>
                                        {{$item->is_default ? 'Ya' : 'Tidak' }}
                                    </td>
                                    <td>
                                        <form action="{{route('product-galleries.destroy', $item->id)}}" 
                                              method="POST" 
                                              class="d-inline"
                                              onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                        >
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center p-5">
                                            Item tidak ada
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()