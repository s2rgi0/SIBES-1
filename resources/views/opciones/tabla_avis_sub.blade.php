
 <table  class="table table-striped table-bordered table-hover " width="100%" cellspacing="0" style="background-color: white;">
        <thead>

            <tr>
                <th>Id</th>
                <th>Fecha Ingreso</th>
                <th>Departamento</th>
                <th>Colector</th>
                <th>Acciones</th>
            </tr>

        </thead>
        <tbody class="row_avista">

            @foreach( $avista as $v_r )
            <tr>
                <td> {{ $v_r->idAvistamiento }} </td>
                <td> {{ $v_r->fechaIngresodeInformacionBD }} </td>
                <td> {{ $v_r->nombreDepartamento }} </td>
                <td> {{ $v_r->nombreColector }} </td>
                <td class="grid_avista" id="grid_avista" >
                    <button class="btn btn-primary btn-Ver " value="{{ $v_r->idAvistamiento }}" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                    <button class="btn btn-success btn-Editar " value="{{ $v_r->idAvistamiento }}" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>

                </td>

            </tr>
            @endforeach

        </tbody>

    </table>
    <div id="links" >



    </div>
