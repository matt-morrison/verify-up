# verify-up

Description:

This program tests whether a site is up or not by downloading a known file
from the remote server. If the file is able to be downloaded, the site is
considered to be up, and the URL to the remote site is served. If the file,
however, is not found, you are able to serve a mirror to the site. This
example uses two instances of sites to be tested, but you can expand them to
as many as you need.

Usage:

index.php contains two links for testing two separate sites. The names of these
sites are passed along to verify-up.php.

Set the "TestURL1" and "TestURL2" variables to known files on remote servers that you wish to test.

Set the "TestURL1-Mirror" and "TestURL2-Mirror" to mirrored versions of the sites
if the file is not found on the remote server.
