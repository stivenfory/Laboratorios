<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vehiculo;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VehiculoFormRequest;
use DB;

class VehiculoController extends Controller

{
    public function __construct()
 {
 $this->middleware('auth');
 }

    public function index(Request $request)
    {
    if ($request)
    {
    $query=trim($request->get('searchText'));
    $vehiculos=DB::table('vehiculos')->where('placa','LIKE','%'.$query.'%')->orderBy('id','desc')->paginate(5);
    return view('Vehiculo.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
    }
    }
   
 public function create()
 {
 return view ('Vehiculo.create');
 }
 public function store (VehiculoFormRequest $request)
 {
 $vehiculo=new Vehiculo;
 $vehiculo->placa=$request->get('placa');
 $vehiculo->tipo=$request->get('tipo');
 $vehiculo->modelo=$request->get('modelo');
 $vehiculo->save();
 return Redirect::to('vehiculo');
 }
 public function show($id)
 {
 $vehiculos=Vehiculo::find($id);
 return view('Vehiculo.show',compact('vehiculos'));
 }

 public function edit($id)
 {
 $vehiculo=vehiculo::find($id);
 return view('vehiculo.edit',compact('vehiculo'));
 }
public function update (Request $request, $id) {
 $this->validate($request,[ 'placa'=>'required', 'tipo'=>'required', 'modelo'=>'required']);
 vehiculo::find($id)->update($request->all());
 return redirect()->route('vehiculo.index')->with('success','Registro actualizado');
 }
public function destroy($id)
 {
 Vehiculo::find($id)->delete();
 return redirect()->route('vehiculo.index')->with('success','Registro Eliminado');
 }

 
public function imprimirVehiculos(Request $request){
 $vehiculos = DB::table('vehiculos as ve')
 ->join('tipo_vehiculos as tv','tv.id','=','ve.tipo_vehiculo_id')
 ->select('tv.nombre','ve.tipo_vehiculo_id','ve.id','ve.placa')
 ->get();
 $pdf = \PDF::loadView('Pdf.vehiculosPDF',['vehiculos' => $vehiculos ]);
 $pdf->setPaper('carta', 'A4');
 return $pdf->download('Listado de Vehiculos.pdf');
 }
 
}