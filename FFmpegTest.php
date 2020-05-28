<?php

require('./Overlay.php');

class FFmpegTest {
    use Overlay;
}

$overlay = new FFmpegTest();

$overlayOptions = array(
 "text" => "gronkle ++",
 "fontcolor" => "white",
 "fontsize" => "40",
 "box" => "1",
 "boxcolor" => "black",
 "boxopacity" => "0.6",
 "borderwidth" => "5",
 "x" => "(w-text_w)*0.1",
 "y" => "(h-text_h)*0.9",
 "image" => [
    "path" => "https://lh3.googleusercontent.com/proxy/yJOXVe0-dXh_b9me1r7KaFNoZawFoF1VpJAsu_Q6XtVH53Y6FgxM73d5GeFRnDANHjUHJuIUyk9_F4JakY5KeW0Y5xh9QtOzSLC3SI5CmMouZ0YFHSHnE0fT2v2awddlEJE",
    "x" => "(W-w)/2",
    "y" => "(H-h)/2",
    "startSeconds" => "2",
    "endSeconds" => "8",
 ],
 "inputfile" => '"https://esgmisc-eu-noglacier.s3.eu-west-1.amazonaws.com/89685_243758_Bed%20Of%20Roses_S1_Ep1.mp4-20190809140117.mp4-20190810030414.mp4?response-content-disposition=attachment%3B%20filename%3D89685_243758_Bed%20Of%20Roses_S1_Ep1.mp4-20190809140117.mp4-20190810030414.mp4&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAILRIVY5FYBGXRKLA%2F20200528%2Feu-west-1%2Fs3%2Faws4_request&X-Amz-Date=20200528T152439Z&X-Amz-SignedHeaders=host&X-Amz-Expires=604800&X-Amz-Signature=9bf6f61104f8f2d80b4ff8604ac9f210e07c02f134b271f946e2666f3d786e3a"',
 "outputfile" => "~/Desktop/output.mp4"
);

$overlay->addOverlay($overlayOptions);


