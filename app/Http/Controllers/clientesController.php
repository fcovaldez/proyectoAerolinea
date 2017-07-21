<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Mail;
class clientesController extends Controller
{
    public function registrar(){
        return view('/registrarCliente');
    }
    public function guardar(Request $datos){
        $cliente = new Cliente();//objeto
        $cliente->nombre=$datos->input('nombre');
        $cliente->correo=$datos->input('correo');
        $correo=$datos->input('correo');
        $cliente->fecha_nacimiento=$datos->input('fecha_nacimiento');
        $cliente->genero=$datos->input('genero');
        $cliente->hijos=$datos->input('hijos');
        $nacimiento = $datos->input('fecha_nacimiento');
        $fecha= str_replace('/',"-",$nacimiento);
        $years= date('Y',strtotime($fecha));
        $mes=date('m',strtotime($fecha));
        $hoy= date('Y');
        $mesactual= date('m');
        if($mesactual>$mes){
            $edad = $hoy - $years;
        }
        else{
            $edad = $hoy - $years;
            $edad-=1;
        }
        $cliente->edad=$edad;
        Mail::send('emailBienvenida',[], function($message) use($correo){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($correo)->subject('Bienvenido a Aerotec');
            });
        $cliente->save();
        flash('Cliente guardado correctamente')->success();
        return redirect('/');
    }
    public function consultar(){
        $clientes = Cliente::all();
        return view('/consultaclientes',compact('clientes'));
    }
    public function editar($id){
        $cliente= Cliente::find($id);
        return view('/editarCliente',compact('cliente'));
    }
    public function actualizar($id, Request $datos){
        $cliente = Cliente::find($id);
        $cliente->nombre=$datos->input('nombre');
        $cliente->correo=$datos->input('correo');
        $cliente->fecha_nacimiento=$datos->input('fecha_nacimiento');
        $cliente->genero=$datos->input('genero');
        $cliente->hijos=$datos->input('hijos');
        $nacimiento = $datos->input('fecha_nacimiento');
        $fecha= str_replace('/',"-",$nacimiento);
        $years= date('Y',strtotime($fecha));
        $mes=date('m',strtotime($fecha));
        $hoy= date('Y');
        $mesactual= date('m');
        if($mesactual>$mes){
            $edad = $hoy - $years;
        }
        else{
            $edad = $hoy - $years;
            $edad-=1;
        }
        $cliente->edad=$edad;
        
        $cliente->save();
        flash('Cliente actualizado correctamente')->success();
        return redirect('/consultaclientes');
    }
    public function eliminar($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        flash('Cliente eliminado correctamente')->success();
        return redirect('/consultaclientes');
    }
    public function PDF(){
        $clientes = Cliente::all();
        $vista = view('clientesPDF',compact('clientes'));
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        $pdf->setPaper('letter');
        return $pdf->stream('ListadeClientes.pdf');
    }
}
