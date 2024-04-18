<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">EBook</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right hidden-sm">
                <li>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nhập tên sách">
                        </div>
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>
                </li>
                @auth
                <li>
                    <a href="center.html">Chào mừng, {{ auth()->user()->email }}</a>
                </li>
                @endauth
                <li>
                    <a href="cart.html"><span class="glyphicon glyphicon-shopping-cart">Giỏ hàng</span></a>
                </li>
                @guest
                <li><a href="login.html">Đăng nhập</a></li>
                <li><a href="register.html">Đăng ký</a></li>
                @endguest
                <li>
                    <a href="center.html">Chào mừng, user</a>
                    <a href="{{ route('logout.perform') }}">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </div>
</div>
