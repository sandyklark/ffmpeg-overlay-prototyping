<?php

trait Overlay {

    function addOverlay($overlayOptions) {

        $drawTextArgs = "text='" . $overlayOptions["text"] . "': ";
        $drawTextArgs .= "fontcolor=" . $overlayOptions["fontcolor"] . ": ";
        $drawTextArgs .= "fontsize=" . $overlayOptions["fontsize"] . ": ";
        $drawTextArgs .= "box=" . $overlayOptions["box"] . ": ";
        $drawTextArgs .= "boxcolor=" . $overlayOptions["boxcolor"] . "@" . $overlayOptions["boxopacity"] . ": ";
        $drawTextArgs .= "boxborderw=" . $overlayOptions["borderwidth"] . ": ";
        $drawTextArgs .= "x=" . $overlayOptions["x"] . ": ";
        $drawTextArgs .= "y=" . $overlayOptions["y"];

        $drawText = 'drawtext=' . $drawTextArgs;

        $ffmpegCommand = 'ffmpeg -i ';
        $ffmpegCommand .= $overlayOptions["inputfile"];

        // add image input
        if(isset($overlayOptions["image"]) && !empty($overlayOptions["image"])) {
            $ffmpegCommand .= ' -i ' . $overlayOptions["image"]["path"];
        }

        $ffmpegCommand .= ' -filter_complex "';

        // overlay image
        if(isset($overlayOptions["image"]) && !empty($overlayOptions["image"])) {
            $ffmpegCommand .= '[0:v][1:v] overlay=';
            $ffmpegCommand .= $overlayOptions["image"]["x"] . ':' . $overlayOptions["image"]["y"];
            $ffmpegCommand .= ':enable=\'between(t,' . $overlayOptions["image"]["startSeconds"] . ',' . $overlayOptions["image"]["endSeconds"] . ')\', ';
        }

        $ffmpegCommand .= $drawText;
        $ffmpegCommand .= '"';

//         $ffmpegCommand .= ' -vf ';
        $ffmpegCommand .= ' -codec:a copy ';
        $ffmpegCommand .= $overlayOptions["outputfile"];


//         echo $ffmpegCommand;
//         die;

        shell_exec($ffmpegCommand);
    }
}
