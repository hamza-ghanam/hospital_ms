<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('manage user'))
            return Redirect::to('index');

        $users = DB::table('users AS u')
            ->select('u.id', 'u.name AS uname', 'u.email', 'u.created_at', 'r.name AS rname')
            ->join('model_has_roles AS mr', 'u.id', '=', 'mr.model_id')
            ->join('roles AS r', 'mr.role_id', '=', 'r.id')
            ->whereNull('deleted_at')
            ->paginate(10);

        return View('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('manage user'))
            return Redirect::to('index');

        return View('users.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('manage user'))
            return Redirect::to('surgeries');

        $user = new User;
        $user->name = $request->input('name');
        $user->enname = $request->input('enname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $user->assignRole($request->input('user_role'));

        return Redirect::back()->withErrors(['message' => 'تمت إضافة الموظف بنجاح']);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('manage user'))
            return Redirect::to('index');

        $user = DB::table('users AS u')
            ->select('u.id', 'u.name AS uname', 'u.email', 'u.created_at', 'r.name AS rname')
            ->join('model_has_roles AS mr', 'u.id', '=', 'mr.model_id')
            ->join('roles AS r', 'mr.role_id', '=', 'r.id')
            ->where('u.id', $id)
            ->first();

        return View('users.show')->with(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users AS u')
            ->select('u.id', 'u.name AS uname', 'u.enname AS uenname', 'u.email', 'u.created_at', 'r.name AS rname')
            ->join('model_has_roles AS mr', 'u.id', '=', 'mr.model_id')
            ->join('roles AS r', 'mr.role_id', '=', 'r.id')
            ->where('u.id', $id)
            ->first();

        return View('users.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('manage user'))
            return Redirect::to('surgeries');

        if ($request->input('password') != $request->input('password_confirmation')) {
            return Redirect::back()->withErrors(['message' => 'كلمة المرور وتأكيدها غير متطابقين']);
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->enname = $request->input('enname');

        if (!empty($request->input('password')) && $request->input('password') != null)
            $user->password = Hash::make($request->input('password'));

        $user->save();

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('user_role'));

        return Redirect::to('users')->withErrors(['message' => 'تمت إضافة الموظف بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('manage user'))
            return Redirect::to('users');

        $user = User::find($id);
        $user->delete();

        return Redirect::to('users')->with('message', 'تم حذف الموظف بنجاح');

    }

    /** 1/12/2019 */
    public function reset_password()
    {
        return view("users.reset_password");
    }

    public function store_reset_password(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->input("old_password"), $user->getAuthPassword())) {
            return view("users.reset_password", ["message" => "كلمة المرور الحالية غير صحيحة"]);
        }

        if (strcmp(trim($request->input("new_password")), trim($request->input("confirm_password"))) != 0) {
            return view("users.reset_password", ["message" => "كلمة المرور الجديدة وتأكيدها غير متطابقين"]);
        }

        $pass_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

        if (!preg_match($pass_regex, trim($request->input("new_password")))) {
            return view("users.reset_password", ["message" => "الحد الأدنى لكلمة المرور 8 محارف، ويجب أن تحتوي أحرف كبيرة وصغيرة وأرقام فقط."]);
        }

        $user->password = Hash::make($request->input("new_password"));
        $user->save();

        return Redirect::to("cms");
    }
}
