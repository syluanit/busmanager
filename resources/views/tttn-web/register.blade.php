<div class="modal fade" id="register">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin Đăng ký</h4>
                </div>
                <div class="hienloi">
                    <div class="loi"></div>
                    <div class="loi2"></div>
                    <div class="loi3"></div>
                    <div class="loi4"></div>
                    <div class="loi5"></div>
                    <div class="dangkytc"></div>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input type="text" class="form-control dienthoai" name="phone" placeholder="Số điện thoại">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control matkhau" name="password" placeholder="Mật khẩu">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                        <input type="password" class="form-control rematkhau" name="repassword" placeholder="Xác nhận Mật khẩu">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                        <input type="button" class="form-control form-control-success dangky" name="register" value="Đăng Ký">
                    </div>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal" class="btn btn-link">Đã Có Tài Khoản?</a>
                    <button type="button" class="btn btn-danger dongdangky" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- @section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dangky").click(function(){
                alert("tedsadsadts");
            });
        });
    </script>
@endsection -->

