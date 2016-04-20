/**
  File: verify-up.php

  Description:

  This program tests whether a site is up or not by downloading a known file
  from the remote server. If the file is able to be downloaded, the site is
  considered to be up, and the URL to the remote site is served. If the file,
  however, is not found, you are able to serve a mirror to the site. This
  example uses two instances of sites to be tested, but you can expand them to
  as many as you need.

**/

<?php
// TestURL1 and TestURL2 can be replaced with the URL of a file on the remote site
// you wish to test. Be sure to link a file that you know will not go away, such
// as the index.html file at the root of the remote web server.
if (isset($_GET['TestURL1'])) {
  verify("TestURL1");
} else if (isset($_GET['TestURL2'])) {
  verify("TestURL2");
}

// $testsite is the argument which contains the link to the file you wish to see
// if it exists on the remote server.
function verify($testsite) {

  $ts = curl_init($testsite);

  curl_setopt($ts, CURLOPT_NOBODY, true);
  curl_exec($ts);
  $ret = curl_getinfo($ts, CURLINFO_HTTP_CODE);

  // $ret >= 400 -> not found, $ret = 200, found.
  // Replace the TestURL with the address you set above. If the site exists, you
  // can link to the TestURL
  if ($ret == 200 && $testsite == "TestURL1") {
    echo '<script type="text/javascript">
           window.location = "TestURL1"
          </script>';
  }
  else if ($ret == 200 && $testsite == "TestURL2") {
    echo '<script type="text/javascript">
           window.location = "TestURL2"
          </script>';
  }
  // If $ret !=200, the file on the site is not found. If this is the case,
  // you can link to a mirror of the site so that your link never goes down.
  else if ($ret != 200 && $testsite == "TestURL1") {
    echo '<script type="text/javascript">
           window.location = "TestURL1-Mirror"
          </script>';
  }
  else if ($ret != 200 && $testsite == "TestURL2") {
    echo '<script type="text/javascript">
           window.location = "TestURL2-Mirror"
          </script>';
  }
  curl_close($ts);
}
?>
