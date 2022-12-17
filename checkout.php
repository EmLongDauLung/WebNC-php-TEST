<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKINLELE.COM</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    a:hover {
        direction: none;
    }
</style>
<body>
   
    <div class="container" style="align-items: center;justify-content: center; background-color: #f6f7fb;border-radius: 10px;">
        <h3 style="margin-top: 50px;padding: 20px;">NHẬP THÔNG TIN THANH TOÁN</h3>
        <div>
            <form style="margin-top: 40px;" method="POST" action="process_checkout.php">
                <div class="form-group">
                    <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;">HỌ VÀ TÊN NGƯỜI NHẬN</label>
                    <input style="font-size: 14px;width: 60%;" type="text" class="form-control" placeholder="Nhập họ tên" name="name_receiver">
                </div>
                <div class="form-group">
                    <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;">SỐ ĐIỆN THOẠI</label>
                    <input style="font-size: 14px;width: 60%;" type="text" class="form-control" name="phone_number_receiver" placeholder="Nhập số điện thoại">
                </div>

                <div class="form-group">
                    <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;">ĐỊA CHỈ NHẬN HÀNG</label>
                    <input style="font-size: 14px;width: 60%;" type="text" class="form-control" placeholder="Nhập địa chỉ" name="address_receiver">
                </div>

                <div class="form-group" style="width: 300px;">
                    <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;">NGÂN HÀNG</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="ádas">Không chọn</option>
                        <option value="NCB"> Ngan hang NCB</option>
                        <option value="AGRIBANK"> Ngan hang Agribank</option>
                        <option value="SCB"> Ngan hang SCB</option>
                        <option value="SACOMBANK">Ngan hang SacomBank</option>
                        <option value="EXIMBANK"> Ngan hang EximBank</option>
                        <option value="MSBANK"> Ngan hang MSBANK</option>
                        <option value="NAMABANK"> Ngan hang NamABank</option>
                        <option value="VNMART"> Vi dien tu VnMart</option>
                        <option value="VIETINBANK">Ngan hang Vietinbank</option>
                        <option value="VIETCOMBANK"> Ngan hang VCB</option>
                        <option value="HDBANK">Ngan hang HDBank</option>
                        <option value="DONGABANK"> Ngan hang Dong A</option>
                        <option value="TPBANK"> Ngân hàng TPBank</option>
                        <option value="OJB"> Ngân hàng OceanBank</option>
                        <option value="BIDV"> Ngân hàng BIDV</option>
                        <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                        <option value="VPBANK"> Ngan hang VPBank</option>
                        <option value="MBBANK"> Ngan hang MBBank</option>
                        <option value="ACB"> Ngan hang ACB</option>
                        <option value="OCB"> Ngan hang OCB</option>
                        <option value="IVB"> Ngan hang IVB</option>
                        <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="font-size: 18px;font-family: 'Times New Roman', Times, serif;">TỔNG TIỀN</label>
                    <div></div>
                </div>
                <button class="btn btn-success" name="redirect" id="redirect" style="margin-bottom: 10px;">THANH TOÁN</button>
            </form>
            <a  href="view_cart.php"><button style="margin-top: -86px;margin-left: 145px;background-color: #00ab90;" class="btn btn-success">QUAY LẠI</button></a>
        </div>
    </div>
    
</body>

</html>