<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Ebook Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                Danh mục
            </a>
        </li>
        <li>
            <a href="{{ route('admin.authors.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                Tác giả
            </a>
        </li>
        <li>
            <a href="{{ route('admin.books.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table" />
                </svg>
                Sách
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid" />
                </svg>
                Người dùng
            </a>
        </li>
        <li>
            <a href="{{ route('admin.statistic') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid" />
                </svg>
                Thống kê doanh thu
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            
            <strong>{{ auth()->user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
