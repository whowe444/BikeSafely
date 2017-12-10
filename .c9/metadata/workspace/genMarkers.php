{"changed":true,"filter":false,"title":"genMarkers.php","tooltip":"/genMarkers.php","value":"<?php \n    require(\"./connFiles/LoginMaterials/dbcredentials.php\");\n    unlink('markers.xml');\n    //header(\"Content-type: text/xml\");\n        \n    //start Xml file, create parent node\n    //clearstatcache();\n    $dom = new DOMDocument(\"1.0\", \"utf-8\");\n    $node = $dom->createElement(\"markers\", \"This is the root element\");\n    $parnode =$dom->appendChild($node);\n\n    //Connect to the database\n    $conn = mysqli_connect($host, $username, $password, $database, $port);\n    if (!$conn) {\n        die('not connected : ' . mysql_error());\n        $node = $dom->createElement(\"errorNode\", \"unsuccessful connection\");\n        $parnode->appendChild($node);\n    }\n        \n    //Set the active MySQL database\n    $db_selected = mysqli_select_db($conn, $database);      \n      if(!$db_selected)\n        die('Can\\'t use db: ' . mysql_error);\n        \n    // Search the rows in the markers table\n    $query = \"SELECT lat, lng, tags FROM markers\";\n    $result = mysqli_query($conn, $query);\n\n    $result = mysqli_query($conn, $query);\n    if (!$result) {\n      die(\"Invalid query: \" . mysql_error());\n      $node = $dom->createElement(\"errorNode\", \"unsucessful query\");\n      $parnode->appendChild($node);\n    }\n        \n        //Iterate through the rows, adding XML nodes for each \n    while($row = $result->fetch_assoc()){\n        $node = $dom->createElement(\"marker\");\n        $newnode = $parnode->appendChild($node);\n        $newnode->setAttribute(\"lat\", $row['lat']);\n        $newnode->setAttribute(\"lng\", $row['lng']);\n        $newnode->setAttribute(\"tags\", $row['tags']);\n    }\n    //clearstatcache();\n    $dom->save(\"./markers.xml\");\n?>\n","undoManager":{"mark":-2,"position":9,"stack":[[{"start":{"row":3,"column":5},"end":{"row":3,"column":6},"action":"remove","lines":["/"],"id":6}],[{"start":{"row":3,"column":4},"end":{"row":3,"column":5},"action":"remove","lines":["/"],"id":7}],[{"start":{"row":3,"column":4},"end":{"row":3,"column":5},"action":"insert","lines":["/"],"id":8}],[{"start":{"row":3,"column":5},"end":{"row":3,"column":6},"action":"insert","lines":["/"],"id":9}],[{"start":{"row":6,"column":4},"end":{"row":6,"column":5},"action":"insert","lines":["/"],"id":10}],[{"start":{"row":6,"column":5},"end":{"row":6,"column":6},"action":"insert","lines":["/"],"id":11}],[{"start":{"row":42,"column":4},"end":{"row":42,"column":5},"action":"insert","lines":["/"],"id":12}],[{"start":{"row":42,"column":4},"end":{"row":42,"column":5},"action":"remove","lines":["/"],"id":13}],[{"start":{"row":43,"column":4},"end":{"row":43,"column":5},"action":"insert","lines":["/"],"id":14}],[{"start":{"row":43,"column":5},"end":{"row":43,"column":6},"action":"insert","lines":["/"],"id":15}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":1,"column":60},"end":{"row":1,"column":60},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":105,"mode":"ace/mode/php"}},"timestamp":1496929007858}