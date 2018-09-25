<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

</head>
<body>
	<div class="header">
		<ul>
			<li><button type="button" class="btn">Đăng ký</button></li>
			<li><button type="button" class="btn">Đăng nhập</button></li>
		</ul>
	</div>
	<div class="menu">
		<ul>
			<li><a href=""><i class="glyphicon glyphicon-home" aria-hidden="true"></i>
				<span>TRANG CHỦ</span>
				</a>
			</li>
			<li>
				<a href="datve">
					<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
					<span>ĐẶT VÉ</span>
				</a>
			</li>
			<li>
				<a href="tintuc">
					<i class="glyphicon glyphicon-text-size" aria-hidden="true"></i>
					<span>TIN TỨC</span>
				</a>
			</li>
			<li>
				<a href="gioithieu">
					<i class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></i>
					<span>GIỚI THIỆU</span>
				</a>
			</li>
			<li>
				<a href="lienhe">
					<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
					<span>LIÊN HỆ</span>
				</a>
			</li>
		</ul>
	</div>
	<div style="clear: all;"></div>
	<div class="main">
		<div class="left">
			<div class="slideshow-container">

			<div class="mySlides fade1">
			  <div class="numbertext">1 / 3</div>
			  <a href="#"><img src="images/1.jpg" style="height:400px; width: 100%;"></a>
			  <div class="text">Địa điểm 1</div>
			</div>

			<div class="mySlides fade1">
			  <div class="numbertext">2 / 3</div>
			  <a href="#"><img src="images/2.jpg" style="height:400px;width: 100%;"></a>
			  <div class="text">Địa điểm 2</div>
			</div>

			<div class="mySlides fade1">
			  <div class="numbertext">3 / 3</div>
			  <a href="#"><img src="images/3.jpg" style="height:400px;width: 100%;"></a>
			  <div class="text">Địa điểm 3</div>
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
			<br>

			<div style="text-align:center">
			  <span class="dot" onclick="currentSlide(1)"></span> 
			  <span class="dot" onclick="currentSlide(2)"></span> 
			  <span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>
		<div class="right">
			<div class="timchuyendi"><h4>ĐẶT VÉ TRỰC TUYẾN</h4></div>
			<div class="diadiem">
				<label>Chọn Nơi Khởi Hành </label>
				<div class="the">
				<i class="fa fa-bus"></i>
				<select>
					<option>Quảng Ngãi</option>
					<option>Hồ Chí Minh</option>
					<option>Hà Nội</option>
					<option>Bình Định</option>
				</select>
				</div>
			</div>
			<div class="diadiem">
				<label>Chọn Nơi Đến </label>
				<div class="the">
				<i class="fa fa-bus"></i>
				<select>
					<option>Hồ Chí Minh</option>
					<option>Hà Nội</option>
					<option>Quảng Ngãi</option>
					<option>Bình Định</option>
				</select>
				</div>
			</div>
			<div class="ngaydi">
				<label>Chọn ngày đi: </label>
				<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> <input class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
				</div>
				<div class="tim">
					<i class="fa fa-ticket icon-flat bg-btn-actived"></i>
					<button type="button" class="btn"><a href="chuyenxe.html">Tìm vé</a></button>
				</div>
			</div>
		</div>
		<div style="clear: left;"></div>
		<div class="tintuc">
			<div class="tentintuc"><h2>Tin Tức Nổi Bật</h2></div>
			<ul>
				<li>
					<img src="images/12.jpg">
					<a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
				</li>
				<li>
					<img src="images/12.jpg">
					<a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
				</li>
				<li>
					<img src="images/12.jpg">
					<a><strong>CHUYỂN TUYẾN HẢI PHÒNG ↔ HỒ CHÍ MINH, VŨNG TÀU VỀ BẾN THƯỢNG LÝ - HẢI PHÒNG TỪ 22/11/2017</strong></a>
				</li>
			</ul>
			<div class="tintucbutton">
				<button><a href="tintuc.html">Xem Toàn Bộ</a></button>
			</div>
		</div>
		<div style="clear: left;"></div>
		<div class="footer">
			<ul>
				<li>
					<h3>Liên Hệ</h3>
					<i class="fa fa-home" aria-hidden="true"></i>
					<i>Đại Học Bách Khoa HCM</i><br>
					<i class="fa fa-phone" aria-hidden="true"></i>
					<i>0989671651</i><br>
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<i>nhan51202526@gmail.com</i>
				</li>
				<li>
					<h4> &copy; Bảng Quyền Thuộc Về Đại Học Bách Khoa HCM </h4>
					<h4>Tất cả vì khách hàng - Thiết Kế bới Nhóm 30</h4>
				</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/date.js"></script>
</body>
</html>