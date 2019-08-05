<?php 
namespace App\Helpers;

use File;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ImageUpload
{
    public $file;
    public $baseWidth = 350;
    public $baseHeight = null;
    public $width = 250;
    public $height = 250;
    private $savePath;
    private $extension;
    private $randomNumber;
    public $filename;
    private $filePath;
    private $uploadedFile;
    private $fullPath;

    public function __construct($file, $savePath = "/images")
    {
        $this->file = $file;
        $this->savePath = $savePath;
        $this->filePath = public_path($this->savePath);
        if (!File::exists($this->filePath)) {
            File::makeDirectory($this->filePath);
        }
       
        $this->generateNewName();
    }
    

    private function getExtension()
    {
        $this->extension = $this->file->getClientOriginalExtension();
    }

    private function getRandomNumber()
    {
        $this->randomNumber = sha1(Carbon::now().microtime());
    }

    private function generateNewName()
    {
        $this->getExtension();
        $this->getRandomNumber();
        $this->fullPath = $this->filePath.'/'.$this->randomNumber.'.'.$this->extension;
        $this->filename = $this->savePath.'/'.$this->randomNumber.'.'.$this->extension;
    }

    public function upload()
    {
        $this->uploadedFile = Image::make($this->file);
    }

    public function resize()
    {
        $this->uploadedFile->resize($this->baseWidth, $this->baseHeight, function ($constain) {
            $constain->aspectRatio();
        });
    }

    public function crop()
    {
        $this->uploadedFile->crop($this->width, $this->height);
    }

    public function save()
    {
        $this->uploadedFile->save($this->fullPath);
        return $this->filename;
    }

    public function execute()
    {
        $this->upload();
        $this->resize();
        $this->crop();
        return  $this->save();
    }
}
