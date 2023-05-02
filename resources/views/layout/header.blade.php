<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

                @if(!auth()->check())
                    <li style="margin: 10px 10px 0 0;font-family: sans-serif;font-size: 15px;color:red;">You are not authorized</li>
                @elseif(auth()->user()->role == 'admin')
                    <li style="margin: 10px 10px 0 0;font-family: sans-serif;font-size: 15px;color:dodgerblue;">You are authorized as {{ auth()->user()->name }}; Admin</li>
                    <li><a href="/shop" class="nav-link px-2 link-light">Shop</a></li>
                    <li><a href="/users" class="nav-link px-2 link-light">Edit users</a></li>
                    <li><a href="/all_orders" class="nav-link px-2 link-light">All orders</a></li>
                @else
                    <li style="margin: 10px 10px 0 0;font-family: sans-serif;font-size: 15px;color:dodgerblue;">You are authorized as {{ auth()->user()->name }}</li>
                    <li><a href="/shop" class="nav-link px-2 link-light">Shop</a></li>
                    <li><a href="/cart" class="nav-link px-2 link-light">Your Cart</a></li>
                    <li><a href="/orders" class="nav-link px-2 link-light">Your Orders</a></li>
                @endif

            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    @if(!auth()->check())
                        <img src="https://t3.ftcdn.net/jpg/00/57/04/58/360_F_57045887_HHJml6DJVxNBMqMeDqVJ0ZQDnotp5rGD.jpg" alt="mdo" class="rounded-circle" width="32" height="32">
                    @elseif(auth()->user()->role == 'admin')
                        <img src="https://t3.ftcdn.net/jpg/01/21/24/20/360_F_121242015_hRYuVPJmzhWQdvrkh3dk5MqjNxY3JzTr.jpg" alt="mdo" class="rounded-circle" width="32" height="32">
                    @else
                        <img src="https://w7.pngwing.com/pngs/831/88/png-transparent-user-profile-computer-icons-user-interface-mystique-miscellaneous-user-interface-design-smile-thumbnail.png" alt="mdo" class="rounded-circle" width="32" height="32">
                    @endif
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    @if(auth()->check())
                        <li><a class="dropdown-item" href="/logout">Log out</a></li>
                    @else
                        <li><a class="dropdown-item" href="/login">Log in</a></li>
                        <li><a class="dropdown-item" href="/register">Sign up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
