<?php
/**
 * 验证码类
 */
class VerifyCode
{
    function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    /**
     * 随机字符串
     * @param  integer $type   类型(1.数字;2.字母;3.数字加字母)
     * @param  integer $length 字符串长度
     * @return String          随机字符串
     */
    public function buildRandomString($type=1, $length=4)
    {
        if ($type == 1){
            $chars = join("", range(0,9));
        } elseif($type == 2) {
            $chars = join ("", array_merge(range("a","z"),range("A","Z")));
        } elseif ($type  == 3) {
            $chars = join("",array_merge(range("a","z"),range("A","Z"),range(0,9)));
        }

        if ($length >= strlen($chars)){
            exit ('字符串长度不足');
        }
        $chars = str_shuffle($chars);
        return substr($chars, 0, $length);
    }
    /**
     * 生成验证码图片
     * @param  integer $type      类型(1.数字;2.字母;3.数字加字母)
     * @param  integer $length    字符串长度
     * @param  integer $pixel     图片中点的数量
     * @param  integer $line      图片中线的数量
     * @param  string  $sess_name session名称
     */
    public function verifyImage($type = 1, $length = 4, $pixel = 0, $line = 0, $sess_name="verify")
    {

        $width = 80;
        $height = 28;
        $image = imagecreatetruecolor($width,$height);
        $white = imagecolorallocate($image,255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);
        imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
        $chars = $this->buildRandomString($type, $length);
        $_SESSION[$sess_name] = $chars;
        for ($i=0; $i < $length; $i++) {

            $size = mt_rand(14, 18);
            $angle = mt_rand(-15, +15);
            $x = 5+$i*$size;
            $y = mt_rand(20,26);
            $color = imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));

            $fontfile = ROOT_PATH."/fonts/SassoonSansSlopeStd-Bold.otf";
            $text = substr($chars,$i, 1);

            imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
        }

        if ($pixel) {
            for ($i=0; $i < $pixel; $i++) {
                $color = imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
                imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $color);
            }
        }

        if ($line) {
            for ($i=0; $i < $line; $i++) {
                $color = imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
                imageline($image, mt_rand(0,$width-1), mt_rand(0,$height-1), mt_rand(0,$width-1), mt_rand(0,$height-1),$color);
            }
        }
        Header("Content-type:image/gif");
        imagegif($image);
        imagedestroy($image);
    }
}
?>