<?php 

include '../../includes/db.php';

   if (isset($_GET['d_id'])){


        $id = $_GET['d_id'];

        $stat=$connection->prepare("select * from admin_files where id= ?");
    
  
    $stat->execute();
    $row=$stat->fetch();

    $file = 'media/'.$data['name'];

      if (file_exists($file)) {
            header('Content-Description:'. $data['file_description']);
            header('Content-Type:' .$data['mime']);
            header('Content-Disposition:' .$data['disposition']. '; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }

   }