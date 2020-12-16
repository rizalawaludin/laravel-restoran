@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Pemesanan</div>

                <div class="card-body">
                	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</a><br><br>
                	<div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            	<tr>
                            		<th>No Meja</th>
                            		<th>Pelanggan</th>
                                    <th>Makanan</th>
                                    <th>Minuman</th>
                            		<th colspan="1">Opsi</th>
                            	</tr>
                            </thead>
                            <tbody>
    	                            @foreach($product as $item)
    	                            	<tr>
    	                            		<td>{{$item->no_meja}}</td>
    	                            		<td>{{$item->pelanggan}}</td>
    	                            		<td>
                                                @foreach($item->foods as $f)
                                                    {{$f->name}}
                                                @endforeach
                                            </td>
    	                            		<td>
                                                @foreach($item->drinks as $f)
                                                    {{$f->name}}
                                                @endforeach
                                            </td>
    	                            		<td>
    	                            			<a href="/order/{{$item->id}}/edit">Edit</a> |
                                                <a href="/order/{{$item->id}}/hapus">Hapus</a>
    	                            		</td>
    	                            	</tr>
    	                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header">
                        <h4>Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                        <form method="post" action="/order/add">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>No Meja</label>
                                <input type="text" class="form-control" name="no_meja" required>
                            </div>
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <input type="text" class="form-control" name="pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label>Makanan</label>
                                <select name="id_food" id="" class="form-control" required> 
                                    <option value="">- Select -</option>
                                    @foreach($food as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Minuman</label>
                                <select name="id_drink" id="" class="form-control" required> 
                                    <option value="">- Select -</option>
                                    @foreach($drink as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/order" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop