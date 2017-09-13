<?php

namespace App\Http\Controllers;

use App\ApendiceCites;
use App\CategoriaMarn;
use App\CategoriaUICN;
use App\Clase;
use App\Division;
use App\Especie;
use App\Familia;
use App\Genero;
use App\Nombrecomun;
use App\Orden;
use App\ProcedenciaEspecie;
use App\Reino;
use App\Subespecie;
use App\Usuario;
use Illuminate\Http\Request;

class ModalesController extends Controller
{
    //POPULAR REINO EN MODAL

    public function pop_rei_div(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }
    public function pop_rei_cla(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }

    public function pop_rei_ord(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }

    public function pop_rei_fam(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }

    public function pop_rei_gen(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }
    public function pop_rei_esp(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }

    public function pop_rei_sub(Request $req)
    {
        $data = Reino::select('idReino', 'nombreReino')->where('idReino', $req->id)->get();

        return response()->json($data);

    }

    ///POPULAR DIVISION EN MODALES --------------------------------------------*++++++++++++++++++++++++++++++++++

    public function pop_DIV_cla(Request $req)
    {
        $data = Division::select('idDivision', 'nombreDivision')->where('idDivision', $req->id)->get();

        return response()->json($data);

    }

    public function pop_DIV_ord(Request $req)
    {
        $data = Division::select('idDivision', 'nombreDivision')->where('idDivision', $req->id)->get();

        return response()->json($data);

    }

    public function pop_DIV_fam(Request $req)
    {
        $data = Division::select('idDivision', 'nombreDivision')->where('idDivision', $req->id)->get();

        return response()->json($data);

    }

    public function pop_DIV_gen(Request $req)
    {
        $data = Division::select('idDivision', 'nombreDivision')->where('idDivision', $req->id)->get();

        return response()->json($data);

    }

    public function pop_DIV_esp(Request $req)
    {
        $data = Division::select('idDivision', 'nombreDivision')->where('idDivision', $req->id)->get();

        return response()->json($data);

    }

    public function pop_DIV_sub(Request $req)
    {
        $data = Division::select('idDivision', 'nombreDivision')->where('idDivision', $req->id)->get();

        return response()->json($data);

    }

    //llenar CLASE en modales

    public function pop_CLA_ord(Request $req)
    {
        $data = Clase::select('idClase', 'nombreClase')->where('idClase', $req->id)->get();

        return response()->json($data);

    }

    public function pop_CLA_fam(Request $req)
    {
        $data = Clase::select('idClase', 'nombreClase')->where('idClase', $req->id)->get();

        return response()->json($data);

    }

    public function pop_CLA_gen(Request $req)
    {
        $data = Clase::select('idClase', 'nombreClase')->where('idClase', $req->id)->get();

        return response()->json($data);

    }

    public function pop_CLA_esp(Request $req)
    {
        $data = Clase::select('idClase', 'nombreClase')->where('idClase', $req->id)->get();

        return response()->json($data);

    }

    public function pop_CLA_sub(Request $req)
    {
        $data = Clase::select('idClase', 'nombreClase')->where('idClase', $req->id)->get();

        return response()->json($data);

    }

    //llenar ORDEN en modales

    public function pop_ORD_fam(Request $req)
    {
        $data = Orden::select('idOrden', 'nombreOrden')->where('idOrden', $req->id)->get();

        return response()->json($data);

    }

    public function pop_ORD_gen(Request $req)
    {
        $data = Orden::select('idOrden', 'nombreOrden')->where('idOrden', $req->id)->get();

        return response()->json($data);

    }

    public function pop_ORD_esp(Request $req)
    {
        $data = Orden::select('idOrden', 'nombreOrden')->where('idOrden', $req->id)->get();

        return response()->json($data);

    }

    public function pop_ORD_sub(Request $req)
    {
        $data = Orden::select('idOrden', 'nombreOrden')->where('idOrden', $req->id)->get();

        return response()->json($data);

    }

    //llenar FAMILIA en modales

    public function pop_FAM_gen(Request $req)
    {
        $data = Familia::select('idFamilia', 'nombreFamilia')->where('idFamilia', $req->id)->get();

        return response()->json($data);

    }

