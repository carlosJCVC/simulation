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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>22</td>
                                <td>11</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>21</td>
                                <td>15</td>
                                <td>8</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>23</td>
                                <td>11</td>
                                <td>5</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>21</td>
                                <td>10</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
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