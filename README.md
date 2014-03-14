AslEljava
=========

php-project


library phpqrcode:
include the path of "qrlib.php" file from it in the php file
if put in AslEljava, the path is include('phpqrcode/qrlib.php');


store.php

i have written a script for our forwarded url from the QRcode Scan , every Qrcode is going to be created with url like "host/store.php?prod_id=(whatever)" ie.( host = our localhost or the server were're uploading to , (whatever) = the product id from the database , the one being scanned :-) ) so when the code is scanned its going to redirect to this script with the required product id . The script is going to increment the products p_hits meaning that its been bought p_hits times and decrement its stock , ofcourse its gonna check first for it stock value to see if the operation can continue , and at the end it will display a mmessage for the user depending on what happened .

lib.php ( alter) 

i added a function geoCheckIP($ip) which takes ip number and returns domain,country,state,town .
i use this function in the store.php script to get the request ip address and collect information about location based on it and store it in the database with the number of hits for products from this location , which brings me to..


database_update.txt

i added a table called hit_locations to track that info and store only unique locations each time with their hit counts .
i also added a field called p_hits that keeps track how many times a product has been bought . please feel free to delete the description i just wrote after reading it if u find no need for it after that .
