<?php
function get_url($dest)
{
    global $BASE_PATH;
    if (str_starts_with($dest, "/")) {
        //handle absolute path
        return $dest;
    }
    //handle relative path
    return "$BASE_PATH/$dest";
}

function get_current_url()
{
    // Append the requested resource location to the URL   
    $url= $_SERVER['REQUEST_URI'];  

    return $url;
}

//special function to see if current url is matching the given url
function url_matching_current($dest)
{
    $given_url = get_url($dest);
    $current_url = get_current_url();

    return ($given_url == $current_url);
}


function return_active_class_text($dest)
{
    if(url_matching_current($dest))
    {
        return "class=\"active\"";
    }
    else
    {
        return "";
    }
}

?>