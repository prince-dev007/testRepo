<?php
require 'vendor/autoload.php';
define('SITE_URL','http://localhost:8888/roofprotect/');
//define('SITE_URL','http://localhost/dropbox/theroofstorecart');
//define('SITE_URL','https://shopping.theroofstore.net');
/*$paypal = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
      'AYLJD7zRU8dG6i3WDmisHzWb48rFshfeX4LdFZlud9DZFj-jCZDLkP1SWNaU_JwMV2ZUc2TGhW9X0s3E',
      'EKD3TPFjvifRIccqKflYvkpxzjMiUzWSEZHluL4bt5gQ1gL2QQ-ZQ0FyBWbnXO5NuYmtMMfFcwUgsni1'
  )
);*/

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ATG6W9AXka1Y_Mp28qFGwAfwGwMztYqMioiqUtXDkfOCqKHxiV5IvW98pfsZq-vo7lO43zZvku8xSXj0',
        'EFJPGG8bJgzsnb4xhoil9dq77t53At7FdKcBWBnzsbFEWtODHyMkknwVBLQhy_KnNbwyS7l9LsWe69sr'
    )
);
