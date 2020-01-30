<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db04";
    $pdo = new PDO($dsn,"root","");
    session_start();


    function find($table,...$arg){
        global $pdo;
        $sql = "select * from $table where ";

        if(is_array($arg[0])){
            foreach($arg[0] as $key=>$value){
                $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
                $sql = $sql . implode(" && " ,$tmp);
        }else{
            $sql = $sql ."`id`='".$arg[0]."'";
        }
            return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
        // print_r(find("bottom",1));


        function all($table,...$arg){
            global $pdo;
                $sql = "select * from $table ";
                if(!empty($arg[0])){
                    foreach($arg[0] as $key=>$value){
                        $tmp[] = sprintf("`%s`='%s'",$key,$value);
                    }
                        $sql = $sql ."where". implode(" && " ,$tmp);
                 }

                 if(!empty($arg[1])){
                        $sql = $sql .$arg[1];
                 }
                 echo $sql;
                 return $pdo->query($sql)->fetchAll();
            }
            //  print_r(all("bottom",["bottom"=>2021]));


             
        function del($table,...$arg){
            global $pdo;
            $sql = "delete  from $table where ";
    
            if(is_array($arg[0])){
                foreach($arg[0] as $key=>$value){
                    $tmp[] = sprintf("`%s`='%s'",$key,$value);
                }
                    $sql = $sql . implode(" && " ,$tmp);
            }else{
                $sql = $sql ."`id`='".$arg[0]."'";
            }
                return $pdo->exec($sql);
        }
        // print_r(del("bottom",1));


        function nums($table,...$arg){
            global $pdo;
                $sql = "select count(*) from $table ";
                if(!empty($arg[0])){
                    foreach($arg[0] as $key=>$value){
                        $tmp[] = sprintf("`%s`='%s'",$key,$value);
                    }
                        $sql = $sql ."where". implode(" && " ,$tmp);
                 }

                 if(!empty($arg[1])){
                        $sql = $sql .$arg[1];
                 }
                 echo $sql;
                 return $pdo->query($sql)->fetchColumn();
            }
                //   print_r(nums("bottom",["bottom"=>2020]));

          
                function q($sql){
                    global $pdo;
                
                    return $pdo->query($sql)->fetchAll();
                
                  }

           
                  function to($path){

                    header("location:".$path);
                
                  }


                function save($table,$data){
                    global $pdo;
                    if(!empty($data['id'])){
                        //up
                        foreach($data as $key=>$value){
                            if($key!="id"){
                            $tmp[] = sprintf("`%s`='%s'",$key,$value);
                        }
                    }
                        $sql = "update $table set ". implode(",",$tmp) ."where `id`='".$data['id']."' ";
                    }else{
                        //in
                        $key = array_keys($data);
                        $key_str = "`". implode("`,`",$key)."`";
                        $data_str = "'". implode("','",$data)."'";
                        $sql = "insert into $table($key_str) values($data_str)";

                    }
                    // echo  $sql ;
                    return $pdo->exec($sql);
                }
                // save("bottom",["bottom"=>521]);
?>  