<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Collective\Html\FormFacade as Form;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(5);

       
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $usernames = User::pluck('name', 'id');
        return view('usuarios.crear', compact('roles', 'usernames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'name' => 'required',
            'roles' => 'required|array',
        ]);

       

        // Redireccionar o mostrar una respuesta al usuario
        // ...

        // Por ejemplo, redireccionar a la lista de usuarios
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Resto de métodos del controlador...


     public function edit($id)
    {
        // Buscar el usuario que se va a editar
        $user = User::find($id);

        // Obtener los roles disponibles para mostrar en el formulario de edición
        $roles = Role::all();

        // Si no se encuentra el usuario, puedes mostrar un mensaje de error o redireccionar a alguna página
        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'El usuario no existe.');
        }

        // Retornar la vista de edición con los datos del usuario y los roles disponibles
        return view('usuarios.editar', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'name' => 'required',
            'roles' => 'required|array',
        ]);

        // Buscar el usuario que se va a actualizar
        $user = User::find($id);

        // Si no se encuentra el usuario, puedes mostrar un mensaje de error o redireccionar a alguna página
        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'El usuario no existe.');
        }

        // Actualizar los datos del usuario (si es necesario)
        $user->update([
            'name' => $request->input('name'),
            // Otros campos del usuario si los tienes...
        ]);

        // Actualizar los roles del usuario
        $roles = $request->input('roles');
        $user->roles()->sync($roles);

        // Redireccionar o mostrar una respuesta al usuario
        // ...

        // Por ejemplo, redireccionar a la lista de usuarios
        return redirect()->route('usuarios.index')->with('success', 'Roles asignados correctamente.');
    }



    


    public function mostrarUsuariosConRoles()
    {
        $usuarios = Usuario::all();

        dd($usuarios); // Agregar esta línea para inspeccionar los datos

        return view('usuarios.index', compact('usuarios'));
    }



    public function showProfile()
    {
        $user = Auth::user();
        return view('perfil.profile', compact('user'));
    }

    public function updateProfile(Request $request)
{
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'new_password' => 'nullable|string|min:6', // Contraseña debe ser una cadena y tener al menos 6 caracteres
        // Aquí puedes añadir más reglas de validación según tus necesidades
    ]);

    $user = Auth::user();
    // Validar datos
    // Actualizar la información del usuario
    if ($request->filled('new_password')) {
        $user->password = bcrypt($validatedData['new_password']); // Actualizar la contraseña solo si se proporciona y es válida
    }
    $user->name = $request->input('name'); // Actualizar el nombre de usuario

    // Guardar los cambios en la base de datos
    $user->save();
    // Actualizar datos del usuario
    return redirect('/perfil')->with('success', 'Perfil actualizado correctamente');
}


    public function uploadPhoto(Request $request)
    {

         // Validar la solicitud
         $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de que se cargue una imagen válida
        ]);

        $user = Auth::user();

          // Almacenar la foto de perfil
          if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/profiles'); // Almacena la foto en la carpeta 'public/profiles'
            $user->profile_photo = basename($photoPath); // Guarda la ruta relativa de la foto en la base de datos
            $user->save();
        }
        // Subir y guardar la foto de perfil
        return redirect('/perfil')->with('success', 'Foto de perfil actualizada correctamente');
    }
    
    public function showProfileInfo()
    {
        return view('perfil.profile_info');
    }


}
