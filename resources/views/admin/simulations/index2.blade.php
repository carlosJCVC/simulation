@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div>
        <a href="{{ route('admin.simulate.data', $product->id) }}" class="btn btn-success">Simular</a>
            <a href="#" class="btn btn-primary">Ver graficos</a>
            <a href="#" class="btn btn-success">Ver graficos</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @include('admin.simulations.demands')
            </div>
            <div class="col-lg-6">
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
        <div class="row">
            <div class="col-lg-6">
                @include('admin.simulations.sales')
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Precio de venta
                        <div class="card-header-actions"></div>
                    </div>
                    <div class="card-body">
                        <div class="c-chart-wrapper">
                            <canvas id="canvas-sales"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @include('admin.simulations.purchases')
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Demandas
                        <div class="card-header-actions"></div>
                    </div>
                    <div class="card-body">
                        <div class="c-chart-wrapper">
                            <canvas id="canvas-purchases"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.demands.create', [ 'item' => $product ])
@include('admin.sales_price.create', [ 'item' => $product ])
@include('admin.purchases_price.create', [ 'item' => $product ])

@if ($errors->has('sold_units') > 0)
    <script>
        $( document ).ready(function() {
            $('#modalNuevaDemanda').modal('show');
        });
    </script>
@endif

@if ($errors->has('sales_price') > 0)
    <script>
        $( document ).ready(function() {
            $('#modalNuevaDemanda').modal('show');
        });
    </script>
@endif

@if ($errors->has('purchases_price') > 0)
    <script>
        $( document ).ready(function() {
            $('#modalNuevoPurchase').modal('show');
        });
    </script>
@endif

@endsection

@section('scripts')
    <script>

        const loadDemands = () => {
            var demands = @json($demands);
            var product = @json($product);
            
            var values = []
            var days = []

            demands.forEach((element, index) => {
                if (index < 10) {
                    values.push(element.sold_units)
                    days.push(element.number_days)
                }
            });
            //const random = () => Math.round(Math.random() * 100)
            const lineChart = new Chart(document.getElementById('canvas-1'), {
            type: 'line',
            data: {
                labels : days,
                datasets : [
                {
                    label: `${ product.name } + Demands`,
                    backgroundColor : 'rgba(151, 187, 205, .5)',
                    borderColor : 'rgba(151, 187, 205, 1)',
                    pointBackgroundColor : 'rgba(151, 187, 205, 1)',
                    pointBorderColor : '#000',
                    data : values
                }
                ]
            },
            options: {
                responsive: true
            }
            })
        }

        const loadSalesPrice = () => {
            var sales = @json($sales);
            var product = @json($product);
            
            var values = []
            var days = []

            sales.forEach((element, index) => {
                if (index < 10) {
                    values.push(element.sales_price)
                    days.push(element.number_days)
                }
            });
            //const random = () => Math.round(Math.random() * 100)
            const lineChart = new Chart(document.getElementById('canvas-sales'), {
            type: 'line',
            data: {
                labels : days,
                datasets : [
                {
                    label: `${ product.name } + Precio de venta`,
                    backgroundColor : 'rgba(151, 187, 205, 0.2)',
                    borderColor : 'rgba(151, 187, 205, 1)',
                    pointBackgroundColor : 'rgba(151, 187, 205, 1)',
                    pointBorderColor : '#fff',
                    data : values
                }
                ]
            },
            options: {
                responsive: true
            }
            })
        }

        const loadPurchasesPrice = () => {
            var purchases = @json($purchases);
            var product = @json($product);
            
            var values = []
            var days = []

            purchases.forEach((element, index) => {
                if (index < 10) {
                    values.push(element.purchases_price)
                    days.push(element.number_days)
                }
            });
            //const random = () => Math.round(Math.random() * 100)
            const lineChart = new Chart(document.getElementById('canvas-purchases'), {
            type: 'line',
            data: {
                labels : days,
                datasets : [
                {
                    label: `${ product.name } + Precio de Compra`,
                    backgroundColor : 'rgba(151, 187, 205, 0.2)',
                    borderColor : 'rgba(151, 187, 205, 1)',
                    pointBackgroundColor : 'rgba(151, 187, 205, 1)',
                    pointBorderColor : '#fff',
                    data : values
                }
                ]
            },
            options: {
                responsive: true
            }
            })
        }

        loadDemands()
        loadSalesPrice()
        loadPurchasesPrice()
    </script>
@endsection