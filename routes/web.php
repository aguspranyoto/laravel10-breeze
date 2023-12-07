<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return redirect('/dashboard');

    // ========================== ELOQUENT ORM ============================
    $user = User::find(10);
    dd($user->name);

    // ========================== UPDATE DATA =============================
    // $user = User::find(8);
    // $user->update([
    //     'email'=>'safira112@gmail.com'
    // ]);
    // dd($users);

    // ========================== DELETE DATA =============================
    // $user = User::find(7);
    // $user->delete();
    // dd($user);

    // ========================== CREATE DATA =============================
    // $user = User::create([
    //     'name'=>'safira01',
    //      'email'=>'safira01@gmail.com',
    //      'password'=>'password',
    // ]);
    // dd($user);

    // ========================== QUERY BUILDER ============================

    // ========================== GET ALL DATA =============================
    // $users = DB::table('users')->get();
    // dd($users);

    // ========================= GET SINGLE DATA  ==========================
    // $users = DB::table('users')->where('id',2)->get();
    // $users = DB::table('users')->find(2);
    // dd($users);

    // =========================== INSERT DATA =============================
    // $user = DB::table('users')->insert([
    //     'name'=>'safira',
    //     'email'=>'safira@gmail.com',
    //     'password'=>'password',
    // ]);
    // dd($user);

    // =========================== UPDATE DATA =============================
    // $users = DB::table('users')->where('id',2)->update([
    //     'name'=>'aguud'
    // ]);
    // dd($users);

    // =========================== DELETE DATA =============================
    // $users = DB::table('users')->where('id',5)->delete();
    // dd($users);




    

    // =========================== RAW SQL ===========================
    // fetch all users
    // $users = DB::select('select * from users');
    // dd($users);

    // insert to users
    // $user = DB::insert('insert into users (name,email,password) values(?,?,?) ', ['joko','joko@gmail.com','password']);
    // dd($user);

    // update user
    // $user = DB::update("update users set email = ? where id = ? ",['joko@gmail.com',4]);
    // dd($user);

    // delete user
    // $user = DB::delete("delete from users where id = ? ",[1]);
    // dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
