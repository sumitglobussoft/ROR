<?php session_start();
putenv('GDFONTPATH=' . realpath('.'));

class phptextClass
{

    public function phpcaptcha($textColor, $backgroundColor, $imgWidth, $imgHeight, $noiceLines = 0, $noiceDots = 0, $noiceColor)
    {

        /* Settings */
        $text = $this->random();

        $font = 'mono.ttf';/* font */
        $textColor = $this->hexToRGB($textColor);
        $fontSize = 25;

        $im = imagecreatetruecolor($imgWidth, $imgHeight);
        $textColor = imagecolorallocate($im, $textColor['r'], $textColor['g'], $textColor['b']);

        $backgroundColor = $this->hexToRGB($backgroundColor);
        $backgroundColor = imagecolorallocate($im, $backgroundColor['r'], $backgroundColor['g'], $backgroundColor['b']);

        /* generating lines randomly in background of image */
        if ($noiceLines > 0) {
            $noiceColor = $this->hexToRGB($noiceColor);
            $noiceColor = imagecolorallocate($im, $noiceColor['r'], $noiceColor['g'], $noiceColor['b']);
            for ($i = 0; $i < $noiceLines; $i++) {
                imageline($im, mt_rand(0, $imgWidth), mt_rand(0, $imgHeight),
                    mt_rand(0, $imgWidth), mt_rand(0, $imgHeight), $noiceColor);
            }
        }

        if ($noiceDots > 0) {/* generating the dots randomly in background */
            for ($i = 0; $i < $noiceDots; $i++) {
                imagefilledellipse($im, mt_rand(0, $imgWidth),
                    mt_rand(0, $imgHeight), 3, 3, $textColor);
            }
        }

        imagefill($im, 0, 0, $backgroundColor);
        list($x, $y) = $this->ImageTTFCenter($im, $text, $font, $fontSize);
        imagettftext($im, $fontSize, 0, $x, $y, $textColor, $font, $text);

        imagejpeg($im, NULL, 90);/* Showing image */
        header('Content-Type: image/jpeg');/* defining the image type to be shown in browser widow */
        imagedestroy($im);/* Destroying image instance */
        if (isset($_SESSION)) {
            $_SESSION['captcha_code'] = $text;/* set random text in session for captcha validation*/
        }
    }

    /*for random string*/
    protected function random($characters = 5, $letters = '23456789bcdfghjkmnpqrstvwxyz')
    {
        $str = '';
        for ($i = 0; $i < $characters; $i++) {
            $str .= substr($letters, mt_rand(0, strlen($letters) - 1), 1);
        }
        return $str;
    }

    /*function to convert hex value to rgb array*/
    protected function hexToRGB($colour)
    {
        if ($colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('r' => $r, 'g' => $g, 'b' => $b);
    }

    /*function to get center position on image*/
    protected function ImageTTFCenter($image, $text, $font, $size, $angle = 8)
    {
        $xi = imagesx($image);
        $yi = imagesy($image);
        $box = imagettfbbox($size, $angle, $font, $text);
        $xr = abs(max($box[2], $box[4]));
        $yr = abs(max($box[5], $box[7]));
        $x = intval(($xi - $xr) / 2);
        $y = intval(($yi + $yr) / 2);
        return array($x, $y);
    }
}


$phptextObj = new phptextClass();

$phptextObj->phpcaptcha('#31627A', '#FFFFFF', 120, 40, 10, 25, '#66CCFF');


//
//
//class phptextClass
//{	
//public function phpcaptcha()
//	{
//$characters=6;
//$letters = '23456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//
//		$str='';
//		for ($i=0; $i<$characters; $i++) { 
//			$str .= substr($letters, mt_rand(0, strlen($letters)-1), 1);
//		}
//   $text=$str;
//$font_size =25;
//$image_width =150;
//$image_height =30;
//$font = "mono.ttf";
//
//$im = imagecreate($image_width, $image_height);
//$b=imagecolorallocate($im, 255, 255, 255);
//$text_color= imagecolorallocate($im, 0,0,0);
//
//for($x=1; $x<=50; $x++)
//{
//	$x1 = rand(1, 100);
//	$y1 = rand(1, 100);
//	$x2 = rand(1, 100);
//	$y2 = rand(1, 100);
//	
//	imageline($im, $x1, $y1, $x2, $y2, $text_color);
//}
//imagettftext($im, $font_size, 5, 22, 30, $text_color, $font, $text);
////imagestring($im, 8, 22, 7, $text, $text_color);
//header('Content-type: image/png');
//imagepng($im);
//$_SESSION['captcha_code'] = $text;
//imagedestroy($im);/* Destroying image instance */
//		if(isset($_SESSION)){
//			$_SESSION['captcha_code'] = $text;/* set random text in session for captcha validation*/
//		}
//}}
?>