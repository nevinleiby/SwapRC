<?php
    require_once 'login_bluehost.php';
    require_once 'quad_spec_processing.php';
    require_once 'quad_sql_commands.php';

    $connection = new mysqli($hn, $un, $pw, $db);
    echo '<br>|'. $hn .'|'. $un .'|'. '|'. $db.']<br>';
    echo '['.$connection->connect_error . ']';
    //if ($connection->connect_error) die ("Fatal Error");


    // Define categories as an array
    //$categories =    array (
    //        'frame',
    //        'fc',
    //        'bnf',
    //        'esc',
    //        'motor',
    //        'prop',
    //    'fpv_camera',
    //    'transmitter',
    //    'antenna',
    //    'vtx',
    //    'receiver',
    //    'battery',
    //    'pdb',
    //    'hardware',
    //    'print',
    //    'goggle',
    //    'video_monitor',
    //    'video_receiver',
    //    'swag'
    //);


    // Define categories as a named array/hash:
    $categories =    [
        'antenna' => 'antenna',
        'battery' => 'battery',
        'bnf' => 'bnf',
        'esc' => 'esc',
        'fc' => 'fc',
        'fpv_camera' => 'fpv_camera',
        'frame' => 'frame',
        'generic' => 'generic',
        'goggle' => 'goggle',               
        'hardware' => 'hardware',
        'motor' => 'motor',
        'pdb' => 'pdb',
        'print' => 'print',
        'prop' => 'prop',        
        'receiver' => 'receiver',  
        'swag' => 'swag',      
        'transmitter' => 'transmitter',
        'video_monitor' => 'video_monitor',
        'video_receiver' => 'video_receiver',
        'vtx' => 'vtx'        
    ];
    

    //echo '==================' . isset($_POST['category']) . '=================<br>';
    if (isset($_POST['category']))
    {
        $q_category = $_POST['category']; 
        $q_category = strip_tags($q_category);
       
        $table_name = '';
        // Compare available categories and make sure that user selected an actual category:
        foreach ($categories as $item)
        {
            if ($item == $q_category)
            {
                $table_name = $item;    
                //echo "Requested ($q_category) vs actual ($item)<br>";                
                break;
            }           
        }

        // Default if there is not a valid table used:
        if ($table_name == '')
        {
            $table_name = 'frame';
        }
    }
    else
    {
        $table_name = 'frame';
    }
    $category = ucfirst ($table_name);
    
    //echo '--------------9' . $table_name . '9---------------<br>';
    
    // Final check to make sure that table is defined:
    if (! $table_name)
    {   
        $table_name = 'frame';
    }

    $query = "SELECT * FROM $table_name;";
    $result = $connection->query($query);
    
    echo "Right before select ($query)<br>";
    if (! $result) die ("Fatal Error");
    echo "made it!";

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
            // INPUT VALUES:
            //echo "Item $item: " . htmlspecialchars($row[$item]) . "<br>\n";
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

        // Pretty form of INPUT box
        $search_input_text .= "\n" . '<input onClick="this.select();" type=text name="' . $row['Field'] . '" placeholder="' . $row['Field'] . '">&nbsp; ' .  $row['Field'] . '<br>';

        // INPUT box but with default values:
        //$search_input_text .= "\n" . '<input onClick="this.select();" type=text name="' . $row['Field'] . '" value="' . $row['Field'] . '1">' . $row['Field'] . '<br>';

        // TESTING <INPUT>:
        //$search_input_text .= "\n" . '<input onClick="this.select();" type=text name="' . $row['Field'] . '" value="' . '1">' . $row['Field'] . '<br>';
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
    //$select_options_text = select_item(strtolower($category), $categories);
    $select_options_text = select_item($table_name, $categories);

    // Associative array to add to the table:
    $row_add_array;

    // Process the input:
    while (1)
    {
        // Doesn't permit name=value pairs...you need a KEY=VALUE
        //foreach ($_POST as $item)
        
        // Get the name=value pairs:
        // https://stackoverflow.com/questions/5479999/foreach-value-from-post-from-form

        foreach ($_POST as $key => $value)
        {
            //echo 'name=('. $key . ')|  value=|' . $_POST[$key] . '|| [' . $value . ']<br>';
            //echo 'name=('. $key . ')|  value=|' . $_POST[$key] . '||<br>';

            $row_add_array[$key] = $value;
        }
        break;
    }

    // Now lets add the data to the database:

    // See the array of data:
    //print_r($row_add_array);
    $row_add_string = q_add_item_to_table($table_name, $categories, $row_add_array);
    echo "\n<br><br>ADD=[[" . $row_add_string . "]]<br>\n";

    if ($row_add_string)
    {
        //echo 'ADD_ITEM_TO_TABLE  ID=[' . $row_add_array['id'] . ']<br>';
        $add_result = $connection->query($row_add_string);
        echo "SQL ADD RESULT($add_result)<br>";
    }
        

    ////////////////////////////////////////////////////////////////////
    // Try to display a listing of items if we can:
    ////////////////////////////////////////////////////////////////////
    $id_query = "SELECT id,type1,url_distributor1,url_picture_new from $table_name;";
    echo '<br><font color=blue>ID query=|' . $id_query . '</font>|<br>';
    $display_result = $connection->query($id_query);
  
    //if ($display_result) die ("Fatal Error");
    if ($display_result)
    {   
        $rows = $display_result->num_rows;
        echo '<table>';
        for ($j = 0; $j < $rows; ++$j)
        {
            if ($j == 1)
            {
                echo '<tr><td bgcolor=red>';
            }
            //$row = $display_result->fetch_array(MYSQL_ASSOC);
            //$row = $display_result->fetch_array(MYSQL_ARRAY);
            //$row = $display_result->fetch_array(MYSQLI_NUM);
            $row = $display_result->fetch_array(MYSQLI_ASSOC);

            // Display a link for the particular item. 
            //   Item should be a link within the Category DB, which will then be able to unit with Entry DB.
            //   If the Entry DB is referenced without referencing the Category DB, then it could be harder to link

            // This may be causing an issue....try to be case-sensitive:
            //echo '<a href="./display_item_old.php?' . $category . '=' . $row['id'] . '&category=' . $category .'">1-' . $row['id'] . '</a>[' . $category . ']<br>';

            //echo "# $j -" . '<a href="./display_item_old.php?' . $table_name . '=' . $row['id'] . '&category=' . $table_name .'">ITEM=(' . $row['type1'] . ')</a>';
            //echo '[<a href="' . $row['url_distributor1'] . '">link</a>]' . '<img align=middle width=100 height=100 src="' . $row['url_picture_new'] . '">';
            //echo '<br>';

            echo '<a href="./display_item_old.php?' . $table_name . '=' . $row['id'] . '&category=' . $table_name .'">Item=(' . $row['type1'] . ')</a>';
            echo '[<a href="' . $row['url_distributor1'] . '">Distributor1</a>]';
            echo '<a href="./display_item_old.php?' . $table_name . '=' . $row['id'] . '&category=' . $table_name .'">';
            echo '<img align=middle width=100 height=100 src="' . $row['url_picture_new'] . '"></a>';
            if ($j % 2)
            {
                echo '</td></tr>';
            }
            echo '</table>';
        }
    }
    else
    {
        echo "No items in database for ($category)<br>";
    }
    ////////////////////////////////////////////////////////////////////
    // END attempt at displaying a listing of items
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////

    $result->close();
    $connection->close();

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////
    // Function definitions
    ///////////////////////////////////

    /////////////////////////
    // GET_POST
    /////////////////////////
    function get_post ($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }

    /////////////////////////
    // SELECT_ITEM
    /////////////////////////
    // Create the <INPUT> tags and select the choosen category:
    function select_item ($category, &$categories)
    {
            
            //echo "category=($category), categories=(" . $categories['vtx'] . ')<br>';
            //echo "entering with default of ($category)";

            // Define the return text string:
            $return_text = '';

            // Step through each category:
            foreach ($categories as $curr_category)
            {
                
                // Select the current category:
                $curr_category = $categories[$curr_category];
                //echo '<br>[[[[[[<b>' . $curr_category . '</b>| vs |' . $category . ']]]]]]]]]]';

                // Basic <OPTION> statement, to be appended to the selected item if necessary:
                $return_text .= '<option value = "' . $curr_category . '"';

                // compare the desired category ($category) with the current category:
                if ($curr_category == $category)
                {
                    // This the is desired category....select it now:
                    $return_text .= ' SELECTED ';
                    //echo '<br>SELECTED ' . $curr_category . "<br>";                    
                }
                
                $return_text .= '>' . $curr_category . '</option>' ."\n";
            }

            // Return <OPTION> array, including the one that is SELECTED:
            return $return_text;
    }

    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            
echo <<<_END
<html>
    <title>
        SwapRC:Add
    </title>
    <body>
            <h1>Add : $category</h1>
            <h2>857</h2>
            <form action="./add_interface_old.php" method="post">
            
            <br>
            <table border=4 width=100% height=95%>
                <tr border=4 height=95%>
                    <td width = 80% border=2 bgcolor="#ccffff" valign=top height=95%>
                        [
                        <b><a href="./add_interface_old.php">Add</a></b> |
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