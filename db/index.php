<?php
   $db = new SQLite3('leawtaeapp.db');
   
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully<br>";
      $ret = $db->query("SELECT * FROM users");
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
         echo json_encode($row);
      }
   }

   $db->close();
?>
