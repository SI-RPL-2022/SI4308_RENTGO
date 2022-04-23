<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait SummernoteWithUpload
{
    public function checkDirectory()
    {
        // check directory
        $dir = 'assets/text-editor';

        if (!Storage::exists($dir)) {
            Storage::makeDirectory($dir);
        }

        return $dir;
    }

    public function summernote($variable)
    {
        $dir = $this->checkDirectory();

        // text editor dom
        $dom = new \DomDocument();
        @$dom->loadHtml($variable, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // condition if text editor has image
        if (count($images) > 0) {
            foreach ($images as $image) {
                
                // condition if image exists
                if (Str::contains($image->getAttribute('src'), asset("storage/$dir"))) {
                    continue;
                }

                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgData = base64_decode($data);
                $image_name = "$dir/" . time() . "-" . Str::random(5) .".png";
                
                
                Storage::put($image_name, $imgData);

                $image->removeAttribute('src');
                $image->setAttribute('src', asset("storage/$image_name"));
            }

            $variable = $dom->saveHTML();
        }

        return htmlentities($variable);
    }
}