<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\promocion;
use Mail;
use DB;
class promocionesController extends Controller
{
    public function registrar(){
        return view('/registrarPromocion');
    }
    public function guardar(Request $datos){
        $promocion = new promocion();//objeto
        $promocion->descripcion=$datos->input('descripcion');
        $promocion->fecha_inicio=$datos->input('fecha_inicio');
        $promocion->fecha_fin=$datos->input('fecha_fin');
        $promocion->save();
        flash('Promocion guardada correctamente')->success();
        return redirect('/');
    }
    public function consultar(){
        $promociones = promocion::all();
        return view('/consultaPromociones',compact('promociones'));
    }
    public function eliminar($id){
        $promocion = promocion::find($id);
        $promocion->delete();
        flash('Promocion eliminada correctamente')->success();
        return redirect('/consultaPromociones');
    }
    public function editar($id){
        $promocion = promocion::find($id);
        return view('/editarPromocion',compact('promocion'));
    }
    public function actualizar($id, Request $datos){
        $promocion = promocion::find($id);
        $promocion->descripcion=$datos->input('descripcion');
        $promocion->fecha_inicio=$datos->input('fecha_inicio');
        $promocion->fecha_fin=$datos->input('fecha_fin');
        $promocion->save();
        flash('Promocion actualizada correctamente')->success();
        return redirect('/consultaPromociones');
    }
    public function enviar($id){
        $promocion= promocion::find($id);
        return view('/enviarPromocion',compact('promocion'));
    }
    public function enviarCorreo($id,Request $datos){
        $promocion = Promocion::find($id);
        $mayor18 = $datos->input('may18');
        $confamilia= $datos->input('confamilia');
        $femenino=$datos->input('femenino');
        $masculino=$datos->input('masculino');
        if($mayor18=="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('edad','>','18')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }  
        }
        else if($confamilia=="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('hijos','=','Si')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
         else if($femenino=="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('genero','=','F')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
        else if($masculino=="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('genero','=','M')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
          else if($masculino=="on" && $mayor18="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('genero','=','M')
            ->where ('edad','>','18')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
          else if($femenino=="on" && $mayor18="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('genero','=','F')
            ->where ('edad','>','18')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
            
        }
        else if($masculino=="on" && $mayor18="on" && $confamilia=="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('genero','=','M')
            ->where ('edad','>','18')
            ->where('hijos','=','Si')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
        else if($femenino=="on" && $mayor18="on" && $confamilia=="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('genero','=','F')
            ->where ('edad','>','18')
            ->where('hijos','=','Si')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
        else if($femenino=="on" && $mayor18="on" && $confamilia=="on" && $masculino="on"){
            $usuario=DB::table('clientes')
            ->select('correo','nombre')
            ->where ('edad','>','18')
            ->where('hijos','=','Si')
            ->get();
            foreach($usuario as $us){
            Mail::send('contenidoEmail',['promocion'=>$promocion], function($message) use($promocion,$us){
            $message->from('quinielatulipanes@gmail.com','AeroTec');
            $message->to($us->correo)->subject($promocion->descripcion);
            });
            }
        }
        else{
            echo "Selecciona un filtro por favor";
            return redirect('/enviarCorreo/{$id}');
        }
        flash('La promocion ha sido enviada correctamente')->success();
        return redirect('/consultaPromociones');
    }
     public function PDF(){
        $promociones = Promocion::all();
        $vista = view('promocionesPDF',compact('promociones'));
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        $pdf->setPaper('letter');
        return $pdf->stream('ListadePromociones.pdf');
    }
}
