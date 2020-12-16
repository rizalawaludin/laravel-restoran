@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pembayaran</div>

                <div class="card-body">
                    <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="">Silahkan Pilih No Meja</label>
                        <select name="" onchange="pay()" id="pay" class="form-control" required> 
                            <option value="">- Select -</option>
                            @foreach($order as $item)
                            <option value="">{{$item->no_meja}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">       
                            <div class="form-group">
                                <label for="">Makan</label>
                                <input type="text" class="form-control" id="food" name="food" readonly>
                                <label for="">Harga</label>
                                <input type="text" class="form-control" id="pay_food" name="pay_food" readonly> 
                            </div>
                        </div>
                        <div class="col-md-6">   
                            <div class="form-group">
                                <label for="">Minum</label>
                                <input type="text" class="form-control" id="drink" name="drink" readonly>
                                <label for="">Harga</label>
                                <input type="text" class="form-control" id="pay_drink" name="pay_drink" readonly>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    function pay() {
        var pay = $('#pay').val();
        $.ajax({
            url:'{{ route("payment") }}',
            data:"pay="+pay ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#makanan').val(obj.makanan);
            $('#minuman').val(obj.minuman);
 
            var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');
		if(obj.jenis_kelamin == 'laki-laki'){
			$jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
		}else{
			$jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
		}
        });
    }
</script>
@endsection
