@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container-fliud px-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">產品管理 - Product</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/products/create">新增產品</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>產品名稱(productName)</th>
                                    <th>價格(price)</th>
                                    <th>描述(content)</th>
                                    <th>排序(sort)</th>
                                    <th>主視覺圖(mainImage)</th>
                                    <th>類別(productType)</th>
                                    <th>庫存數量(stock)</th>
                                    {{-- 顯示的部分之後調整到功能區 --}}
                                    <th>顯示(visble)</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->productName }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->sort }}</td>
                                        <td class="d-flex">
                                            @foreach  ($product->productMainImg as $MainImg)
                                            <img class="m-1" height="75" src="{{ $MainImg->imageUrl }}" alt="">
                                            @endforeach
                                            </td>
                                        <td>

                                            {{ $product->productType->typeName }}

                                            </td>
                                        <td>
                                            <select name="stock" id="">
                                                <option value="{{ $product->visible }}"> {{ $product->productName}}:{{$product->visible }}</option>
                                            </select>
                                           </td>
                                        <td>{{ $product->visible }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="/admin/products/edit/{{ $product->id }}">編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-itemid="{{ $product->id }}">刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [1, "desc"] //根據第一欄倒序排列
            });
        });

        $("#example").on("click", ".btn-delete", function() {
                var item_id = this.dataset.itemid;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                        window.location.href = `/admin/productClasses/destroy/${item_id}`;

                    }
                })



            })

    </script>
@endsection
