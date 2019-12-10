@extends('coreui.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Combined All Table</div>
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
                        <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
    alert()
    </script>
@endsection