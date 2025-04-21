@include('website.include.header')
@include('website.include.menubar')

		<!-- Page Header -->
        <div class="page-header">
            <div class="page-header-content bg_image_header jarallax">
                <div class="container">
                    <h1 class="heading">Gallery Dark</h1>
                </div>
            </div>
        </div>
			
		<div class="main-wrapper">
			<div class="container">
				
				<div class="portfolio_grid">
					<div class="portfolio_filters_button_content">
						<div class="button-group filters-button-group">
							<button class="button is-checked" data-filter="*">All</button>
							<button class="button" data-filter=".drinks">Drinks</button>
							<button class="button" data-filter=".dessert">Dessert</button>
							<button class="button" data-filter=".coffee">Coffee</button>
							<button class="button" data-filter=".stake">Stake</button>
							<button class="button" data-filter=".seafood">Seafood</button>
						</div>
					</div>
					<div class="grid-masonary gutter-15 clearfix">
    <div class="grid-sizer"></div>
    @for ($i = 1; $i <= 10; $i++)
        <div class="grid-item img-{{ $i === 7 ? '70' : ($i % 2 === 0 ? '40' : '30') }} {{ $i % 3 === 0 ? 'dessert' : ($i % 4 === 0 ? 'stake' : ($i % 5 === 0 ? 'seafood' : 'drinks')) }}">
            <div class="product_thumb">
                <div class="product_imagebox">
                    <img class="primary_img" src="{{ asset('web/images/gallery/' . $i . '.jpg') }}" alt="img">
                </div>
                <div class="product_item_inner">
                    <div class="label_text">
                        <h4 class="food_category">{{ ucfirst($i % 3 === 0 ? 'dessert' : ($i % 4 === 0 ? 'stake' : ($i % 5 === 0 ? 'seafood' : 'drinks'))) }}</h4>
                        <h3 class="food_item_name">Item Name {{ $i }}</h3>
                    </div>
                    <div class="details">
                        <a data-fancybox="images" href="{{ asset('web/images/portfolio/' . $i . '.jpg') }}">
                            <i class="ion-ios-plus-empty"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>

				</div>
			</div>
		</div>

@include('website.include.footer')
