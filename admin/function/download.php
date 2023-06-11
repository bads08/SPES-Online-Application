
<?php
  $get_link = $_GET["link"];
  // Initialize a file URL to the variable
  echo $get_link;
  $url = $get_link;
    
  // Use basename() function to return the base name of file
  $file_name = basename($url);
    
  // Use file_get_contents() function to get the file
  // from url and use file_put_contents() function to
  // save the file by using base name
  if (file_put_contents($file_name, file_get_contents($url)))
  {
      echo "File downloaded successfully";
  }
  else
  {
      echo "File downloading failed.";
  }
?>