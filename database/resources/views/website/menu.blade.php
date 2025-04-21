@include('website.include.header')
@include('website.include.menubar')

<style>

@media (max-width: 768px) {
    .foodmenu_tab_content {
        flex-direction: column;
        align-items: flex-start;
        height: auto;
        padding: 10px;
    }

    .menu_serial img {
        width: 60px;
        height: 60px;
    }

    .menu_item {
        width: 100%;
    }

    .menu_item_inner {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }

    .name, .price {
        font-size: 14px;
    }

    .add-to-cart {
        width: 100%;
        margin-top: 5px;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .menu_serial img {
        width: 50px;
        height: 50px;
    }

    .name {
        font-size: 14px;
    }

    .price {
        font-size: 12px;
    }

    .add-to-cart {
        padding: 8px;
        font-size: 12px;
    }
}


    .foodmenu_tab_content {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
        max-width: 100%;
        height: 100px;
        overflow: hidden;
    }

    .menu_serial img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .menu_item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex-grow: 1;
    }

    .menu_item_inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    .name {
        font-weight: bold;
        font-size: 16px;
    }

    .price {
        font-size: 14px;
        color: #e74c3c;
    }

    .add-to-cart {
        background: #e74c3c;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }
</style>

<div class="page-header">
    <div class="page-header-content bg_image_header jarallax">
        <div class="container">
            <h1 class="heading">Our Menu</h1>
        </div>
    </div>
</div>

<div class="main-wrapper pt_0 pb_0">
    <div class="section_sm">
        <div class="container">
            <div class="section_header">
                <img src="{{ asset('web/images/title_back.png') }}" alt="">
                <h2 class="section_title">Restaurant Menu</h2>
                <h6 class="section_sub_title">Find your favourite meal from the delicious options we have</h6>
            </div>

            <div class="foodmenu_tab" >


            <div style="display: flex; align-items: center; justify-content: center; max-width: 80%; margin: 0 auto; position: relative; overflow: hidden;">
            <button onclick="scrollMenu('left')" style="background: none; border: none; font-size: 24px; cursor: pointer; z-index: 2; color: white;">❮</button>

                <div id="menuWrapper" style="overflow: hidden; max-width: 100%; padding: 0 10px;">
                    <ul id="categoryMenu" class="foodmenu_tab_button_group" style="display: flex; overflow-x: auto; white-space: nowrap; scrollbar-width: none; -ms-overflow-style: none; scroll-behavior: smooth; margin: 0; padding: 0;">
                        @foreach ($categories as $index => $category)
                            <li class="foodmenu_tab_button {{ $index === 0 ? 'active' : '' }}" style="flex: 0 0 calc(100% / 4); scroll-snap-align: center; text-align: center; padding: 0 5px;">
                                <a href="#tab-{{ $category->id }}" style="display: block;">
                                    <div class="tabicon">
                                        <img class="primary" src="{{ asset('web/images/tabicon_' . ($index + 1) . '_1.png') }}" alt="" style="width: 40px; height: 40px;">
                                        <img class="secondary" src="{{ asset('web/images/tabicon_' . ($index + 1) . '_2.png') }}" alt="" style="width: 40px; height: 40px;">
                                    </div>
                                    <span class="tab-text" style="font-size: 12px;">{{ $category->category_name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            <button onclick="scrollMenu('right')" style="background: none; border: none; font-size: 24px; cursor: pointer; z-index: 2; color: white;">❯</button>
            </div>
                

            







                <div class="foodmenu_tab_container"  style="margin-top: 50px;">
                    @foreach ($categories as $index => $category)
                        <div class="foodmenu_tab_info {{ $index === 0 ? 'selected' : '' }}" id="tab-{{ $category->id }}">
                            <div class="row">
                                @php
                                    $categoryProducts = $products->where('category_id', $category->id);
                                @endphp

                                @forelse ($categoryProducts as $product)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="foodmenu_tab_content">
                                            <div class="menu_serial">
                                                <img src="{{ asset('uploads/' . $product->image) }}" alt="">
                                            </div>
                                            <div class="menu_item">
                                                <div class="menu_item_inner">
                                                    <div class="name">{{ $product->name }}</div>
                                                    <div class="price">$ {{ $product->product_selling_cost }}</div>
                                                    <button class="add-to-cart" onclick="addToCart('{{ $product->id }}', '{{ $product->name }}', {{ $product->product_selling_cost }})">+</button>
                                                </div>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No products available in this category.</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let cart = [];

    function addToCart(id, name, price) {
        const existingItem = cart.find(item => item.id === id);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ id, name, price, quantity: 1 });
        }
        updateCart();
    }

    function updateCart() {
        let totalCount = 0;
        let totalAmount = 0;
        const cartBox = document.querySelector('.cart_box ul');
        cartBox.innerHTML = '';

        cart.forEach(item => {
            totalCount += item.quantity;
            totalAmount += item.price * item.quantity;
            cartBox.innerHTML += `<li>${item.name} x ${item.quantity} <span class="value">$${item.price * item.quantity}</span></li>`;
        });

        cartBox.innerHTML += `<li class="totalvalue">Total <span class="value">$${totalAmount}</span></li>`;
        document.querySelector('.cart_icon .count').textContent = totalCount;
    }
</script>


<script>
    const menu = document.getElementById('categoryMenu');
    const itemWidth = menu.scrollWidth / {{ count($categories) }};
    
    window.addEventListener('load', () => {
        menu.scrollLeft = 0; // Start at the first item
    });

    function scrollMenu(direction) {
        const scrollAmount = itemWidth * 2;
        if (direction === 'left') {
            menu.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            menu.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }


    menu.addEventListener('scroll', () => {
        clearTimeout(menu.scrollEndTimer);
        menu.scrollEndTimer = setTimeout(() => {
            const currentScroll = menu.scrollLeft;
            const nearestFullIcon = Math.round(currentScroll / itemWidth) * itemWidth;
            menu.scrollTo({ left: nearestFullIcon, behavior: 'smooth' });
        }, 100);
    });
</script>


@include('website.include.footer')
