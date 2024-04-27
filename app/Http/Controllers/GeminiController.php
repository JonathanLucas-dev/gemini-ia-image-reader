<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\GeminiService;
use Illuminate\Http\Request;

class GeminiController extends Controller
{
  public function create()
  {
    return view("home");
  }
  public function store(Request $request, GeminiService $geminiService)
  {
    if ($request->hasFile('document')) {
      $file = $request->file('document');
      $url = $file->getPathname();

      try {
        $analysisResult = $geminiService->analyzeImage($url);
        $message = $analysisResult;
      } catch (\Throwable $th) {
        $message = "Erro ao analisar a imagem" . $th->getMessage();
      }

      // $message = str_replace([" ```json", "```"], ["", ""], $message);
      // $messageJson = json_decode($message, true);
      // print_r($messageJson);
      // dd($messageJson);
      return back()->with("message", $message);
    } else {
      return back()->with("message", "Nenhum arquivo foi enviado.");
    }
  }
}
