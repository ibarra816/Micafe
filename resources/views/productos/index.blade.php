@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>Lista de Productos</h1>
            </div>
            <div class="col">
                <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-11 offset-md-0">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>descripcion</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>
                                    @if ($producto->imagen)
                                        <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" style="width: 100px;">
                                    @endif
                                </td>
                                
                                
                                <td>
                                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