    public function pop_FAM_esp(Request $req)
    {
        $data = Familia::select('idFamilia', 'nombreFamilia')->where('idFamilia', $req->id)->get();

        return response()->json($data);

    }

    public function pop_FAM_sub(Request $req)
    {
        $data = Familia::select('idFamilia', 'nombreFamilia')->where('idFamilia', $req->id)->get();

        return response()->json($data);

    }

    //llenar GENERO en modales

    public function pop_GEN_esp(Request $req)
    {
        $data = Genero::select('idGenero', 'nombreGenero')->where('idGenero', $req->id)->get();

        return response()->json($data);

    }

    public function pop_GEN_sub(Request $req)
    {
        $data = Genero::select('idGenero', 'nombreGenero')->where('idGenero', $req->id)->get();

        return response()->json($data);

    }

    //llenar ESPECIE en modales

    public function pop_ESP_sub(Request $req)
    {
        $data = Especie::select('idEspecie', 'nombreEspecie')->where('idEspecie', $req->id)->get();

        return response()->json($data);

    }

    ///// DE MODAL A BUSQUEDA ////

    public function nueva_div(Request $req)
    {

        $data = Division::select('idDivision', 'nombreDivision')->orderBy('idDivision', 'desc')->where('idReino', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function nueva_cla(Request $req)
    {

        $data = Clase::select('idClase', 'nombreClase')->orderBy('idClase', 'desc')->where('idDivision', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function nueva_ord(Request $req)
    {

        $data = Orden::select('idOrden', 'nombreOrden')->orderBy('idOrden', 'desc')->where('idClase', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function nueva_fam(Request $req)
    {

        $data = Familia::select('idFamilia', 'nombreFamilia')->orderBy('idFamilia', 'desc')->where('idOrden', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function nueva_gen(Request $req)
    {

        $data = Genero::select('idGenero', 'nombreGenero')->orderBy('idGenero', 'desc')->where('idFamilia', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function nueva_esp(Request $req)
    {

        $data = Especie::select('idEspecie', 'nombreEspecie')->orderBy('idEspecie', 'desc')->where('idGenero', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function nueva_sub(Request $req)
    {

        $data = Subespecie::select('idSubespecie', 'nombreSubespecie')->orderBy('idSubespecie', 'desc')->where('idEspecie', $req->id)->get();

        $d2 = collect($data)->toArray();

        //return Response::json($data);
        return response()->json($d2);

    }

    public function estadoMarn(Request $req)
    {

        $d = Especie::select('estadoMarn')->where('idEspecie', request('especie'))->get();

        $array = json_decode($d);

        //dd($d[0]);

        dd($array[0]->estadoMarn);

    }

    //PONEN DIVISION EN BUSQUEDA DESPUES DE GUARDAR

    public function get_div_cla(Request $req)
    {
        $data = Division::select('nombreDivision', 'idDivision')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);
    }

    public function get_div_ord(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function get_div_fam(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function get_div_gen(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function get_div_esp(Request $req)
    {
        $data = Division::select('nombreDivision', 'idDivision')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);
    }

    public function get_div_sub(Request $req)
    {
        $data = Division::select('nombreDivision', 'idDivision')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);
    }

    //get clase//////DESDE ORDEN ///////////////////////////////////////////

    public function get_cla_ord(Request $req)
    {

        $data1 = Clase::select('nombreClase', 'idClase')->where('idClase', $req->id)->get();

        return response()->json($data1);
    }

    public function get_cla_fam(Request $req)
    {

        $data1 = Clase::select('nombreClase', 'idClase')->where('idClase', $req->id)->get();

        return response()->json($data1);

    }

    public function get_cla_gen(Request $req)
    {
        $data1 = Clase::select('nombreClase', 'idClase')->where('idClase', $req->id)->get();

        return response()->json($data1);
    }

    public function get_cla_esp(Request $req)
    {
        $data1 = Clase::select('nombreClase', 'idClase')->where('idClase', $req->id)->get();

        return response()->json($data1);
    }

    public function get_cla_sub(Request $req)
    {
        $data1 = Clase::select('nombreClase', 'idClase')->where('idClase', $req->id)->get();

        return response()->json($data1);
    }

    ////////////////////GET ORDEN DESDE FAMILIA DESPUES DE GUARDAREN MODALWES

    public function get_ord_fam(Request $req)
    {

        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data2);

    }

    public function get_ord_gen(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data2);
    }

    public function get_ord_esp(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data2);
    }

    public function get_ord_sub(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data2);
    }

//////////////////////////////////////////GET FAM //////////////////////

    public function get_fam_gen(Request $req)
    {
        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idFamilia', $req->id)->get();

        return response()->json($data3);
    }

    public function get_fam_esp(Request $req)
    {
        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idFamilia', $req->id)->get();

        return response()->json($data3);
    }

    public function get_fam_sub(Request $req)
    {
        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idFamilia', $req->id)->get();

        return response()->json($data3);
    }

    ///////////////////////////////////////////GET GENERO /////////////////////////////////////////////////

    public function get_gen_esp(Request $req)
    {
        $data4 = Genero::select('nombreGenero', 'idGenero')->where('idGenero', $req->id)->take(0)->get();

        return response()->json($data4);
    }

    public function get_gen_sub(Request $req)
    {
        $data4 = Genero::select('nombreGenero', 'idGenero')->where('idGenero', $req->id)->take(0)->get();

        return response()->json($data4);
    }

    /////////////////////////////////////////////////get especie ///////////////////////////////////////////////

    public function get_esp_sub(Request $req)
    {
        $data5 = Especie::select('nombreEspecie', 'idEspecie')->where('idEspecie', $req->id)->take(0)->get();
        //dd($data5);
        return response()->json($data5);
    }

    public function buenale_esp(Request $req)
    {
        $data4 = Especie::select('nombreEspecie', 'idEspecie')->where('idEspecie', $req->id)->take(0)->get();

        return response()->json($data4);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function Agrega_div_cla(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function estadoMarn_sub(Request $req)
    {

        $d = Subespecie::select('estadoMarn', 'nombreSubespecie')->where('idSubespecie', $req->id)->get();

        return response()->json($d);
    }

    public function estadoMarn_esp(Request $req)
    {
        $d = Especie::select('idEspecie', 'nombreEspecie', 'estadoMarn')->where('idEspecie', $req->id)->get();

        return response()->json($d);
    }

    public function cambia_estado_esp(Request $req)
    {

        $id = $req->id;

        $esp = Especie::find($req->id);

        $esp->estadoMarn = 1;

        $esp->save();

        return response(['msg' => 'por fin actualizamos el estado']);

    }

    public function cambia_estado_sub(Request $req)
    {

        $id = $req->id;

        $esp = Especie::find($req->id);

        dd($esp);

        $esp->estadoMarn = 1;

        $esp->save();

        return response(['msg' => 'por fin actualizamos el estado de subesecie']);

    }

    //estos metodos se utilizan cuando queremos agregar una especie

    public function agarra_esp(Request $req)
    {
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $d = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Especies.nombreEspecie', 'Especies.idEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Especies.nombreEnIngles', 'Especies.descripcionDelEjemplar')->where('idEspecie', $req->esp_id)->get();

        //dd($d);

        $esp1_array   = json_decode($d);
        $elementCount = 1;

        $append = ApendiceCites::all();
        $proc   = ProcedenciaEspecie::all();
        $cat    = CategoriaMarn::all();
        $uicn   = CategoriaUICN::all();
        $nc_esp = Nombrecomun::where('idEspecie', $req->esp_id)->get();

        $a_esp = ApendiceCites::join('Especies', 'apendice_cites.idApendiceCITES', '=', 'Especies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Especies.idEspecie', $req->esp_id)->get();
        $p_esp = ProcedenciaEspecie::join('Especies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Especies.idProcedenciaDeLaEspecie')->where('Especies.idEspecie', $req->esp_id)->get();
        $c_esp = CategoriaMarn::join('Especies', 'categoria_marns.idCategoriaMARN', '=', 'Especies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idEspecie', $req->esp_id)->get();
        $u_esp = CategoriaUICN::join('Especies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Especies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idEspecie', $req->esp_id)->get();
        $msg   = 'Ingreso';

        $msg_exito  = 'La información de la especie ';
        $msg_exito2 = 'fue ingresada al catálogo de especies de El Salvador';

        return view('ingreso.mostrar', compact('msg', 'msg_exito', 'msg_exito2', 'esp1_array', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_esp', 'a_esp', 'p_esp', 'c_esp', 'u_esp'));

    }

    public function agarra_sub(Request $req)
    {
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $d = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Subespecies.nombreSubespecie', 'Especies.idEspecie', 'Subespecies.idSubespecie', 'Especies.nombreEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Subespecies.nombreEnIngles', 'Subespecies.descripcionDelEjemplar')->where('Subespecies.idSubespecie', $req->sub_id)->get();

        $elementCount = 1;

        $esp1_array = json_decode($d);
        $append     = ApendiceCites::all();
        $proc       = ProcedenciaEspecie::all();
        $cat        = CategoriaMarn::all();
        $uicn       = CategoriaUICN::all();
        $nc_sub     = Nombrecomun::where('idSubespecie', $req->sub_id)->get();

        $a_sub = ApendiceCites::join('Subespecies', 'apendice_cites.idApendiceCITES', '=', 'Subespecies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Subespecies.idSubespecie', $req->sub_id)->get();
        $p_sub = ProcedenciaEspecie::join('Subespecies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Subespecies.idProcedenciaDeLaEspecie')->where('Subespecies.idSubespecie', $req->sub_id)->get();
        $c_sub = CategoriaMarn::join('Subespecies', 'categoria_marns.idCategoriaMARN', '=', 'Subespecies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idSubespecie', $req->sub_id)->get();
        $u_sub = CategoriaUICN::join('Subespecies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Subespecies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idSubespecie', $req->sub_id)->get();

        $msg        = 'Ingreso';
        $msg_exito  = 'La información de la subespecie ';
        $msg_exito2 = 'fue ingresada al catálogo de especies de El Salvador';

        return view('ingreso.mostrar_sub', compact('msg', 'msg_exito', 'msg_exito2', 'msg_exito2', 'esp1_array', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_sub', 'a_sub', 'p_sub', 'c_sub', 'u_sub'));

    }

    public function Informacion(Request $req)
    {

        //dd($req->all());

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $d = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Especies.nombreEspecie', 'Especies.idEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Especies.nombreEnIngles', 'Especies.descripcionDelEjemplar', 'Especies.fotografiaEspecie')->where('idEspecie', $req->id_esp)->get();

        $esp1_array   = json_decode($d);
        $elementCount = 1;

        $append = ApendiceCites::all();
        $proc   = ProcedenciaEspecie::all();
        $cat    = CategoriaMarn::all();
        $uicn   = CategoriaUICN::all();
        $nc_esp = Nombrecomun::where('idEspecie', $req->id_esp)->get();

        $a_esp = ApendiceCites::join('Especies', 'apendice_cites.idApendiceCITES', '=', 'Especies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Especies.idEspecie', $req->id_esp)->get();
        $p_esp = ProcedenciaEspecie::join('Especies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Especies.idProcedenciaDeLaEspecie')->where('Especies.idEspecie', $req->id_esp)->get();
        $c_esp = CategoriaMarn::join('Especies', 'categoria_marns.idCategoriaMARN', '=', 'Especies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idEspecie', $req->id_esp)->get();
        $u_esp = CategoriaUICN::join('Especies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Especies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idEspecie', $req->id_esp)->get();

        return view('ingreso.reporte', compact('esp1_array', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_esp', 'a_esp', 'p_esp', 'c_esp', 'u_esp'));

    }

    public function Informacion_Sub(Request $req)
    {

        //dd($req->all());

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $esp11 = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Subespecies.nombreSubespecie', 'Subespecies.idSubespecie', 'Especies.idEspecie', 'Especies.nombreEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Subespecies.nombreEnIngles', 'Subespecies.descripcionDelEjemplar', 'Subespecies.fotografiaEspecie2')->where('Subespecies.idSubespecie', $req->id_sub)->get();

        //dd($esp11);

        //$elementCount = count($esp11);
        $esp1_array = json_decode($esp11);

        $append = ApendiceCites::all();
        $proc   = ProcedenciaEspecie::all();
        $cat    = CategoriaMarn::all();
        $uicn   = CategoriaUICN::all();
        $nc_sub = Nombrecomun::where('idSubespecie', $req->id_sub)->get();

        $a_sub = ApendiceCites::join('Subespecies', 'apendice_cites.idApendiceCITES', '=', 'Subespecies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Subespecies.idSubespecie', $req->id_sub)->get();
        $p_sub = ProcedenciaEspecie::join('Subespecies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Subespecies.idProcedenciaDeLaEspecie')->where('Subespecies.idSubespecie', $req->id_sub)->get();
        $c_sub = CategoriaMarn::join('Subespecies', 'categoria_marns.idCategoriaMARN', '=', 'Subespecies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idSubespecie', $req->id_sub)->get();
        $u_sub = CategoriaUICN::join('Subespecies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Subespecies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idSubespecie', $req->id_sub)->get();

        return view('ingreso.reporte_sub', compact('esp11', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_sub', 'a_sub', 'p_sub', 'c_sub', 'u_sub'));

    }

    //estos metodos se utilizan para modificar la informacion de las especies

    public function GET_especie(Request $req)
    {

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $d = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Especies.nombreEspecie', 'Especies.idEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Especies.nombreEnIngles', 'Especies.descripcionDelEjemplar')->where('idEspecie', $req->esp_id)->get();

        $esp1_array   = json_decode($d);
        $elementCount = 1;

        $append = ApendiceCites::all();
        $proc   = ProcedenciaEspecie::all();
        $cat    = CategoriaMarn::all();
        $uicn   = CategoriaUICN::all();
        $nc_esp = Nombrecomun::where('idEspecie', $req->esp_id)->get();

        $a_esp      = ApendiceCites::join('Especies', 'apendice_cites.idApendiceCITES', '=', 'Especies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Especies.idEspecie', $req->esp_id)->get();
        $p_esp      = ProcedenciaEspecie::join('Especies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Especies.idProcedenciaDeLaEspecie')->where('Especies.idEspecie', $req->esp_id)->get();
        $c_esp      = CategoriaMarn::join('Especies', 'categoria_marns.idCategoriaMARN', '=', 'Especies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idEspecie', $req->esp_id)->get();
        $u_esp      = CategoriaUICN::join('Especies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Especies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idEspecie', $req->esp_id)->get();
        $msg        = 'Modificación';
        $msg_exito  = 'Los cambios de la especie ';
        $msg_exito2 = 'fueron ingresados al catálogo de especies de El Salvador';

        return view('ingreso.mostrar', compact('msg', 'msg_exito', 'msg_exito2', 'esp1_array', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_esp', 'a_esp', 'p_esp', 'c_esp', 'u_esp'));

    }

    public function GET_subespecie(Request $req)
    {
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $d = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Subespecies.nombreSubespecie', 'Subespecies.idSubespecie', 'Especies.idEspecie', 'Especies.nombreEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Subespecies.nombreEnIngles', 'Subespecies.descripcionDelEjemplar')->where('Subespecies.idSubespecie', $req->sub_id)->get();

        $elementCount = 1;

        $esp1_array = json_decode($d);
        $append     = ApendiceCites::all();
        $proc       = ProcedenciaEspecie::all();
        $cat        = CategoriaMarn::all();
        $uicn       = CategoriaUICN::all();
        $nc_sub     = Nombrecomun::where('idSubespecie', $req->sub_id)->get();

        $a_sub      = ApendiceCites::join('Subespecies', 'apendice_cites.idApendiceCITES', '=', 'Subespecies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Subespecies.idSubespecie', $req->sub_id)->get();
        $p_sub      = ProcedenciaEspecie::join('Subespecies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Subespecies.idProcedenciaDeLaEspecie')->where('Subespecies.idSubespecie', $req->sub_id)->get();
        $c_sub      = CategoriaMarn::join('Subespecies', 'categoria_marns.idCategoriaMARN', '=', 'Subespecies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idSubespecie', $req->sub_id)->get();
        $u_sub      = CategoriaUICN::join('Subespecies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Subespecies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idSubespecie', $req->sub_id)->get();
        $msg        = 'Modificación';
        $msg_exito  = 'Los cambios de la subespecie ';
        $msg_exito2 = 'fueron ingresados al catálogo de especies de El Salvador';

        return view('ingreso.mostrar_sub', compact('msg', 'msg_exito', 'msg_exito2', 'esp1_array', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_sub', 'a_sub', 'p_sub', 'c_sub', 'u_sub'));

    }

    public function informacion_avis(Request $req)
    {
        $id      = $req->id_especie;
        $d2      = Subespecie::select('nombreSubespecie')->where('idEspecie', $id)->get();
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();
        //$cuenta = count($d);
        /*

        if( $cuenta > 0 )
        {*/

        $d = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Especies.nombreEspecie', 'Especies.idEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Especies.nombreEnIngles', 'Especies.descripcionDelEjemplar', 'Especies.fotografiaEspecie')->where('idEspecie', $id)->get();

        $esp1_array   = json_decode($d);
        $elementCount = 1;

        $append = ApendiceCites::all();
        $proc   = ProcedenciaEspecie::all();
        $cat    = CategoriaMarn::all();
        $uicn   = CategoriaUICN::all();
        $nc_esp = Nombrecomun::where('idEspecie', $id)->get();

        $a_esp = ApendiceCites::join('Especies', 'apendice_cites.idApendiceCITES', '=', 'Especies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Especies.idEspecie', $id)->get();
        $p_esp = ProcedenciaEspecie::join('Especies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Especies.idProcedenciaDeLaEspecie')->where('Especies.idEspecie', $id)->get();
        $c_esp = CategoriaMarn::join('Especies', 'categoria_marns.idCategoriaMARN', '=', 'Especies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idEspecie', $id)->get();
        $u_esp = CategoriaUICN::join('Especies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Especies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idEspecie', $id)->get();

        return view('ingreso.reporte', compact('esp1_array', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_esp', 'a_esp', 'p_esp', 'c_esp', 'u_esp'));
    }

    public function informacion_avis_sub(Request $req)
    {

        $id_sub = $req->id_especie;

        //dd($)
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $esp11 = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Subespecies.nombreSubespecie', 'Especies.idEspecie', 'Especies.nombreEspecie', 'Generos.nombreGenero', 'Familias.nombreFamilia', 'Ordens.nombreOrden', 'Clases.nombreClase', 'Divisions.nombreDivision', 'Reinos.nombreReino', 'Especies.idGenero', 'Subespecies.nombreEnIngles', 'Subespecies.descripcionDelEjemplar', 'Subespecies.fotografiaEspecie2', 'Subespecies.idSubespecie')->where('Subespecies.idSubespecie', $id_sub)->get();

        $elementCount = count($esp11);
        $esp1_array   = json_decode($esp11);

        $append = ApendiceCites::all();
        $proc   = ProcedenciaEspecie::all();
        $cat    = CategoriaMarn::all();
        $uicn   = CategoriaUICN::all();
        $nc_sub = Nombrecomun::where('idSubespecie', $id_sub)->get();

        $elementCount = 1;

        $a_sub = ApendiceCites::join('Subespecies', 'apendice_cites.idApendiceCITES', '=', 'Subespecies.idApendiceCITES')->select('apendice_cites.idApendiceCITES', 'apendice_cites.nombreApendiceCITES')->where('Subespecies.idSubespecie', $id_sub)->get();
        $p_sub = ProcedenciaEspecie::join('Subespecies', 'procedencia_especies.idProcedenciaDeLaEspecie', '=', 'Subespecies.idProcedenciaDeLaEspecie')->where('Subespecies.idSubespecie', $id_sub)->get();
        $c_sub = CategoriaMarn::join('Subespecies', 'categoria_marns.idCategoriaMARN', '=', 'Subespecies.idCategoriaMARN')->select('categoria_marns.idCategoriaMARN', 'categoria_marns.nombreCategoriaMARN')->where('idSubespecie', $id_sub)->get();
        $u_sub = CategoriaUICN::join('Subespecies', 'categoria_u_i_c_ns.idCategoriaUICN', '=', 'Subespecies.idCategoriaUICN')->select('categoria_u_i_c_ns.idCategoriaUICN', 'categoria_u_i_c_ns.nombreCategoriaUICN')->where('idSubespecie', $id_sub)->get();

        return view('ingreso.reporte_sub', compact('esp11', 'usuario', 'elementCount', 'append', 'proc', 'cat', 'uicn', 'nc_sub', 'a_sub', 'p_sub', 'c_sub', 'u_sub'));

    }

}
