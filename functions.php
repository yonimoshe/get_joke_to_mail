<?php
      // Rediret function get a url and redirect
      function redirect($new_url) {
          header("Location: " . $new_url);
          exit;
      }
 ?>
