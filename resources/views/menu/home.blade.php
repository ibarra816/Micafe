<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- resources/views/productos/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<a id="top"></a>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('user.home') }}">MiCafe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#productos-section">Inicio</a></li>
                    @can('crear-rol', 'ver-rol')
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Actualizar menú</a></li>
                    @endcan
                    <li class="nav-item dropdown">
                        @can('crear-rol')
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">roles y permisos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item"><a class="nav-link" href="/usuarios">usuarios</a></li>
                            <li class="nav-item"><a class="nav-link" href="/roles">roles</a></li>
                        
                        </ul>
                        @endcan
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item"><a class="nav-link" href="{{ route('pedidos.usuario') }}">mis pedidos</a>
                            <li class="nav-item"><a class="nav-link" href="{{ route('perfil.info') }}">perfil</a>
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('carrito') }}">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{$num}}</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
     <!-- Header-->
     <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">El menú de hoy</h1>
                <p class="lead fw-normal text-white-50 mb-0">Aquí encontraras una lista actualizada de nuestro menú</p>
            </div>
        </div>
    </header>

@section('content')
    <table class="table mt-3">
        <tbody>
           
           <section class="py-5" id="productos-section">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($productos as $producto)   
                <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset($producto->img) }}" alt="Imagen del producto" />                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                  <h5>{{ $producto->nombre }}</h5>
                                  <p>{{ $producto->descripcion }}</p>  
                                  <p>${{ $producto->precio }}</p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <a class="btn btn-outline-dark mt-auto add-to-cart scroll-to-top" href="{{ route('agregarAlCarrito', $producto->id) }}#top" data-product-id="{{ $producto->id }}">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        <a class="btn btn-outline-dark mt-auto add-to-cart scroll-to-top" href="#top">Regresar al Inicio</a>
                    </div>
        </section>
   
        @endsection
         @yield('content')
         @push('scripts')
    <script>
        @if(session('productoCreado'))
            window.location = '{{ route("productos.index") }}' + '#producto-{{ session("productoCreado")->id }}'
            
        @endif
    </script>
        @endpush
        </tbody>
    </table>
    
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; MiCafe 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
  <!-- JavaScript -->
  <script>
    $(document).ready(function() {
        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            $.ajax({
                url: '{{ route("agregarAlCarrito") }}',
                method: 'POST',
                data: { productId: productId, _token: '{{ csrf_token() }}' },
                success: function(response) {
                    var cartCount = response.cartCount;
                    $('.badge').text(cartCount);
                },
                error: function(xhr) {
                    // Handle error here...
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.scroll-to-top').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 'fast');
        });
    });
</script>
</body>
</html>