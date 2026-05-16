<?php
use App\Models\Alumno;
use Illuminate\Http\Request;

Route::get('/gestion-alumnos', function () {
    return view('single'); 
});

Route::get('/api/alumnos', fn() => Alumno::all());
Route::post('/api/alumnos', function(Request $request) {
    return Alumno::create($request->all());
});

Route::delete('/api/alumnos/{id}', function($id) {
    Alumno::findOrFail($id)->delete();
    return response()->json(['success' => true]);
});