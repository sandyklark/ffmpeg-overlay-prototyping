const execa = require('execa');

const inputFileUrl = '"https://esgmisc-eu-noglacier.s3.eu-west-1.amazonaws.com/89685_243758_Bed%20Of%20Roses_S1_Ep1.mp4-20190809140117.mp4-20190810030414.mp4?response-content-disposition=attachment%3B%20filename%3D89685_243758_Bed%20Of%20Roses_S1_Ep1.mp4-20190809140117.mp4-20190810030414.mp4&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAILRIVY5FYBGXRKLA%2F20200528%2Feu-west-1%2Fs3%2Faws4_request&X-Amz-Date=20200528T115951Z&X-Amz-SignedHeaders=host&X-Amz-Expires=604800&X-Amz-Signature=00dc28b714e179944f6bab01dab4794b39a7c18226a4287067617194f9376718"';
// const inputFileUrl = '~/Desktop/test.mp4';
const outputFilePath = '~/Desktop/output.mp4';

const drawTextArgs = [
    "text='Stack Overflow'",
    "fontcolor=white",
    "fontsize=24",
    "box=1",
    "boxcolor=black@0.5",
    "boxborderw=5",
    "x=(w-text_w)/2",
    "y=(h-text_h)/2"
];

const joinedDrawTextArgs = drawTextArgs.join(': ');

const ffmpegArgs = [
    '-i',
    inputFileUrl,
    '-vf',
    `drawtext="${joinedDrawTextArgs}"`,
    '-codec:a',
    'copy',
    outputFilePath
];

(async () => {
    const {output} = await execa('ffmpeg', ffmpegArgs, {shell: true});
    console.log(output);
})();
