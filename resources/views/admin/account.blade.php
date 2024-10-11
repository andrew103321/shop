@extends("layouts.layout")


@section("main")
<!-- control Start -->
<div class="container-fluid p-3">
    <div class=" d-flex justify-content-end">
        <div class="row ">
            <div class="col-12 col-sm-12 text-center text-sm-start ms-auto ">
                <a type="button" class="btn btn-primary m-2">新增編輯權限群組</a>
                <a type="button" href="{{ route('admin.authority_personnel') }}" class="btn btn-primary m-2">新增管理人員</a>
            </div>
        </div>
    </div>
</div>
<!-- control End -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">管理人員權限設定</h6>
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">帳號</th>
                                <th scope="col">姓名</th>
                                <th scope="col">權限群組</th>
                                <th scope="col">狀態</th>
                                <th scope="col">歸屬者</th>
                                <th scope="col">管理</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>jhon@email.com</td>
                                <td>USA</td>
                                <td>123</td>
                                <td>
                                    <button type="button" class="btn btn-primary ">編輯</button>
                                    <button type="button" class="btn btn-secondary ">停用</button>
                                    <button type="button" class="btn btn-success ">刪除</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection