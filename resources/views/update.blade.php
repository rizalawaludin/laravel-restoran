@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Pesanan</div>
                <div class="card-body">
                    <div class="modal-body">
                        <form method="post" action="/order/{$a->id}/update">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>No Meja</label>
                                <input type="text" class="form-control" name="no_meja" required value="{{$a->no_meja}}">
                            </div>
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <input type="text" class="form-control" name="pelanggan" required value="{{$a->pelanggan}}">
                            </div>
                            <div class="form-group">
                                <label>Makanan</label>
                                <select name="id_food" id="" class="form-control">
                                    @foreach($a->foods as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                    <option value="{{$b->name}}">{{$b->name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Minuman</label>
                                <select name="id_drink" id="" class="form-control">
                                    @foreach($a->drinks as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                </select>
                            </div>
                            <input type="hidden" name="no_pesanan" required value="{{$a->no_pesanan}}">
                            <input type="hidden" name="status" required value="{{$a->status}}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/order" class="btn btn-default">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
