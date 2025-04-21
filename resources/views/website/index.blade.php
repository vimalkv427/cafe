@include('website.include.header')
@include('website.include.menubar')


		

		<div class="theme_slider_1">
			<div class="slider_slick">
				<div class="item">
					<div class="slide_item" style="background-image: url('{{ asset('web/images/1.jpg') }}');">
						<div class="container">
							<div class="slide_item_content">
								<div class="slide_item_text">Exotic and Delicious</div>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
                    <div class="slide_item" style="background-image: url('{{ asset('web/images/2.jpg') }}');">

						<div class="container">
							<div class="slide_item_content">
								<div class="slide_item_text">Exotic and Delicious</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="item">
					<div class="slide_item" style="background-image: url('{{ asset('web/images/3.jpg') }}');">
						<div class="container">
							<div class="slide_item_content">
								<div class="slide_item_text">Exotic and Delicious</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="main-wrapper pt_0">
			<div class="section_sm reserve_table bg_image_1">
				<div class="container">
					<div class="section_header">
						<img src="images/title_border.png" alt="">
						<h2 class="section_title">Reserve Your Table</h2>
						<h6 class="section_sub_title">Book a table in advance to enjoy your time with friends & Family</h6>
					</div>
					<div class="table_reserve_form">
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

					<div class="about_us_home">
						<div class="about_us_inner bg_image_10">
							<div class="spin_logo d-none d-lg-block">
								<img src="images/layer5.svg" alt="" class="linear_logo">
								<img src="images/layer6.svg" alt="" class="circle_logo">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="section_header">
										<h2 class="section_title">About Us</h2>
										<h6 class="section_sub_title">Hungrybuzz cooks food as a culnery Art</h6>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
											tempor incididunt ut labore et dolore magna aliqua. Ut en
											ad minim veniam, quis nostrud exercitation ullamco lab
											aliquip ex ea commodo consequat. Penat.</p>
										<div class="button_group">
											<a class="button" href="#">Learn More</a>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="about_imgbox">
										<div class="layer_spice_1"><img src="images/layer3.png" alt="" class="src"></div>
										<div class="layer_spice_2"><img src="images/layer4.png" alt="" class="src"></div>
										<img src="images/6.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="section_sm bg_image_7">
				<div class="container">
					<div class="section_header">
						<img src="images/title_back.png" alt="">
						<h2 class="section_title">Restaurant Menu</h2>
						<h6 class="section_sub_title">Find your favourite meal from the delicious options we have</h6>
					</div>

					<div class="foodmenu_tab">
                        <ul class="foodmenu_tab_button_group">
                            <li class="foodmenu_tab_button">
                                <a class="selected" href="#">
									<div class="tabicon">
										<img class="primary" src="images/tabicon_1_1.png" alt="">
										<img class="secondary" src="images/tabicon_1_2.png" alt="">
									</div>
									Main Course
								</a>
                            </li>
                            <li class="foodmenu_tab_button">
                                <a href="#">
									<div class="tabicon">
										<img class="primary" src="images/tabicon_2_1.png" alt="">
										<img class="secondary" src="images/tabicon_2_2.png" alt="">
									</div>
									Steaks
								</a>
                            </li>
                            <li class="foodmenu_tab_button">
                                <a href="#">
									<div class="tabicon">
										<img class="primary" src="images/tabicon_3_1.png" alt="">
										<img class="secondary" src="images/tabicon_3_2.png" alt="">
									</div>
									Snacks
								</a>
                            </li>
                            <li class="foodmenu_tab_button">
                                <a href="#">
									<div class="tabicon">
										<img class="primary" src="images/tabicon_4_1.png" alt="">
										<img class="secondary" src="images/tabicon_4_2.png" alt="">
									</div>
									Desserts
								</a>
                            </li>
                            <li class="foodmenu_tab_button">
                                <a href="#">
									<div class="tabicon">
										<img class="primary" src="images/tabicon_5_1.png" alt="">
										<img class="secondary" src="images/tabicon_5_2.png" alt="">
									</div>
									Drinks
								</a>
                            </li>
                        </ul>

                        <div class="foodmenu_tab_container">
                            <div class="foodmenu_tab_info selected">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">01.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">02.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Banana Nut Pancakes</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">03.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Swiss Hash Browns</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">04.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Perfect Scrambled Eggs</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">05.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Sesame Noodles with Garlic</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">06.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Beer-Cheeseburger</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div>  
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">07.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Spaghetti carbonara</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">08.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Grilled Cheese Crostini</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">09.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">10.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Roasted Veggie Chips</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">11.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">One-Pot Beef with Broccoli</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">12.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Pesto Chicken Bake</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div> 
                                </div>
                            </div>

                            <div class="foodmenu_tab_info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">01.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Banana Nut Pancakes</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">02.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">03.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Swiss Hash Browns</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">04.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Perfect Scrambled Eggs</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">05.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Beer-Cheeseburger</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">06.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Sesame Noodles with Garlic</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div>  
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">07.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Spaghetti carbonara</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">08.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Grilled Cheese Crostini</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">09.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">10.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Roasted Veggie Chips</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">11.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">One-Pot Beef with Broccoli</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">12.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Pesto Chicken Bake</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div> 
                                </div>
							</div>
							
							<div class="foodmenu_tab_info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">01</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">02.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Banana Nut Pancakes</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">03.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Swiss Hash Browns</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">04.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Perfect Scrambled Eggs</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">05.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Sesame Noodles with Garlic</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">06.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Beer-Cheeseburger</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div>  
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">07.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Grilled Cheese Crostini</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">08.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Spaghetti carbonara</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">09.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">10.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Roasted Veggie Chips</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">11.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">One-Pot Beef with Broccoli</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">12.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Pesto Chicken Bake</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div> 
                                </div>
							</div>
							
							<div class="foodmenu_tab_info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">01</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Perfect Scrambled Eggs</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">02.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Banana Nut Pancakes</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">03.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Swiss Hash Browns</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">04.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">05.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Sesame Noodles with Garlic</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">06.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Beer-Cheeseburger</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div>  
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">07.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Spaghetti carbonara</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">08.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Grilled Cheese Crostini</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">09.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">10.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Roasted Veggie Chips</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">11.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">One-Pot Beef with Broccoli</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">12.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Pesto Chicken Bake</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div> 
                                </div>
							</div>
							
							<div class="foodmenu_tab_info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">01</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">02.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Banana Nut Pancakes</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">03.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Swiss Hash Browns</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">04.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Perfect Scrambled Eggs</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">05.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Sesame Noodles with Garlic</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">06.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Beer-Cheeseburger</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div>  
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
											<div class="menu_serial">07.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Grilled Cheese Crostini</div>
													<div class="line"></div>
													<div class="price">$ 180</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">08.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Chicken Avocado Sandwitch</div>
													<div class="line"></div>
													<div class="price">$ 110</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">09.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Spaghetti carbonara</div>
													<div class="line"></div>
													<div class="price">$ 220</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">10.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Roasted Veggie Chips</div>
													<div class="line"></div>
													<div class="price">$ 150</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">11.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">One-Pot Beef with Broccoli</div>
													<div class="line"></div>
													<div class="price">$ 130</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>

										<div class="foodmenu_tab_content">
											<div class="menu_serial">12.</div> 
                                            <div class="menu_item">
												<div class="menu_item_inner">
													<div class="name">Pesto Chicken Bake</div>
													<div class="line"></div>
													<div class="price">$ 154</div>
												</div>
												<p>Lorem ipsum dolor sit amet consecturer duis</p>
											</div>
										</div>
                                    </div> 
                                </div>
                            </div>
                        </div>
					</div>
					
					<div class="grillman_imgtext light">
						<img src="images/grillman.png" alt="" data-aos="fade-up" data-aos-duration="1000">
						<p>Hungrybuzz Restaurant</p>
					</div>
				</div>
			</div>
			
			

		

			

	

			

			<div class="timeline section_sm bg_image_5">
				<div class="container">
					<div class="office_schedule">
						<img src="images/border_top.png" alt="">
					<div class="office_schedule_inner">
						<h6>Openning Hours</h6>
						<ul>
							<li> <span class="day">Sunday</span> <span class="time">8.00-23.00</span></li>
							<li> <span class="day">Monday</span> <span class="time">8.00-23.00</span></li>
							<li> <span class="day">Tuesday</span> <span class="time">8.00-23.00</span></li>
							<li> <span class="day">Wednesday</span> <span class="time">8.00-23.00</span></li>
							<li> <span class="day">Thursday</span> <span class="time">8.00-23.00</span></li>
							<li> <span class="day">Friday, Saturday</span> <span class="time close">Closed</span></li>
						</ul>
					</div>
					<img src="images/border_bottom.png" alt="">
					</div>
				</div>
			</div>

			<div class="clients">
				<div class="client_item">
					<div class="client_imgbox">
						<img class="primary" src="images/client_1_1.png" alt="">
						<img class="secondary" src="images/client_1_2.png" alt="">
					</div>
				</div>
				<div class="client_item">
					<div class="client_imgbox">
						<img class="primary" src="images/client_2_1.png" alt="">
						<img class="secondary" src="images/client_2_2.png" alt="">
					</div>
				</div>
				<div class="client_item">
					<div class="client_imgbox">
						<img class="primary" src="images/client_3_1.png" alt="">
						<img class="secondary" src="images/client_3_2.png" alt="">
					</div>
				</div>
				<div class="client_item">
					<div class="client_imgbox">
						<img class="primary" src="images/client_4_1.png" alt="">
						<img class="secondary" src="images/client_4_2.png" alt="">
					</div>
				</div>
				<div class="client_item">
					<div class="client_imgbox">
						<img class="primary" src="images/client_5_1.png" alt="">
						<img class="secondary" src="images/client_5_2.png" alt="">
					</div>
				</div>
			</div>

			<div class="banner_2">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div class="banner_left">
								<div class="section_header">
									<h2 class="section_title">Safe food take out</h2>
									<h6 class="section_sub_title">We are open for anu order Online</h6>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
										tempor incididunt ut labore et dolore magna aliqua. Ut en
										ad minim veniam.</p>
								</div>
								<div class="contact_info">
									<div class="phone">
										<img src="{{ asset('web/images/phone2.png') }}" alt="phone">
										<div><span>Call us to order online</span><br>+0888 . 1234 . 5699</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner_right">
								<img src="{{ asset('web/images/phone2.pngimages/banner_bg1.jpg') }}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>

			
			
		</div>

@include('website.include.footer')