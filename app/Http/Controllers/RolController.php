<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RolController extends Controller
{


     function __construct()
     {
     $this->middleware('can:ver-rol | crear-rol | editar-rol | borrar-rol', ['only'=>['index']]);
    $this->middleware('can:crear-rol', ['only'=>['create','store']]);
    $this->middleware('can:editar-rol', ['only'=>['edit','update']]);
    $this->middleware('can:borrar-rol', ['only'=>['destroy']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roles = Role::paginate(5);
       return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function obtenerPermiso(): array
{
    // Obtiene los permisos de la base de datos
    $permisos = DB::table('permissions')->get();

    // Convierte los permisos a un array
    $permisosArray = [];
    foreach ($permisos as $permiso) {
        $permisosArray[] = [
            'id' => $permiso->id,
            'nombre' => $permiso->nombre,
        ];
    }

    // Retorna el array de permisos
    return $permisosArray;
}

    

public function create()
{
    // Obtener permisos asociados al guardia 'web'
    $permisos = Permission::where('guard_name', 'web')->get();
    
    // Obtener roles
    $roles = Role::all();

    // Pasar los permisos y roles a la vista
    return view('roles.crear', compact('permisos', 'roles'));
}





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name' => 'required', 'permission' => 'required']);
        $role = Role::create(['name' =>$request->input('name')]);
        $role->syncpermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = permission::get();
        $rolepermission = DB::table('role_has_permission')->where('role_has_permission.role_id', $id)
            ->pluck('role_has_permission.permission_id','role_has_permission.permission_id')
            ->all();
        return view('roles.editar',compact('role','permission','rolepermission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['name' => 'required', 'permission' => 'required']);

        $role = Role::find($id);
        $role->name =$request->input('name');
        $role->save();

        $role->syncpermissions($request->input('permission'));
        return  redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return  redirect()->route('roles.index');
    }
}
