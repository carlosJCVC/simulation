@extends('coreui.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Precio de Ventas
                        <a class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Precio de Venta</th>
                                <th>Nro. de dias</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->sales_price }}</td>
                                    <td>{{ $item->number_days }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" onclick="openEditModal({{ $item->id }})"><i class="c-icon c-icon-2x1 cil-pencil"></i></a>
                                        <form action="{{ route('admin.sales_price.destroy', $item->id) }}"
                                                style="display:inline-block;"
                                                method="POST">
                
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
            
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="delete_action(event);">
                                                    <i class="c-icon c-icon-2x1 cil-trash">
                                            </button>
                                        </form>
                                    </td>
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

@include('admin.sales_price.create')
@include('admin.sales_price.edit')

@endsection

@section('javascript')
    <script>

        const openEditModal = (id) => {
            var url = '{!! route("admin.sales_price.show", ":id") !!}'
            url = url.replace(':id', id)
            
            $.ajax({
              url: url,
            }).done(function(data) {
                setDataModal(data)
            });
        }

        const setDataModal = (sale) => {

            $('#sale-id').val(sale.id)
            $('#edit-sale_price').val(sale.sales_price)
            $('#edit-number-days').val(sale.number_days)

            $('#modalEdit').modal('show')
        }

        $('#edit-sale-button').on('click', function() {
            var url = '{!! route("admin.sales_price.update", ":id") !!}'
            url = url.replace(':id', $('#sale-id').val())

            $('#edit-sales-modal').attr('action', url).submit();
        })

    </script>
@endsection