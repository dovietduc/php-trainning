<?php

namespace View;

class View {

    public static function render($path, $data) 
    {
        // foreach($data as $key => $value) {
        //     $$key = $value;
        // }

        extract($data);
        require __DIR__ . '/' . $path;
    }

}