@extends('layouts.app');

@section('css')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/banners">首頁橫幅管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增首頁橫幅</li>
            </ol>
        </nav>

        <form method="POST" action="/admin/banners/store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="imageUrl">橫幅圖片*<small class="text-danger"> (必填) 建議尺寸1920*1280px</small></label>
                <input name="imageUrl" type="file" class="form-control-file" id="imageUrl" required>
            </div>

            <div class="form-group">
                <label for="description">描述<small class="text-danger"> (選填) 請輸入圖片用途及描述，只會顯示在後台</small></label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="link">連結<small> (選填) 如果點擊圖片後需要引導到其他網頁，請設定在此處</small></label>
                <input name="link" type="text" class="form-control" id="link">
            </div>
            <div class="form-group">
                <label for="sort">權重*<small class="text-danger">(必填) 預設值為"0"</small></label>
                <input name="sort" type="number" class="form-control" id="sort" value="0" required>
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')


@endsection
