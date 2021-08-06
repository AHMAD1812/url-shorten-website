<?php

include "config.php";

$full_url = mysqli_real_escape_string($conn, $_POST['full_url']);
if(!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)){
    $ran_url=substr(md5(microtime()),rand(0,26),5);

    $sql_check=mysqli_query($conn,"Select shortenurl from url where shortenurl = '{$ran_url}'");
    if(mysqli_num_rows($sql_check)>0){
        echo "Something went Wrong Please Regenerate URL";
    }else{
        $sql_insert=mysqli_query($conn,"insert into url(shortenurl,originalurl,clicks) values('{$ran_url}','{$full_url}','0')");

        if($sql_insert){
            $sql=mysqli_query($conn,"Select shortenurl from url where shortenurl = '{$ran_url}'");
            if(mysqli_num_rows($sql)>0){
                $shorten_url=mysqli_fetch_assoc($sql);
                echo $shorten_url['shortenurl'];

            }
        }else{
            echo "Something went wrong";
        }
    }

}else{
    echo "$full_url - This is not a valid URL!";
}

?>