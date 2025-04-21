<body class="dark_bg">

<div id="preloader" class="loader_show">
    <div class="loader-wrap">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
</div>

<!-- pointer start -->
<div class="pointer bnz-pointer" id="bnz-pointer"></div>

<!-- Header 1 -->
<header class="header header_type1">
    <div class="top_bar">
        <div class="container-fluid">
            <div class="top_bar_inner">
                
            <div class="nav_more_info">
    <div class="element">
        <a href="#" class="cart_icon">
            <i class="icon-basket"></i> 
            <span class="count">0</span>
        </a>
        <div class="cart_box">
            <div class="grand_total">
                <ul id="cart-items">
                    <!-- Cart items will be dynamically added here -->
                </ul>
                <li class="totalvalue">Total <span class="value" id="cart-total">$0</span></li>
                <div class="button_group">
                    <input class="button" type="submit" value="Checkout" name="submit">
                </div>
            </div>
        </div>
    </div>
</div>


                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('web/images/logo.svg') }}" alt="logo"></a>
                </div>
                
                <div class="mainnav">
                    <ul class="main_menu">
                        <li class="menu-item  active"><a href="{{ url('/') }}">Home</a>
                            
                        </li>
                        <li class="menu-item"><a href="{{ url('/about') }}">About</a></li>
                        <li class="menu-item"><a href="{{ url('/menu') }}">Menu</a></li>                       
                        <li class="menu-item logo-item"><a href="{{ url('/') }}"><img src="{{ asset('web/images/logo.svg') }}" alt="logo"></a></li>
                        <li class="menu-item"><a href="{{ url('/gallery') }}">Gallery</a></li>
                        <li class="menu-item"><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>

                <!-- Reservation Popup -->
                <div class="reserve_button_group reserve_btn_popup d-none d-sm-block">
                    <a class="button" href="#">
                        <span class="btn_line"></span>
                        <span class="btn_line"></span>
                        <span class="btn_line"></span>
                    </a>
                </div>

                <div class="header_toggle d-xl-none">
                    <!-- mobile menu toggle button -->
                    <button class="ma5menu__toggle" type="button">
                        <span class="toggle_line"></span>
                        <span class="toggle_line"></span>
                        <span class="toggle_line"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="reserve_table_popup">
			<span class="popup_close"><i class="ion-ios-close-empty"></i></span>
			<div class="table_reserve_form">
				<div class="section_header">
					<img src="{{ asset('web/images/title_border.png') }}" alt="">
					<h2 class="section_title">Reserve Table</h2>
				</div>
				<form class="reserve_form" action="contact.php" method="post">
					<div class="form-container">
						<div class="form-group">
							<label for="name">Your Name</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Ex: John Doe" required="">
						</div>
						<div class="form-group">
							<label for="number">No. of Person</label>
							<input type="number" id="number" name="number" class="form-control" placeholder="No. of Person" value="" min="1" required="">
						</div>
						<div class="form-group">
							<label for="date">Date</label>
							<input type="date" id="date" name="date" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="time">Time</label>
							<input type="time" id="time" name="time" class="form-control" required="">
						</div>
						<div class="button_group">
							<input class="button" type="submit" value="Reserve A Table" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>