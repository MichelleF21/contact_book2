<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Workers;
use Illuminate\Validation\Rule;

class WorkersController extends Controller
{
    public function index(){

        $workers = Workers::with('management')->get();
        return view('index', compact('workers'));

    }

        public function create()
    {
        $management = Management::all();
        return view('other.store', compact('management'));
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            // el unique va acompañado del nombre de la tabla
            'extension' => 'required|unique:workers|digits:4',
            'management_id' => 'required|exists:management,id',
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'extension.required' => 'El numero de extensión es obligatorio',            
            'extension.digits' => 'El número de extensión debe de tener 4 digitos',
            'extension.unique' => 'El número de extensión ya existe, indique uno valido',
            'management_id.required' => 'La gerencia es obligatoria',
            'management_id.exists' => 'La gerencia seleccionada no es válida',
            
        ];

        $this->validate($request, $rules, $messages);

            $worker = new Workers();
            $worker->name = $request->input('name');
            $worker->last_name = $request->input('last_name');
            $worker->extension = $request->input('extension');
            $worker->management_id = $request->input('management_id');
            $worker->save();
            
            $notification = 'El contacto se ha creado correctamente';
            return redirect('/')->with(compact('notification') );

    }

    public function edit($id){

        $workers = Workers::findOrFail($id); //workers seria la variable que estoy pasando en la vista de edit y en compact la estoy llamando otra vez

        $managements = Management::all();

        return view('other.edit', compact('workers', 'managements'));

    }

    public function update(Request $request, $id){

        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            'extension' => 'required|digits:4',
            // 'extension' => 'required|digits:4|unique:workers' . $id,
            'management_id' => 'required|exists:management,id',
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'extension.required' => 'El numero de extensión es obligatorio',            
            'extension.digits' => 'El número de extensión debe de tener 4 digitos',
            'management_id.required' => 'La gerencia es obligatoria',
            'management_id.exists' => 'La gerencia seleccionada no es válida',
            
        ];

        $this->validate($request, $rules, $messages);

        //valido de que aunque no se modifique la extension, no lo tome como dato duplicado
        $extension_exists = Workers::where('extension', $request->extension)
            ->where('id', '!=', $id)
            ->exists();

        if ($extension_exists){
            return redirect()->back()
                ->withErrors(['extension' => 'El número de extensión ya existe, indique uno valido'])
                ->eithInput();
        }

        $worker = Workers::findOrFail($id);
        $data = $request->only('name','last_name','extension','management_id');
        $worker->fill($data);
        $worker->save();
            
            $notification = 'El contacto se ha creado correctamente';
            return redirect('/')->with(compact('notification') );

    }

    public function destroy($id){

        $worker = Workers::findOrFail($id);
        $workername = $worker->name;
        $worker->delete();
        $notification = 'El contacto '. $worker->name .' se ha eliminado correctamente';

        return redirect('/')->with(compact('notification'));
    }
}
