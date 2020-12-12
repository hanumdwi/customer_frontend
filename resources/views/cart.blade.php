<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PT. MDC Trans Lamongan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="asset/vegfoods/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="asset/vegfoods/css/animate.css">
    
    <link rel="stylesheet" href="asset/vegfoods/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/vegfoods/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/vegfoods/css/magnific-popup.css">

    <link rel="stylesheet" href="asset/vegfoods/css/aos.css">

    <link rel="stylesheet" href="asset/vegfoods/css/ionicons.min.css">

    <link rel="stylesheet" href="asset/vegfoods/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="asset/vegfoods/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="asset/vegfoods/css/flaticon.css">
    <link rel="stylesheet" href="asset/vegfoods/css/icomoon.css">
    <link rel="stylesheet" href="asset/vegfoods/css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-danger">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">(0322) 3101285</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">groupmdc@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">PT. MDC Trans &amp; 24/7 Discussion</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ url('asset/vegfoods/images/mdc.png') }}" class="rounded" alt="image">
	    </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Information</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ url('shopbus') }}">Armada</a>
                <!-- <a class="dropdown-item" href="{{ url('detailbus') }}">Informasi Armada</a> -->
                <a class="dropdown-item" href="{{ url('shoppaket') }}">Paket Wisata</a>
                <!-- <a class="dropdown-item" href="{{ url('detailpaket') }}">Informasi Paket Wisata</a> -->
                <!-- <a class="dropdown-item" href="{{ url('cart') }}">Cart</a> -->
                <a class="dropdown-item" href="{{ url('checkout') }}">Booking</a>
              </div>
            </li>
	          <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
	          <!-- <li class="nav-item"><a href="{{ url('testimony') }}" class="nav-link">Testimony</a></li> -->
	          <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="{{ url('cart') }}" class="nav-link"><span class="icon-bus"></span></a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
	</div>
	</br>
	</br>
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
            <h1>Formulir Pemesanan</h1>
              <hr>
            </div>
            <div class="col-md-12 text-left">
			<p class="alert alert-primary">
                Isi data pemesanan Anda dengan lengkap dan benar.
              </p>
					<input type="text" class="form-control" id="search" name="search" value="" placeholder="Enter Your Bus!" onkeydown="getModal(event)">
</br>
<form method ="post" action="posstore">
        @csrf
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Armada</th>
						        <th>Tujuan</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
                              @foreach($sewa_bus_category as $sbd)
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></a></td>
						        <td>
						        <select name="ID_CATEGORY" class="form-control" id="ID_CATEGORY">
									@foreach($category_armada as $c)
													
										<option value="{{$c->ID_CATEGORY}}">{{$c->NAMA_CATEGORY}}</option>
													
									@endforeach                 
								</select>
						        </td>
						        <td>
									<select name="TUJUAN_SEWA" class="form-control" id="TUJUAN_SEWA1" onchange="getPrice()">
										@foreach($pricelist_sewa_armada as $pr)
															
											<option id="TUJUAN_SEWA1{{$pr->ID_PRICELIST}}" value="{{$pr->ID_PRICELIST}}" 
											data-pricelist="{{$pr->PRICELIST_SEWA}}">{{$pr->TUJUAN_SEWA}}</option>
															
										@endforeach                 
									</select>
								</td>
						        
						        <td>
									<input type="number"  name="hargasewa" id="hargasewa1" class="form-control" readonly
									onchange="getTotal()">
								</td>
						        
						        <td class="quantity">
                                    	<input type="number" name="QUANTITY" class="form-control"  
                						placeholder="Jumlah" min="1" max="3" required id="qty" onchange="getTotal()">
					          
					          </td>
						        
						        <td class="total">
									<input type="number" name="subtotal" id="subtotal1" class="form-control">
                                </td>
                              </tr><!-- END TR-->
                              @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
           
            <div class="row justify-content-end">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    					</p>
    					<p class="d-flex">
    						<span>Dp (25%)</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Sisa Bayar</span>
    						<!-- <span>$17.60</span> -->
    					</p>
    				</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger"><i class="icon-times"></i>  Reset</button>
						<button type="submit" class="btn btn-success"><i class="icon-save"></i>  Insert</button>
    				
					</div>
                            </form>
                            </div>
    			</div>
                </section>
</br>
</br>
<section class="ftco-section bg-light">
		</section>

            <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
			<h2 class="ftco-heading-2">PT. MDC Trans</h2>
              <p> Merupakan PO bus pariwisata yang berasal dari Lamongan, Jawa Timur.
                  Bus pariwisata ini melayani transportasi wisata di Indonesia, khususnya di Pulau Jawa, Bali, Lombok, 
                  dan sebagian Sumatera.
                  Bus pariwisata MDC Trans Trans melayani antar jemput, drop bandara, trip wisata, wisata ziarah, 
                  kunjungan industri dan atau menyesuaikan kebutuhan pelanggan.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Informasi</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Testimony</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Booking Information</a></li>
	                <li><a href="#" class="py-2 d-block">Make an Appoitment</a></li>
					<li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	              <!-- <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul> -->
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Soewoko No.43 A, RT.2/RW.2, Jetis, Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62211</span></li></br>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">0823-6330-6033</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">groupmdc@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  PT. Madina Dzikra Cemerlang <script>document.write(new Date().getFullYear());</script> | MDC Trans Lamongan <i class="icon-bus color-danger" aria-hidden="true"></i> <a href="#" target="_blank"></a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>

	function getPrice(){
		console.log("masuk");
		var tujuan = document.getElementById('TUJUAN_SEWA1').value;
		var tmp = document.getElementsByTagName('select')[0].getAttribute("TUJUAN_SEWA[]");
		console.log(tmp);
		var ratings =  $('#TUJUAN_SEWA1'+tujuan).data('pricelist');
		var price = document.getElementById('hargasewa1').value;
		//    var harga = $('#TUJUAN_SEWA1'+this.value).data('pricelist');
		console.log(ratings);
		$('#hargasewa1').val(ratings);
	}

	function getTotal(){
		var sub = document.getElementById('hargasewa1').value;
		var kuantiti = document.getElementById('qty').value;
		var subtotal = (Number(sub*kuantiti));
		$('#subtotal1').val(subtotal);
	}

</script>

  <script src="asset/vegfoods/js/jquery.min.js"></script>
  <script src="asset/vegfoods/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="asset/vegfoods/js/popper.min.js"></script>
  <script src="asset/vegfoods/js/bootstrap.min.js"></script>
  <script src="asset/vegfoods/js/jquery.easing.1.3.js"></script>
  <script src="asset/vegfoods/js/jquery.waypoints.min.js"></script>
  <script src="asset/vegfoods/js/jquery.stellar.min.js"></script>
  <script src="asset/vegfoods/js/owl.carousel.min.js"></script>
  <script src="asset/vegfoods/js/jquery.magnific-popup.min.js"></script>
  <script src="asset/vegfoods/js/aos.js"></script>
  <script src="asset/vegfoods/js/jquery.animateNumber.min.js"></script>
  <script src="asset/vegfoods/js/bootstrap-datepicker.js"></script>
  <script src="asset/vegfoods/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="asset/vegfoods/js/google-map.js"></script>
  <script src="asset/vegfoods/js/main.js"></script>
    
  </body>
</html>