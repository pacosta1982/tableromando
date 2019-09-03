@extends('adminlte::page')

@section('title', 'FONAVIS')

@section('content_header')
    <h1>Resumen Fonavis</h1>
@stop

@section('content')
    @include('one')

    @include('two')

@stop


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json">
@stop

@section('js')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 4 ).footer() ).html(
                ''+pageTotal +' ('+ total +')'
            );
        },
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
            'columnDefs': [
                        {
                            "targets": 0, // your case first column
                            "className": "text-center",
                            "width": "4%"
                        },
                        {
                            "targets": 3,
                            "className": "text-center",
                        },
                        {
                            "targets": 4,
                            "className": "text-center",
                        }

                        ],
            });
    } );
    </script>
@stop
