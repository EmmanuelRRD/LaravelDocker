<?php
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

if (isset($_GET['migrate_force'])) {
    try {
        Artisan::call('migrate --force');
        die("<h1>¡Éxito total!</h1><p>Tablas creadas en Aiven:</p><pre>" . Artisan::output() . "</pre>");
    } catch (\Exception $e) {
        die("<h1>Error al migrar</h1><p>" . $e->getMessage() . "</p>");
    }
}