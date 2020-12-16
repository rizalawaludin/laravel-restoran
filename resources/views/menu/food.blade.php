@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Form Makanan</div>

                <div class="card-body">
                	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Makanan</a><br><br>
                	<div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            	<tr>
                            		<th>No</th>
                            		<th>Name</th>
                                    <th>Price</th>
                            		<th colspan="2">Opsi</th>
                            	</tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
    	                            @foreach($food as $item)
    	                            	<tr>
    	                            		<td>{{ $no++ }}</td>
    	                            		<td>{{$item->name}}</td>
    	                            		<td>{{$item->price}}</td>
    	                            		<td>
    	                            			<a href="/food/{{$item->id}}/edit">Edit</a> |
                                                <a href="/food/{{$item->id}}/hapus">Hapus</a>
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
                        <h4>Tambah Makanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                        <form method="post" action="/food/add">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/pesanan" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop