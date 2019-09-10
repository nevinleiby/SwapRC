<?php
    require_once 'login_cobalt.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die ("Fatal Error");


    $categories =    [
        'frame' => 'frame',
        'fc' => 'fc',
        'bnf' => 'bnf',
        'esc' => 'esc',
        'motor' => 'motor',
        'propeller' => 'propeller',
        'fpv_camera' => 'fpv_camera',
        'transmitter' => 'transmitter',
        'antenna' => 'antenna',
        'vtx' => 'vtx',
        'receiver' => 'receiver',
        'battery' => 'battery',
        'pdb' => 'pdb',
        'hardware' => 'hardware',
        '3d_print' => '3d_print',
        'goggle' => 'goggle',
        'video_monitor' => 'video_monitor',
        'video_receiver' => 'video_receiver',
        'swag' => 'swag'   ,
    ];
    

    //echo '==================' . isset($_POST['category']) . '=================<br>';
    if (isset($_POST['category']))
    {
        $q_category = $_POST['category']; 
        $q_category = strip_tags($q_category);
       
        switch ($q_category)
        {
            case "frame":
                $table_name = 'frame';
                break;
            case "fc":
                $table_name = 'fc';
                break;
            case "bnf":
                $table_name = 'bnf';
                break;
            case "esc":
                $table_name = 'esc';
                break;
            case "motor":
                $table_name = 'motor';
                break;
            case "propeller":
                $table_name = 'propeller';
                break;
            case "fpv_camera":
                $table_name = 'fpv_camera';
                break;
            case "transmitter":
                $table_name = 'transmitter';
                break;
            case "antenna":
                $table_name = 'antenna';
                break;
            case "vtx":
                $table_name = 'vtx';
                break;
            case "receiver":
                $table_name = 'receiver';
                break;
            case "battery":
                $table_name = 'battery';
                break;
            case "pdb":
                $table_name = 'pdb';
                break;
            case "hardware":
                $table_name = 'hardware';
                break;
            case "3d_print":
                $table_name = '3d_print';
                break;
            case "goggle":
                $table_name = 'goggle';
                break;
            case "3d_print":
                $table_name = '3d_print';
                break;
            case "video_monitor":
                $table_name = 'video_monitor';
                break;  
            case "video_receiver":
                $table_name = 'video_receiver';
                break;
            case "swag":
                $table_name = 'swag';
                break;
            default:
                $table_name = 'frame';
                break;
        }
    }
    else
    {
        $table_name = 'frame';
    }
    $category = ucfirst ($table_name);
    
    //echo '--------------9' . $table_name . '9---------------<br>';
    

    $query = "SELECT * FROM $table_name";
    $result = $connection->query($query);
    
    if (! $result) die ("Fatal Error");
    $number_of_rows = $result->num_rows;
    //echo "((($row)))<br>";


    //echo "<br><br>STARTING DATA EXTRACTION [<br>";
    
    
    // Step through each result:                  
    //for ($j = 0; $j < $rows ; ++$j)
    //{
    //   $result->data_seek($j);
    //    //echo .htmlspecialchars ($result->fetch_assoc()['test']) . '<br>';
    //    echo "((" . htmlspecialchars($result->fetch_assoc()['frequency']) . '))<br>';
    //    $result->data_seek($j);
    //    echo "((" . htmlspecialchars($result->fetch_assoc()['number_of_channels']) . '))<br>';
    //}


    //// Step through each result:                  
    for ($j = 0; $j < $number_of_rows ; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        
        //echo "((" . htmlspecialchars($row['frequency']) . '))<br>';
        //echo print_f($row);
        for ($item = 0; $item < 10; ++$item)
        {
            echo "Item $item: " . htmlspecialchars($row[$item]) . "<br>\n";
        }
        
    }
    //echo "]ENDED EXTRACTION<br>";                



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////
    // TRY TO GET TABLE COLUMNS
    //    https://www.codexworld.com/how-to/get-column-names-from-table-in-mysql-php/
    //
    // Ultimately worked by following:
    //    https://stackoverflow.com/questions/4165195/mysql-query-to-get-column-names/4165253
    /////////////////////////////


    // Query to get columns from table
    //$result = $connection->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$db' AND TABLE_NAME = '$table_name'");

    // single column name:
    //$next_row = $result->fetch_assoc();
    //echo $next_row;

    //$next_row = $result->fetch_assoc();
    //echo "<br>ROW: |$next_row|<br>";
    //foreach ($next_row as $column_name)

    //only grabs the first column name:
    //foreach ($next_row = $result->fetch_assoc() as $column_name)
    //{
    //    //$result[] = $next_row;
    //    echo "<br>ROW: |$next_row|[$column_name]<br>";
    //    foreach ($next_row as $column_name_item)
    //    {
    //        echo "-----|$column_name_item|----<br>";
    //    }
    //}

    // Only selects the first column name:
    //foreach ($next_row = $result->fetch_assoc() as $column_name)
    //{
    //    $columns[] = $next_row;
    //    echo "<br>=|$next_row|=<br>";
    //    echo "<br>=|" . $columns[0] . "|=<br>";
    //    print_r ($columns);

    //    // Still grabs only first column name:
    //    //foreach ($columns as $column_name)        
    //    //{
    //    //    echo "-=|$column_name|=-<br>";
    //    //}

    //   for ($column_number = 0; $column_number <= 2; $column_number++)
    //    {
    //        echo "====*" . $columns[$column_number] . "*======<br>";
    //    }
    //}


    ///////////// WORKS!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /// https://stackoverflow.com/questions/4165195/mysql-query-to-get-column-names/4165253
    //$sql = "SHOW COLUMNS FROM $table_name";
    //$result = mysqli_query($connection,$sql);
    //while($row = mysqli_fetch_array($result)){
    //    echo $row['Field']."<br>";
    //}


    // Grab each column name:
    //     (likely could be optomized by INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA methology)
    //
    // WORKS!!!!!
    /// https://stackoverflow.com/questions/4165195/mysql-query-to-get-column-names/4165253

    $query = "SHOW COLUMNS FROM $table_name";
    $result = $connection->query($query);

    $search_input_text = '';
    while($row = mysqli_fetch_array($result))
    {
        //echo $row['Field']."<br>";
        //echo '<input onClick="this.select();" type=text name="' . $row['Field'] . '" placeholder="' . $row['Field'] . '"><br>';
        $search_input_text .= '<input onClick="this.select();" type=text name="' . $row['Field'] . '" placeholder="' . $row['Field'] . '"><br>';
    }
    
   
    // Read all of the column names:
    //foreach ($next_row = $result->fetch_assoc())
    //{
    //    echo $next_row;
    //}
    

    //while ($next_row = $result->fetch_assoc())
    //{
    //    $result[] = $next_row;
    //    echo $next_row;
    //}

    // Array of all column names
    //$columnArr = array_column($result, 'COLUMN_NAME');

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // Now generate the available options:
    $select_options_text = select_item($category, $categories);



    
    
    
    $result->close();
    $connection->close();

    ///////////////////////////////////
    // Function definitions
    ///////////////////////////////////
    function get_post ($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }


    function select_item ($category, &$categories)
    {
            
            echo "category=($category), categories=(" . &$categories . ')';
            
            $return_text = '';
            //foreach ($categories as &$curr_category)
            //for ($i = 0; $i <= $categories; $i++)
            for ($i = 0; $i <= 2; $i++)
            {
                $curr_category = $categories[$i];
                echo '[[[[' . $categories[2] . ']]]';

                $return_text .= '<option value = "' . $curr_category . '"';

                if ($curr_category == $category)
                {
                    $return_text .= ' SELECTED ';
                    
                }
                
                $return_text .= '>' . $curr_category . '</option>' ."\n";
            }

            return $return_text;
    }



    function add_item ($category)
    {
        switch ($category)
        {
            case "frame":
                
                break;
            case "fc":
                
                break;
            case "bnf":
                
                break;
            case "esc":
                break;
            case "motor":
                
                break;
            case "propeller":
                
                break;
            case "fpv_camera":
                
                break;
            case "transmitter":
               
                break;
            case "antenna":
               
                break;
            case "vtx":
                
                break;
            case "receiver":
                
                break;
            case "battery":
                
                break;
            case "pdb":
               
                break;
            case "hardware":
                
                break;
            case "3d_print":
                
                break;
            case "goggle":
                
                break;
            case "3d_print":
                
                break;
            case "video_monitor":
                
                break;  
            case "video_receiver":
                
                break;
            case "swag":
                
                break;
            default:
                
                break;
        }
    }



            
