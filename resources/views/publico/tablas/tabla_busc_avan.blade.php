<div class="col-md-2" ></div>
<div class="col-md-8" >
<table id="resultados" class="table table-striped table-bordered table-hover" width="50%" cellspacing="0" style="background-color: white;" >
<thead></thead>
<tbody class="row_consulta">


@foreach( $especie as $v_r )
@if( $v_r->nombreSubespecie )
    
    <tr>
        <td>
        <div class="row" style="padding-left: 15px;" ><label>Nombre Subespecie : </label> {{ $v_r->nombreSubespecie }}  
        </div> 
        <div class="row">
            <div class="col-md-6" >
                <label>Reino : </label> {{ $v_r->nombreReino }}
                <br> 
                <label>Division : </label> {{ $v_r->nombreDivision }}<br> 
                <label>Clase : </label> {{ $v_r->nombreClase }} <br>
                
            </div>
            <div class="col-md-6" >

                <label>Familia : </label> {{ $v_r->nombreFamilia }}<br>
                <label>Genero : </label> {{ $v_r->nombreGenero }}<br> 
                <label>Especie : </label> {{ $v_r->nombreEspecie }}<br>               
                
                <form action="Avista_sub_pub" method="get" >

                    <input type="hidden" name="id_sub" value="{{ $v_r->idSubespecie }}" >
                    <center>
                        <button class="btn btn-default btn-sm " value="" style="float: right; ;">Información</button>  
                    </center>                         
                </form>
               
            </div>
        </div>   
        </td>
    </tr>   

@else
	

	<tr>
        <td>
        <div class="row" style="padding-left: 15px;" ><label>Nombre Especie : </label> {{ $v_r->nombreEspecie }}  
        </div>
        <div class="row">
            <div class="col-md-6" >
                <label>Reino : </label> {{ $v_r->nombreReino }}
                <br> 
                <label>Division : </label> {{ $v_r->nombreDivision }}<br> 
                <label>Clase : </label> {{ $v_r->nombreClase }} <br>
               
            </div>
            <div class="col-md-6" >
                 <label>Familia : </label> {{ $v_r->nombreFamilia }}<br>     
                <label>Genero : </label> {{ $v_r->nombreGenero }}<br> 

                <form action="Avista_esp_pub" method="get" >

                    <input type="hidden" name="id_esp" value="{{ $v_r->idEspecie }}" >
                    <center>
                        <button class="btn btn-default btn-sm " value="" style="float: right; ;">Información</button>  
                    </center>
                
                </form> 
               
            </div>
        </div>
        </td>
    </tr> 

@endif
@endforeach

</tbody>


</table>
<div id="links" >
        
    {{ $especie->links() }}

</div>
	
</tbody>
</table>
</div>