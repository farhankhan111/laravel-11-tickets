<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/test',function(){

    $directory = base_path('resources/views');
    $currentFilePath = __FILE__;
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    $files = [];

    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $filePath = $file->getPathname();
            if($filePath !== $currentFilePath) {
                if (strpos(file_get_contents($filePath), 'www.example.com') !== false) {
                    $files[] = $filePath;
                }
            }
        }
    }


    echo "<pre>";
    print_r($files);


    /*function abc($a = 'defult',$b='defult b',$c=null){

        echo $a .' '. $b .' '. $c;
    }


     abc(c:3);*/

});
