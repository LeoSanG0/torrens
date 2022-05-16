<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Yajra\DataTables\DataTables;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Arr;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users_show|users_create|users_edit|users_delete', ['only' => ['index']]);
        $this->middleware('permission:users_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users_delete', ['only' => ['destroy']]);
    }


    public function datatable()
    {

        $data = User::orderBy('id', 'asc')->get();
        return Datatables::of($data)
            ->addColumn('fullname', function ($model) {
                return $model->fname . ' ' . $model->lname;
            })
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Activo' : 'Inactivo';
            })
            ->addColumn('actions', function ($model) {

                $buttons = '<div class="btn-group">';
                $buttons .= "<a href='" . route('users.edit', $model->id) . "' data-id='$model->id' 
                    data-action='Update' class='btn btn-info' title='editar'><i class='fas fa-edit fa-1x'></i></a>";

                $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='" . route('users.destroy', $model->id)
                    . "' class='btn btn-info btn-modal-delete-user' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";


                $buttons .= '</div>';

                return $buttons;
            })->rawColumns(['actions'])->make(true);
    }
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.created', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:7|confirmed|regex:/[A-Z][0-9]/',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');

    }
}
