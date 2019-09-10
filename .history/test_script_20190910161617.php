<?php
    //require_once 'login_cobalt.php';
    require_once 'login_bluehost.php';
    require_once 'quad_spec_processing.php';
    require_once 'quad_sql_commands.php';
    

    $connection = new mysqli($hn, $un, $pw, $db);
    //if ($connection->connect_error) die ("Fatal Error");
    echo '<br>|'. $hn .'|'. $un .'|'.'|'. $db.']<br>';
    echo '['.$connection->connect_error . ']';
            
echo <<<_END
<html>
    <title>
        SwapRC:Add
    </title>
    <body>
            <h1>Add : $category</h1>
            <form action="./add_interface.php" method="post">
            
            334p
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
                                        $select_options_text
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