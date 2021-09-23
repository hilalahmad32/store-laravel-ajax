<div class="nav">
    @auth
    <a class="nav-link" href="{{ route('customer.order') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Order
    </a>
    <a class="nav-link" href="{{ route('customer.my-order') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       My Order
    </a>
    @endauth

    @guest
    <a class="nav-link" href="{{ route('admin.customer') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Customer
    </a>
    <a class="nav-link" href="{{ route('admin.model') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Model And Brand
    </a>
    <a class="nav-link" href="{{ route('admin.list') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        List of Order
    </a>
    <a class="nav-link" href="{{ route('admin.order') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
       Order
    </a>
    @endguest
    
   
   
</div>