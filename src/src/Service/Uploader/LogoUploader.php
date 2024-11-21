<?php

declare(strict_types=1);

namespace App\Service\Uploader;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use function Symfony\Component\String\s;

class LogoUploader
{
  public function __construct(
    #[Autowire('%kernel.project_dir%/public/images/logos')] private string $logosDirectory,
  ) {
  }

  public function upload(UploadedFile $logo): string
  {
    $originalFilename = pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME);
    $logoName = s($originalFilename)->ascii() . '-' . uniqid() . '.' . $logo->guessExtension();
    $logo->move($this->logosDirectory, $logoName);
    return $logoName;
  }
}
