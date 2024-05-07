@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    .full-height {
        height: calc(100vh - 20px); /* Ajusta el valor según tus necesidades */
        /* 20px se refiere a un margen de 10px arriba y abajo */
    }
</style>

<div class="container full-height">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
        <table class="table table-hover" width="100%">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito as $index => $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> 
                                    <img class="media-object" src="https://icons.iconarchive.com/icons/ionic/ionicons/256/fast-food-outline-icon.png" style="width: 72px; height: 72px;"> 
                                </a>
                                <div class="media-body">
                                    <div class="producto">
                                        <h4>{{ $item['producto']->nombre }}</h4><h4 class="media-heading"></h4>
                                        <h4 class="media-heading">{{ $item['producto']->descripcion }}</h4>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <p>{{ $item['cantidad'] }}</p>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><p>${{ $item['producto']->precio }}</p></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{ $item['producto']->precio * $item['cantidad'] }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <form id="remove-form-{{ $index }}" action="{{ route('carrito.remove', ['index' => $index]) }}" method="POST" style="display: none;">                                
                                @csrf
                            </form>
                            <button type="button" class="btn btn-danger remove-btn" data-index="{{ $index }}">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>${{ $total }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a href="{{ route('user.home') }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Seguir comprando
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('pedidos.ticket') }}" method="GET">
                                {{-- Resto del formulario --}}
                                @csrf
                                <button type="submit">Confirmar Pedido</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>
</div>
<form id="remove-form" action="{{ route('carrito.remove', ['index' => '__index__']) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="index" id="remove-index">
</form>
<script>
    $(document).ready(function() {
        $('.remove-btn').click(function() {
            var index = $(this).data('index');
            $('#remove-index').val(index);
            $('#remove-form').attr('action', $('#remove-form').attr('action').replace('__index__', index));
            $('#remove-form').submit();
        });
    });

    $('#confirmar-pedido-form').submit(function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        // Resto del código para confirmar el pedido
    });
</script>
@endsection