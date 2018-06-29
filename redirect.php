<?php
function safe_redirect($url, $exit=true) {
 
    // Only use the header redirection if headers are not already sent
    if (!headers_sent()){
 
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $url);
 
        // Optional workaround for an IE bug (thanks Olav)
        header("Connection: close");
    }
 
    
    print '<html>';
    print '<head><title>Redirecting you...</title>';
    print '<meta http-equiv="Refresh" content="0;url='.$url.'" />';
    print '</head>';
    print '<body onload="location.replace(\''.$url.'\')">';
 
    print 'You should be redirected to this URL:<br />';
    echo "<a href=".$url.">$url</a><br /><br />";
 
    print 'If you are not, please click on the link above.<br />';    
 
    print '</body>';
    print '</html>';

    
    if ($exit) exit;
}

?>
