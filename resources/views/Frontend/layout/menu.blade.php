<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">{{__("E-Commerce")}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('/produk')}}">{{__("Home")}}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/pesanan')}}">{{__("Order")}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">User</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                       
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a href="{{url('/produk/cart')}}" class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{ session()->get('CartTotal') }}</span>
                </a>
            </form>
        </div>
    </div>
</nav>
