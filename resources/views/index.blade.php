@extends('layout.front')
@section('main')
<h1>個人資料</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/" method="POST">
    @csrf 
    <div class="mb-3">
        <label for="username" class="form-label">姓名</label>
        <input type="text" class="form-control" id="username" name="username" >
    </div>
    <div class="mb-3">
        <label for="userheight" class="form-label">身高(cm)</label>
        <input type="number" class="form-control" id="userheight" name="userheight">
    </div>
    <button type="submit" class="btn btn-primary">確認</button>
</form>
@endsection
