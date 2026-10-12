@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa hãng sản xuất</div>
		<div class="card-body">
			<form action="{{ route('hangsanxuat.sua', ['id' => $hangsanxuat->id]) }}" method="post">
				@csrf
				<div class="mb-3">
					<label class="form-label" for="tenhang">Tên loại</label>
					<input type="text" class="form-control" id="tenhang" name="tenhang" value="{{ $hangsanxuat->tenhang }}" required />
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection