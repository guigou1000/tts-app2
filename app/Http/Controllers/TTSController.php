<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TTSController extends Controller
{
    public function index()
    {
        return view('tts');
    }

    public function speak(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $text = $request->input('text');
        $encodedText = urlencode($text);

        $googleTTSUrl = "https://translate.google.com/translate_tts?ie=UTF-8&q=$encodedText&tl=pt-BR&client=tw-ob";

        // Faz a requisição GET com header User-Agent
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0',
        ])->get($googleTTSUrl);

        if ($response->failed()) {
            return back()->withErrors(['text' => 'Erro ao acessar o serviço de texto para fala.']);
        }

        // Cria nome único para o arquivo
        $filename = 'tts_' . time() . '.mp3';

        // Salva o áudio no storage/app/public
        Storage::disk('public')->put($filename, $response->body());

        // Gera URL pública para o áudio
        $audioUrl = asset("storage/$filename");

        // Retorna a view com os dados
        return view('tts', [
            'audioUrl' => $audioUrl,
            'originalText' => $text,
        ]);
    }
}