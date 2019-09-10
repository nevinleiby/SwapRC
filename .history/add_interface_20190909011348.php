<html>
    <title>
        SwapRC:Add
    </title>
    <body>
            Add
            <br>
            PHP STARTS
            <?php
                require_once 'login_cobalt.php';
                $connection = new mysqli($hn, $un, $pw, $db);
                if ($connection->connect_error) die ("Fatal Error");

                // Select the table
                $table_name = 'Receiver';

                $query = "SELECT * FROM $table_name";
                $result = $connection->query($query);
                
                if (! $result) die ("Fatal Error");
                $rows = $result->num_rows;
                            
                // Step through each result:                  
                for ($j = 0; $j < $rows ; ++$j)
                {
                   $result->data_seek($j);
                    //echo .htmlspecialchars ($result->fetch_assoc()['test']) . '<br>';
                    echo "((" . $result->fetch_assoc()['frequency'] . '))<br>';
                }

                printf($rows);
                
                
                $result->close();
                $connection->close();
            ?>
            PHP ENDS HERE

            <br>
            <table border=4 width=100% height=95%>
                <tr border=4 height=95%>
                    <td width = 80% border=2 bgcolor="#ccffff" valign=top height=95%>
                        [
                        <b><a href="./add_interface.html">Add</a></b> |
                        <a href="./search_interface.html">Search</a>
                        ]
                        
                        <form>
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