<?php

if (!function_exists('uploadFile')) {
    function uploadFile($file, $path = '', $old_file = "")
    {

        //todo  add function to delete old  image from folder
        if (is_string($file)){
            return $file;
        }
        // $fileName = $file->getClientOriginalName();
        // $file_exe = $file->getClientOriginalExtension();
        // $new_name = uniqid() . time() . '.' . $file_exe;
        // $directory = 'uploads' . '/' . $path;//.'/'.date("Y").'/'.date("m").'/'.date("d");
        // $destienation = public_path($directory);
        // $file->move($destienation, $new_name);

        $image = $file;
        $newImageName = uniqid() . '.' .$image->extension();
        $imgFile = \Image::make($image->getRealPath());
        // create a new Image instance for inserting
        $watermark = \Image::make(public_path('assetsfront/images/logo/logo.png'));
        if($imgFile->width() < $watermark->width()){
            $watermark->resize($imgFile->width(), null);
        }
        $imgFile->insert($watermark, 'bottom-right')->save(storage_path('app/public/'.$path).'/'.$newImageName);
        return $path.'/'.$newImageName;
        // return $file->store($path);

    }
}

if (!function_exists('filePath')) {
    function filePath($file, $default = '')
    {
        return empty($file) || $file == $default ? asset('images/' . $default) : asset('storage/' . $file);

    }
}
