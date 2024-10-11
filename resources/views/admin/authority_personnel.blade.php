@extends("layouts.layout")

@section("main")

<!--自訂翻譯-->
<!-- @if ($message = Session::get('error_message'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif -->

@if ($message = Session::get('success_message'))
<script>
    alert('{{ $message }}');
</script>
@endif

<div class="container pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6">
            <form action="authority_personnel" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4 text-center">管理人員權限設定</h6>
                    <div class="row  pt-3">
                        <label class="col-md-3 control-label" for="name">姓名<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="row pt-3">
                        <label class="col-md-3 control-label" for="account">帳號<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="account" name="account" class="form-control" placeholder="" value="{{ old('account') }}">
                        </div>
                    </div>

                    <div class="row pt-3">
                        <label class="col-md-3 control-label" for="password">密碼<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" class="form-control" placeholder="" value="">
                        </div>
                    </div>
                    <div class="row pt-3">
                        <label class="col-md-3 control-label" for="repassword">確認密碼<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" id="repassword" name="repassword" class="form-control" placeholder="" value="">
                        </div>
                    </div>

                    <div class="row pt-3">
                        <label class="col-md-3 control-label" for="photo">頭像<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="file" >
                        </div>
                    </div>

                    <div class="row pt-3">
                        <label class="col-md-3 control-label" for="remark">備註<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="remark" id="remark" cols="30" rows="3">{{ old('remark') }}</textarea>
                        </div>
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row pt-3 justify-content-center">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary m-3 center">Primary</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection