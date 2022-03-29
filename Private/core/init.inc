<?php

/**
 * Copyright 2021, 2024 5 Mode
 *
 * This file is part of MacSwap.
 *
 * MacSwap is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MacSwap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.  
 * 
 * You should have received a copy of the GNU General Public License
 * along with MacSwap. If not, see <https://www.gnu.org/licenses/>.
 *
 * init.inc
 * 
 * MacSwap initialization file.
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2021, 2024, 5 Mode     
 */
 
error_reporting(E_ALL & ~ (E_WARNING | E_NOTICE | E_STRICT | E_DEPRECATED));  
ini_set('display_startup_errors',1);  
ini_set('display_errors',1);  
ini_set('log_errors',1);

require dirname(__DIR__) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.inc";

// Checking a little the configuration..
if (!file_exists(APP_DATA_PATH)) {
  die("Data folder doesn't exist. You must create a data folder in your web app private path and configure it properly inside the config file.");
}	
if (!file_exists(APP_TEMPLATE_PATH)) {
  die("Template folder doesn't exist. You must have a tempate folder in your web app private path and configure it properly inside the config file.");
}	
if (!file_exists(APP_DATA_PATH . "/burger001-s.xml")) {
  // Generating data from the template..

  for ($n=1;$n<=APP_MAX_BURGERS;$n++) { 

    if ($n<10) {
      $baseName = "burger" . "00" . $n . "-s";
    } else if ($n<100) {
      $baseName = "burger" . "0" . $n . "-s";
    } else {
      $baseName = "burger" . $n . "-s";
    }    
    
    if (!file_exists(APP_DATA_PATH . "/" . $baseName . ".xml")) {
      // -- generating burgerNNN-s.xml
      
      copy(APP_TEMPLATE_PATH . "/burger.xml.amp.template",APP_DATA_PATH . "/" . $baseName . ".xml");
      //chmod(APP_DATA_PATH . "/" . $baseName . ".xml", 0777);
      $xmlStr = file_get_contents(APP_DATA_PATH . "/" . $baseName . ".xml");
      $newGuid = mb_substr(hash("sha256", mt_rand() . mt_rand() . APP_SALT, false), 0, 32);
      $xmlStr = str_replace("<guid></guid>", "<guid>" . $newGuid . "</guid>", $xmlStr);
      $xmlStr = str_replace("<business-type></business-type>", "<business-type>" . BUSINESS_TYPE . "</business-type>", $xmlStr);
      $xmlStr = str_replace("<city></city>", "<city>" . BUSINESS_CITY . "</city>", $xmlStr);
      $xmlStr = str_replace("<country></country>", "<country>" . BUSINESS_COUNTRY . "</country>", $xmlStr);
      $xmlStr = str_replace("<password></password>", "<password>" . EDITOR_PASSWORD . "</password>", $xmlStr);
      $xmlStr = file_put_contents(APP_DATA_PATH . "/" . $baseName . ".xml", $xmlStr);
    }  
  }  
}  
if (EDITOR_PASSWORD === "" || (strlen(EDITOR_PASSWORD) < 6)) {
  die("Editor password must be set (with a 6 chars min length). You must generate an editor password and configure it properly inside the config file.");
}  

require dirname(__DIR__) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "const.inc";
require dirname(__DIR__) . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR . "funct.inc";

// ERROR HANDLING AND LOGGING

if (DEBUG) {
  error_reporting(E_ALL | E_STRICT);  
  ini_set('display_startup_errors',1);  
  ini_set('display_errors',1);
  ini_set('log_errors',1); 
} else {
  error_reporting(E_ALL & ~ (E_WARNING | E_NOTICE | E_STRICT | E_DEPRECATED));  
  ini_set('display_startup_errors',0);  
  ini_set('display_errors',0);  
  ini_set('log_errors',1); 
}

// Set no cache headers
// for HTTP/1.0 clients
header("Expires: 0");
header("Pragma: no-cache");
// HTTP/1.1 support
header("Cache-Control: private,no-cache,max-age=0,s-maxage=0,must-revalidate");
