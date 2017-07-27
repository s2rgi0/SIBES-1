<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Division;
use App\Especie;
use App\Familia;
use App\Genero;
use App\Orden;
use App\Reino;
use App\Subespecie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;

class IngresoController extends Controller
{
    //
    public function nuevaDivision()
    {

        $reino = Reino::all();

        return view('ingreso.division', compact('reino'));

    }

    public function ingresarDivision(Request $req)
    {


        if ($req->has('reino_input')) {
            //
            $div = new Division;

            $div->idReino = request('file');

            $div->nombreDivision = request('reino_input');

            $div->save();

            $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

            return response()->json($data);


        } else {

            return response(['msg' => 'no se puede ingresar']);

        }

    }

    public function ingr_div()
    {

        $data = Reino::all();

        //return view ('ingreso.division' , compact('data'));
        return response()->json($data);

    }

    public function ingr_div_modal(Request $req)
    {

        $validator = Validator::make(Input::all(), [

            'rei_mod'       => 'required',
            'rei_input_mod' => 'required|unique:Divisions,nombreDivision',

        ], [

            'rei_mod.required'       => 'Seleccione un reino',
            'rei_input_mod.required' => 'Ingrese una división',
            'rei_input_mod.unique'   => 'La división existe',

        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $div = new Division;

                $div->idReino = Input::get('rei_mod'); //$req->idReino;

                $div->nombreDivision = Input::get('rei_input_mod'); //$req->nombreDivision;

                $div->save();

                return response(['msg' => 'por fin ingresamos']);

            } else {

                return response(['msg' => 'no es ajax']);

            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());

            }

        }

    }

    public function ingr_cla()
    {

        $data = Reino::all();

        //return view ('ingreso.division' , compact('data'));
        return response()->json($data);

    }

    public function Busca_div_clase(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function ingr_cla_modal(Request $req)
    {

        $validator = Validator::make(Input::all(), [

            'rei_mod'       => 'required',
            'div_mod'       => 'required',
            'cla_input_mod' => 'required|unique:Clases,nombreClase',

        ], [
            'rei_mod.required'       => 'seleccione un reino',
            'div_mod.required'       => 'seleccione una división',
            'cla_input_mod.required' => 'Ingrese una clase ',
            'cla_input_mod.unique'   => 'La clase existe',
        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $cla = new Clase;

                $cla->idDivision = Input::get('div_mod'); //$req->idDivision;

                $cla->nombreClase = Input::get('cla_input_mod'); //$req->nombreClase;

                $cla->save();

                return response(['msg' => 'por fin ingresamos']);

            } else {

                return response(['msg' => 'no es ajax']);
            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fclase')->withInput($req->flash());

            }

        }

    }

    public function ingr_ord()
    {
        $data = Reino::all();

        return response()->json($data);
    }

    public function Busca_div_ord(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_cla_ord(Request $req)
    {

        $data = Clase::select('nombreClase', 'idClase')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function ingr_ord_modal(Request $req)
    {

        $validator = Validator::make(Input::all(), [

            'rei_mod'       => 'required',
            'div_ord'       => 'required',
            'cla_ord'       => 'required',
            'ord_input_mod' => 'required|unique:Ordens,nombreOrden',

        ], [
            'rei_mod.required'       => 'Seleccione un reino',
            'div_ord.required'       => 'Seleccione una división',
            'cla_ord.required'       => 'Seleccione una clase',
            'ord_input_mod.unique'   => 'El orden existe',
            'ord_input_mod.required' => 'Ingrese el orden',
        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $ord = new Orden;

                $ord->idClase = Input::get('cla_ord'); //$req->idClase;

                $ord->nombreOrden = Input::get('ord_input_mod'); //$req->nombreOrden;

                $ord->save();

                return response(['msg' => 'por fin ingresamos']);
            } else {
                return response(['msg' => 'no es ajax']);
            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'forden')->withInput($req->flash());

            }

        }

    }

    public function ingr_fam_modal(Request $req)
    {

        $validator = Validator::make($req->all(), [

            'rei_mod'   => 'required',
            'div_fam'   => 'required',
            'cla_fam'   => 'required',
            'ord_fam'   => 'required',
            'fam_input' => 'required|unique:Familias,nombreFamilia',

        ], [
            'rei_mod.required'   => 'Seleccione un reino',
            'div_fam.required'   => 'Seleccione una división',
            'cla_fam.required'   => 'Seleccione una clase',
            'ord_fam.required'   => 'Seleccione una orden',
            'fam_input.required' => 'Ingrese una familia',
            'fam_input.unique'   => 'La familia existe',
        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $fam = new Familia;

                $fam->idOrden = Input::get('ord_fam'); //$req->idOrden;

                $fam->nombreFamilia = Input::get('fam_input'); //$req->nombreFamilia;

                $fam->save();

                return response(['msg' => 'por fin ingresamos']);
            } else {
                return response(['msg' => 'no es ajax']);
            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'ffamilia')->withInput($req->flash());

            }

        }

        //dd(request('ord_fam'));

    }

    public function ingr_gen_modal(Request $req)
    {

        $validator = Validator::make($req->all(), [

            'ord_gen'   => 'required',
            'fam_gen'   => 'required',
            'gen_input' => 'required|unique:Generos,nombreGenero',

        ], [

            'ord_gen.required'   => 'Seleccione una orden',
            'fam_gen.required'   => 'Seleccione una familia',
            'gen_input.required' => 'Ingrese un género',
            'gen_input.unique'   => 'El género existe',

        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $gen = new Genero;

                $gen->idFamilia = Input::get('fam_gen'); //$req->idFamilia;

                $gen->nombreGenero = Input::get('gen_input'); //$req->nombreGenero;

                $gen->save();

                return response(['msg' => 'por fin ingresamos']);
            } else {
                return response(['msg' => 'no es ajax']);
            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'ffamilia')->withInput($req->flash());

            }

        }

    }

    public function ingr_esp_modal(Request $req)
    {

        $validator = Validator::make($req->all(), [

            'ord_esp'   => 'required',
            'fam_esp'   => 'required',
            'gen_esp'   => 'required',
            'esp_input' => 'required|unique:Especies,nombreEspecie',

        ], [

            'ord_esp.required'   => 'seleccione una orden',
            'fam_esp.required'   => 'seleccione una familia',
            'gen_esp.required'   => 'seleccione una género',
            'esp_input.required' => 'Ingrese una especie',
            'esp_input.unique'   => 'La especie existente',

        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $esp = new Especie;

                $esp->idGenero = Input::get('gen_esp'); //$req->idGenero;

                $esp->nombreEspecie = Input::get('esp_input'); //$req->nombreEspecie;

                $esp->save();

                return response(['msg' => 'por fin ingresamos']);
            } else {
                return response(['msg' => 'no es ajax']);
            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'ffamilia')->withInput($req->flash());

            }

        }

    }

    public function ingr_sub_modal(Request $req)
    {

        $validator = Validator::make($req->all(), [

            'fam_sub'   => 'required',
            'gen_sub'   => 'required',
            'esp_sub'   => 'required',
            'sub_input' => 'required|unique:Subespecies,nombreSubespecie',

        ], [

            'fam_sub.required'   => 'seleccione una familia',
            'gen_sub.required'   => 'seleccione un género',
            'esp_sub.required'   => 'seleccione una especie',
            'sub_input.required' => 'Ingrese la Subespecie',
            'sub_input.unique'   => 'La subespecie existe',
        ]);

        if ($validator->passes()) {

            if ($req->ajax()) {

                $sub = new Subespecie;

                $sub->idEspecie = Input::get('esp_sub'); //$req->idEspecie;

                $sub->nombreSubespecie = Input::get('sub_input'); //$req->nombreSubespecie;

                $sub->save();

                return response(['msg' => 'por fin ingresamos']);

            } else {
                return response(['msg' => 'no es ajax']);
            }

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'ffamilia')->withInput($req->flash());

            }

        }

    }

    //cargan reino en modales

    public function ingr_fam()
    {
        $data = Reino::all();

        return response()->json($data);
    }

    public function ingr_gen()
    {
        $data = Reino::all();

        return response()->json($data);
    }

    public function ingr_esp()
    {
        $data = Reino::all();

        return response()->json($data);
    }

    //buscan division para fam gen y esp

    public function Busca_div_fam(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_div_gen(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_div_esp(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_div_sub(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    //buscan clase para fam gen esp

    public function Busca_cla_fam(Request $req)
    {

        $data = Clase::select('nombreClase', 'idClase')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_cla_gen(Request $req)
    {

        $data = Clase::select('nombreClase', 'idClase')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_cla_esp(Request $req)
    {

        $data = Clase::select('nombreClase', 'idClase')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function Busca_cla_sub(Request $req)
    {

        $data = Clase::select('nombreClase', 'idClase')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data);

    }

    //BUSCAN ORDEN PARA FAM GEN Y ESP

    public function Busca_ord_fam(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idClase', $req->id)->take(0)->get();

        return response()->json($data2);
    }

    public function Busca_ord_gen(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idClase', $req->id)->take(0)->get();

        return response()->json($data2);
    }

    public function Busca_ord_esp(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idClase', $req->id)->take(0)->get();

        return response()->json($data2);
    }

    public function Busca_ord_sub(Request $req)
    {
        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idClase', $req->id)->take(0)->get();

        return response()->json($data2);
    }

    //buscan FAMILIA

    public function Busca_fam_gen(Request $req)
    {
        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data3);
    }
    public function Busca_fam_esp(Request $req)
    {
        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data3);
    }

    public function Busca_fam_sub(Request $req)
    {
        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data3);
    }

    //busca genero para especie

    public function Busca_gen_esp(Request $req)
    {
        $data4 = Genero::select('nombreGenero', 'idGenero')->where('idFamilia', $req->id)->take(0)->get();

        return response()->json($data4);
    }

    public function Busca_gen_sub(Request $req)
    {
        $data4 = Genero::select('nombreGenero', 'idGenero')->where('idFamilia', $req->id)->take(0)->get();

        return response()->json($data4);
    }

    public function Busca_esp_sub(Request $req)
    {
        $data5 = Especie::select('nombreEspecie', 'idEspecie')->where('idGenero', $req->id)->get();

        return response()->json($data5);
    }

    //botones de subespecie

    public function ingr_sub()
    {
        $data = Reino::all();

        return response()->json($data);
    }

}
