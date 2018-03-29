<?php
    $action='';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action= 'create';
    }


    function copy_dir($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    copy_dir($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>
            Exam Progaram
        </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />


    </head>

    <body>

    <?php 
        if($action == 'create'){
     ?>
        <div class="container text-center">
            <div class="create-box">
                <h2>Exam Program Generator</h2>

            <form class="form-horizontal" method="POST" action="?action=input_data">
                    <!-- Start count -->
                        <div class="form-group">			
                           <label class="col-sm-4 col-sm-push-8 control-label text-center">عدد المواد</label>
                            <div class="col-sm-8 col-sm-pull-4  ">            
                                <input type="number"
                                 name="count" 
                                 class="form-control" 
                                 min="1" max="10"
                                 required="required">
                           </div>   
                        </div>  		
                    <!-- End count -->


                <!-- Start Submit -->
                    <div class="form-group">
                        <div class="col-sm-12">
                        <input type="submit" value="موافق"  class="btn btn-warning btn-block">
                        </div>
                    </div>
                <!-- End Submit -->
                </form>

                <div class="alert alert-danger">
                    العدد الأقصى للمواد <span>10</span>
                </div>
            </div>
        </div>
    <?php
        } // end elseif($action == 'create')
        elseif($action == 'input_data'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $count = $_POST['count'];
                // echo $count;

                echo "<div class='container text-center'>"; 
                echo "<div class='create-box-plus'>";
                echo  '<h2 class="alert alert-warning">ادخل المواد من فضلك..</h2>';
                echo "<form class='form-horizontal' method='POST' action='?action=generate' enctype='multipart/form-data'>";
                echo '<input type="hidden"  name="count" value="'.$count.'" />';
               for($i=1;$i<=$count;$i++){  
                
            ?>
            <!-- Start day -->
                <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">اليوم</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                           <select name="day<?php echo $i; ?>" class="form-control">
                                <option value="0">...</option>
                                <option value="السبت">السبت</option>
                                <option value="الأحد">الأحد</option>
                                <option value="الاثنين">الاثنين</option>
                                <option value="الثلاثاء">الثلاثاء</option>
                                <option value="الأربعاء">الأربعاء</option>
                                <option value="الخميس">الخميس</option>
                            </select>
                    </div>   
                </div>  		
            <!-- End day -->

            <!-- Start date -->
                <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">التاريخ</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                         <input type="date"
                                class="form-control" 
                                name="date<?php echo $i; ?>" />
                    </div>   
                </div>  		
            <!-- End date -->

            <!-- Start name -->
            <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">اسم المادة</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                         <input type="text"
                                class="form-control" 
                                name="name<?php echo $i; ?>" />
                    </div>   
                </div>  		
            <!-- End name --> 

            <!-- Start time -->
            <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">التوقيت</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                         <input type="text"
                                class="form-control" 
                                name="time<?php echo $i; ?>" />
                    </div>   
                </div>  		
            <!-- End time --> 

            <!-- Start mark -->
            <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">درجة العملي</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                         <input type="number"
                                class="form-control" 
                                name="mark<?php echo $i; ?>" />
                    </div>   
                </div>  		
            <!-- End mark --> 

            <hr>
 
            <?php  } // end for ?>
            <!-- Start image -->
            <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">الصورة</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                    <input type="file" name="img" class="form-control">
                    </div>   
                </div>  		
            <!-- End image --> 

            <!-- Start header -->
            <div class="form-group">			
                    <label class="col-sm-4 col-sm-push-8 control-label text-center">الترويسة</label>
                    <div class="col-sm-8 col-sm-pull-4  ">            
                         <input type="text"
                                class="form-control" 
                                name="header" />
                    </div>   
                </div>  		
            <!-- End header --> 

                <!-- Start Submit -->
                    <div class="form-group">
                        <div class="col-sm-12">
                        <input type="submit" value="موافق"  class="btn btn-warning btn-block">
                        </div>
                    </div>
                <!-- End Submit -->
                </form>
                
            </div>
        </div>
 


    <?php
            } // end if($_SERVER['REQUEST_METHOD'] == 'POST')
        } // end elseif($action == 'input_data') generate
        elseif($action == 'generate'){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $count = $_POST['count'];
                $header = $_POST['header'];
                // echo $count;

                // upload file
                $imageName = $_FILES['img']['name'];
                $imageTmp = $_FILES['img']['tmp_name'];

                move_uploaded_file($imageTmp,"img\\".$imageName);

                $info = array();


                for($i=1;$i<=$count;$i++){
                    $day  = $_POST['day'.$i];
                    $date = $_POST['date'.$i];
                    $name = $_POST['name'.$i];
                    $time = $_POST['time'.$i];
                    $mark = $_POST['mark'.$i];

                //echo $day.'  '.$date.'  '.$name.'  '.$time.'  '.$mark.'<br>';

                    array_push($info,array('day'=>$day,'date'=>$date, 'name'=>$name, 'time'=>$time, 'mark'=>$mark));
                } // end for loop

                // Send Data To index.php?action=download
                session_start();
                $_SESSION['value']  = $info;
                $_SESSION['img']    = $imageName;
                $_SESSION['header'] = $header;
                ?>

        <div class="container">
            <div class="table-resposive text-center">
                <div class="head">
                       <?php echo $header; ?>
                </div>
                    <table class="main-table table table-bordered text-center">
                        <tr>
                            <td>اليوم</td>
                            <td>التاريخ</td>
                            <td>اسم المادة</td>
                            <td>التوقيت</td>
                            <td>عملي</td>
                            <td>نظري</td>
                            <td>المجموع كاملاً</td>
                        </tr>
                    <?php
                         foreach($info as $row){
                            echo '<tr>';
                            echo '<td>'.$row['day'].'</td>';
                            echo '<td>'.$row['date'].'</td>';
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td>'.$row['time'].'</td>';
                            echo '<td>';
                                echo $row['mark'].' |';
                            echo '</td>';
                            echo '<td>'.' '.'</td>';
                            echo '<td>'.' '.'</td>';
                            echo '</tr>';
                         }
                    ?>

                    </table>
                    <div class="img" style="background-image: url('img/<?php echo $imageName;?>');">
                    
                    </div>
 
            </div>
            
            <a href="?action=download" class="btn btn-danger">اضغط هنا للحصول على الكود</a>
            <a href="index.php" class="btn btn-primary">العودة الى الصفحة الرئيسية</a>
        </div>
        <?php    } // end if($_SERVER['REQUEST_METHOD'] == 'POST')
        } // end  elseif($action == 'generate')

        elseif($action == 'download'){
            session_start();                    
            if(isset($_SESSION['value'])&&isset($_SESSION['img'])&&isset($_SESSION['header'])){
        
                $image = $_SESSION['img'];
                $header = $_SESSION['header'];

                // delete all images in programExam
                $dir = 'ProgramExam/img/';
                foreach(glob($dir.'*.*') as $v){
                    unlink($v);
                }   

                // copy img folder 
                copy_dir("C:/wamp/www/program-exam/img","C:/wamp/www/program-exam/ProgramExam/img");
                
                // generate code html
                $myfile = fopen("ProgramExam/index.html", "w") or die("Unable to open file!");
                $content = "<!DOCTYPE html>
                         <html>
                         <head>
                         <meta charset='utf-8 '/>
                         <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                         <title> Exam Progaram </title>
                         <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css' />
                         <link rel='stylesheet' type='text/css' href='css/style.css' />
                         </head>
                         <body>
                         <div class='container'>
                         <div class='table-resposive text-center'>
                         <div class='head'>".$header."</div>
                         <table class='main-table table table-bordered text-center'>
                            <tr>
                            <td>اليوم</td>
                            <td>التاريخ</td>
                            <td>اسم المادة</td>
                            <td>التوقيت</td>
                            <td>عملي</td>
                            <td>نظري</td>
                            <td>المجموع كاملاً</td>
                            </tr>";

                    fwrite($myfile, $content);
                    // All info
                    foreach ($_SESSION['value'] as $arr) {
                        echo $arr['day'] . "<br />";
                        unset($_SESSION['value']);

                        $row = "<tr>
                                <td>".$arr['day']."</td>
                                <td>".$arr['date']."</td>
                                <td>".$arr['name']."</td>
                                <td>".$arr['time']."</td>
                                <td>".$arr['mark']." |</td>
                                <td>"." "."</td>
                                <td>"." "."</td>
                                </tr>";

                        fwrite($myfile, $row);
                    }



                    $last = '</table>
                    <div class="img"'."style='background-image:".'url("'.'img/'.$image.'");'."'>
                    
                    </div></div></body></html>";
                    fwrite($myfile, $last);

                fclose($myfile);                

                // compress the folder project
                    // Get real path for our folder
                    $rootPath = realpath('C:/wamp/www/program-exam/ProgramExam');

                    // Initialize archive object
                    $zip = new ZipArchive();
                    $zip->open('ProgramExam.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

                    // Create recursive directory iterator
                    /** @var SplFileInfo[] $files */
                    $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($rootPath),
                    RecursiveIteratorIterator::LEAVES_ONLY
                    );

                    foreach ($files as $name => $file)
                    {
                    // Skip directories (they would be added automatically)
                    if (!$file->isDir())
                    {
                    // Get real and relative path for current file
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);

                    // Add current file to archive
                    $zip->addFile($filePath, $relativePath);
                    }
                    }

                    // Zip archive will be created only after closing object
                    $zip->close();
                
                // delete all images 
                    $dir = 'img/';
                    foreach(glob($dir.'*.*') as $v){
                        unlink($v);
                    }            

                // create download link 
                   header('Location: download.php');

                
                unset($_SESSION['img']);
                unset($_SESSION['header']);
}
        } // end ($action == 'download')



    ?>
    </body>
</html>