<?php
    require_once 'login_cobalt.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die ("Fatal Error");


    

    echo ']]' . $_POST . '[[<br>';
    foreach ($_POST as $stuff)
    {
        echo '||' . $stuff . '|| <br>';
    }

    // Select the table
    if (isset($_POST['fc']))
    {
        $table_name = 'FC';
    }
    elseif (isset($_POST['goggle']))
    {
        $table_name = 'Goggle';
    }
    elseif (isset($_POST['transmitter']))
    {
        $table_name = 'Transmitter';
    }
    elseif (isset($_POST['generic']))
    {
        $table_name = 'Generic';
    }
    elseif (isset($_POST['receiver']))
    {
        $table_name = 'Receiver';
    }
    elseif (isset($_POST['vtx']))
    {
        $table_name = 'VTX';
    }
    else
    {
        $table_name = 'Receiver';
    }
    
    echo '--------------9' . $table_name . '9---------------<br>';
    

    $query = "SELECT * FROM $table_name";
    $result = $connection->query($query);
    
    if (! $result) die ("Fatal Error");
    $number_of_rows = $result->num_rows;
    //echo "((($row)))<br>";


    echo "<br><br>STARTING DATA EXTRACTION [<br>";
    // Step through each result:                  
    //for ($j = 0; $j < $rows ; ++$j)
    //{
    //   $result->data_seek($j);
    //    //echo .htmlspecialchars ($result->fetch_assoc()['test']) . '<br>';
    //    echo "((" . htmlspecialchars($result->fetch_assoc()['frequency']) . '))<br>';
    //    $result->data_seek($j);
    //    echo "((" . htmlspecialchars($result->fetch_assoc()['number_of_channels']) . '))<br>';
    //}


    // Step through each result:                  
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

    echo "]ENDED EXTRACTION<br>";                
    
    
    $result->close();
    $connection->close();

    function get_post ($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }



            
echo <<<_END
<html>
    <title>
        SwapRC:Add
    </title>
    <body>
            Add
            <form action="add_interface.php" method="post">
            

          


            <br>
            PHP STARTS
            


            
            PHP ENDS HERE

            <br>
            <table border=4 width=100% height=95%>
                <tr border=4 height=95%>
                    <td width = 80% border=2 bgcolor="#ccffff" valign=top height=95%>
                        [
                        <b><a href="./add_interface.html">Add</a></b> |
                        <a href="./search_interface.html">Search</a>
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
                                            <option value = "goggles">FPV Goggles</option>
                                            <option value = "video_monitors">FPV Video Monitors</option>
                                            <option value = "video_receivers">FPV Video Receivers</option>
                                            <option value = "swag">Swag</option>
                                    </select>
                                    <input type=text name="Name" value = "URL or Search" >
                                    <input type=submit name="submit">
                                   
                                    
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