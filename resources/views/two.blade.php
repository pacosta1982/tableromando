
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Proyectos Recibidos Por Mesa de Entrada</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Expediente</th>
                            <th>Proyecto</th>
                            <th>SAT</th>
                            <th>Estado</th>
                            <th>Postulantes</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($ingresados as $item)
                        <tr>
                            <td>{{ $item->exp }}</td>
                            <td>{{ $item->project_id?$item->getProyecto->name:"" }}</td>
                            <td>{{ utf8_encode($item->project_id?$item->getProyecto->getSat->NucNomSat:"") }}</td>
                            <td><span class="label label-success">Recibido</span></td>
                            <td>{{ $item->getPostulantes->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                            <tr>
                                <th colspan="4" style="text-align:right">Total Postulantes:</th>
                                <th></th>
                            </tr>
                        </tfoot>
                </table>
    </div>
  </div>
