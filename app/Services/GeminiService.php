<?php

namespace App\Services;

use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;

class GeminiService
{
  public function analyzeImage(string $imageUrl)
  {
    $prompt = "retorne um json com os dados";
    $imageBlob = new Blob(
      mimeType: MimeType::IMAGE_JPEG,
      data: base64_encode(file_get_contents($imageUrl))
    );

    $result = Gemini::geminiProVision()->generateContent(
      [
        $prompt,
        $imageBlob
      ]
    );
    return $result->text();
  }
}
