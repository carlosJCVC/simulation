@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="btn btn-outline-success" onclick="openModalSimulate({{$product}})">Simular</div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Datos de la simulacion</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Demanda</th>
                            <th>Precio Venta</th>
                            <th>Precio Compra</th>
                            <th>Coste Compra</th>
                            <th>Coste Exceso</th>
                            <th>Coste Beneficios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->demand }}</td>
                                <td>{{ $item->sale_price }}</td>
                                <td>{{ $item->purchase_price }}</td>
                                <td>{{ $item->purchase_cost }}</td>
                                <td>{{ $item->excess_cost_18 }}</td>
                                <td>{{ $item->benefits_18 }}</td>
                                </tr>
                            @empty
                            Vacio
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Demandas
                        <div class="card-header-actions"></div>
                    </div>
                    <div class="card-body">
                        <div class="c-chart-wrapper">
                            <canvas id="canvas-1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.simulations.modal_simulate', [ 'item' => $product])

@endsection

@section('scripts')
    <script>
        const openModalSimulate = (product) => {
            $('#modalNuevaSimulacion').modal('show')
        }
    </script>
@endsection