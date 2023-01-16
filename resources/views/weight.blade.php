@extends('layout.front')
@section('main')
<h1>今日體重</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/weight" method="POST">
    @csrf 
    <div class="mb-3">
        <label for="userheight" class="form-label">體重(kg)</label>
        <input type="number" class="form-control" id="userweight" name="userweight">
    </div>
    <button type="submit" class="btn btn-primary">確認</button>
</form>
<div>
<h2>最近一次的紀錄</h2>
<p>BMI:<strong style="color:blueviolet">{{$user->userbmi}}</strong></p>
<p>身高:{{$user->userheight}}</p>
<p>體重:{{$user->userweight}}</p>
</div>
@endsection