<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; // Certifique-se desse import

class AlunoPhotoController extends Controller
{
    // Pode usar middleware no construtor para proteger a rota
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($nome)
    {
        $path = $nome . '/photo.png';

        if (!Storage::disk('alunos')->exists($path)) {
            abort(404, 'Foto não encontrada');
        }

        $file = Storage::disk('alunos')->get($path);
        $mime = Storage::disk('alunos')->mimeType($path);

        return response($file, 200)->header('Content-Type', $mime);
    }
}
