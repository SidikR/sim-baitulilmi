<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ImageController extends BaseController
{
    public function imageCrop()
    {
        return view("image-crop");
    }

    public function imageCropPost()
    {
        $data = $this->request->getVar('image');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path =  "images/" . $image_name;

        file_put_contents($path, $data);

        return json_encode(['status' => 1, 'message' => "Image uploaded successfully"]);
    }
}
