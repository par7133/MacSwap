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
 * putxml.php
 * 
 * Write an xml file in the data folder.
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2016, 2024, 5 Mode
 */

//
// PARAMETER VALIDATION
//
$filename = filter_input(INPUT_POST, "f");

if (preg_match("/burger\d\d\d\-o\-\d\d\d/", $filename)) {
  $filename = $filename . ".xml";
} else if (preg_match("/burger\d\d\d/", $filename)) {
  $filename = $filename . "-s.xml";
} else {
  exit(0);
}

$filepath = APP_DATA_PATH . PHP_SLASH . $filename;

//chmod(APP_DATA_PATH . PHP_SLASH . $filename, 0777);

$xmlStr = filter_input(INPUT_POST, "xml");

file_put_contents($filepath, $xmlStr);

echo json_encode([200, 'OK']);