echo <<<_END
<html>
    <title>
        SwapRC:Add
    </title>
    <body>
            <h1>Add : $category</h1>
            <form action="add_interface.php" method="post">
                       
            <br>
            <table border=4 width=100% height=95%>
                <tr border=4 height=95%>
                    <td width = 80% border=2 bgcolor="#ccffff" valign=top height=95%>
                        [
                        <b><a href="./add_interface.php">Add</a></b> |
                        <a href="./search_interface.php">Search</a>
                        ]
                        
                        
                        <br>
                        <table width=100% height=95% bgcolor=blue>
                            <tr height=95% style="height:95%">
                                <td valign=top bgcolor="#ffaaff" style="height:95%">
                                    Search:
                                    <select name="category">
                                            <option value = "frame">Frame</option>    
                                            <option value = "fc">Flight Controller</option>
                                            <option value = "esc">ESC</option>
                                            <option value = "motor">Motors</option>
                                            <option value = "propeller">Propeller</option>
                                            <option value = "fpv_camera">FPV Camera</option>
                                            <option value = "transmitter">Transmitter</option>
                                            <option value = "antenna">Antenna</option>
                                            <option value = "vtx">VTX</option>
                                            <option value = "receiver">Receiver</option>
                                            <option value = "battery">Battery</option>
                                            <option value = "pdb">PDB</option>
                                            <option value = "hardware">Hardware</option>
                                            <option value = "3d_print">3D Prints</option>
                                            <option value = "goggle">FPV Goggles</option>
                                            <option value = "bnf">BNF frames</option>
                                            <option value = "video_monitor">FPV Video Monitors</option>
                                            <option value = "video_receiver">FPV Video Receivers</option>
                                            <option value = "swag">Swag</option>
                                    </select>
                                    <input onClick="this.select(); type=text name="Name" placeholder="Search or Paste URL">
                                    <input type=submit name="submit">
                                   
                                    <br><br>
                                    <table>
                                        <tr>
                                            <td valign=top>
                                                <h2>$category</h2>
                                            </td>
                                            <td valign=top>
                                                $search_input_text



                                                <select name="category2">
                                                    $select_options_text
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </td>
                                

                                

                            </tr>
                        </table>
                        </form>
                        
                    </td>
                    <td border=2 bgcolor="ffccccc" valign=top height=95%>
                        <frameset>
                            <iframe src="./frame_users.html">
                        </frameset>
                    </td>
                </tr>
            </table>
    </body>

</html>
_END;
?>