<?php
    require_once 'login_cobalt.php';
    require_once 'quad_spec_processing.php';

    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die ("Fatal Error");

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
        $search_input_text .= "\n" . '<input onClick="this.select();" type=text name="' . $row['Field'] . '" placeholder="' . $row['Field'] . '"><br>';

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
    $select_options_text = select_item(strtolower($category), $categories);

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
        echo 'ADD_ITEM_TO_TABLE  ID=[' . $row_add_array['id'] . ']<br>';
        $add_result = $connection->query($row_add_string);
        echo "SQL ADD RESULT($add_result)<br>";
    }
    

    
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

    /////////////////////////
    // Q_ADD_ITEM_TO_TABLE:
    //
    // Prepares the input to allow it to write to a table, defaulting when appropriate
    //
    // Input: name of table to write to, %categories, %defined parameters
    // Returns: SQL STRING
    /////////////////////////
    function q_add_item_to_table ($table_name, &$categories, &$parameters)
    {
        $SQL_STRING = '';
        
        // consider Exit immediately if nothing defined:


        //$column_array;
        
        foreach ($parameters as $key => $value)
        {
            $value_original = $value;
            $value_checked = check_parameter($key, $value);
                                   
            echo "[$key] => [$value_original]|$value_checked|" . '<br>';                        

            // Assign the data to it's own array now that the data is pure:
            $column_array[$key] = $value_checked;

            // I could do a loop of categories and each table....but that seems a little too much.
            //   Lets just hardcode the INSERT commands to ensure that write is done properly.
        }


        // Okay...what table are we adding to?    
        switch ($table_name)
        {
            case 'antenna':
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, antenna_length, polarization, bandwidth, swr, gain, antenna_connector";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['antenna_length']. '", ';
                        $SQL_STRING .= '"' . $column_array['polarization']. '", ';
                        $SQL_STRING .= '"' . $column_array['bandwidth']. '", ';
                        $SQL_STRING .= '"' . $column_array['swr']. '", ';
                        $SQL_STRING .= $column_array['gain']. ', ';
                        $SQL_STRING .= $column_array['antenna_connector']. ' ';          
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'battery':
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, c_rating, mah, battery_type, length, width, height, connector, material";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['c_rating']. '", ';
                        $SQL_STRING .= '"' . $column_array['mah']. '", ';
                        $SQL_STRING .= '"' . $column_array['battery_type']. '", ';
                        $SQL_STRING .= '"' . $column_array['length']. '", ';
                        $SQL_STRING .= $column_array['width']. ', ';
                        $SQL_STRING .= $column_array['height']. ', ';
                        $SQL_STRING .= $column_array['connector']. ', ';
                        $SQL_STRING .= $column_array['material']. ' ';          
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;    
            case 'bnf':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, frame_size, receiver, transmitter, goggles";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['frame_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['receiver']. '", ';
                        $SQL_STRING .= '"' . $column_array['transmitter']. '", ';
                        $SQL_STRING .= $column_array['goggles']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'esc':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, esc_type, size, stack_size, protocols_supported, operating_voltage, voltage_min, voltage_max, amps_max";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['esc_type']. '", ';
                        $SQL_STRING .= '"' . $column_array['size']. '", ';
                        $SQL_STRING .= '"' . $column_array['stack_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['protocols_supported']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_voltage']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_min']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_max']. '", ';
                        $SQL_STRING .= $column_array['amps_max']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'fc':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, processor, gyro, mounting_holes, osd, voltage_min, voltage_max, firmware, voltage_control, antenna_connector, operating_voltage";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['processor']. '", ';
                        $SQL_STRING .= '"' . $column_array['gyro']. '", ';
                        $SQL_STRING .= '"' . $column_array['mounting_holes']. '", ';
                        $SQL_STRING .= '"' . $column_array['osd']. '", ';
                        $SQL_STRING .= $column_array['voltage_min']. ', ';
                        $SQL_STRING .= $column_array['voltage_max']. ', ';
                        $SQL_STRING .= '"' .$column_array['firmware']. '", ';
                        $SQL_STRING .= '"' .$column_array['voltage_control']. '", ';
                        $SQL_STRING .= '"' .$column_array['antenna_connector']. '", ';
                        $SQL_STRING .= $column_array['operating_voltage']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'fpv_camera':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, fov, image_aspect_ratio, size, lens, operating_voltage, voltage_min, voltage_max";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['fov']. '", ';
                        $SQL_STRING .= '"' . $column_array['image_aspect_ratio']. '", ';
                        $SQL_STRING .= '"' . $column_array['size']. '", ';
                        $SQL_STRING .= '"' . $column_array['lens']. '", ';
                        $SQL_STRING .= $column_array['operating_voltage']. ', ';
                        $SQL_STRING .= $column_array['voltage_min']. ', ';
                        $SQL_STRING .= $column_array['voltage_max']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'frame':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, frame_size, arms, prints, camera_sizes, stacks, stack_size";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['frame_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['arms']. '", ';
                        $SQL_STRING .= '"' . $column_array['prints']. '", ';
                        $SQL_STRING .= '"' . $column_array['camera_sizes']. '", ';
                        $SQL_STRING .= $column_array['stacks']. ', ';
                        $SQL_STRING .= $column_array['stack_size']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'generic':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, type1, type2, manufacturer, model, release_year, cost_msrp, cost_personal, item_age, weight, dimension, shipping_restriction, id_code, country_of_origin, url_manual, url_manufacturer, url_picture_new, url_pictures_installed, url_distributor1, url_distributor2, url_distributor3, url_distributor4, url_distributor5";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['type1']. '", ';
                        $SQL_STRING .= '"' . $column_array['type2']. '", ';
                        $SQL_STRING .= '"' . $column_array['manufacturer']. '", ';
                        $SQL_STRING .= '"' . $column_array['model']. '", ';
                        $SQL_STRING .= '"' . $column_array['release_year']. '", ';
                        $SQL_STRING .= '"' . $column_array['cost_msrp']. '", ';
                        $SQL_STRING .= '"' . $column_array['cost_personal']. '", ';
                        $SQL_STRING .= '"' . $column_array['item_age']. '", ';
                        $SQL_STRING .= '"' . $column_array['weight']. '", ';
                        $SQL_STRING .= '"' . $column_array['dimension']. '", ';
                        $SQL_STRING .= '"' . $column_array['shipping_restriction']. '", ';
                        $SQL_STRING .= '"' . $column_array['id_code']. '", ';
                        $SQL_STRING .= '"' . $column_array['country_of_origin']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_manual']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_manufacturer']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_picture_new']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_pictures_installed']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_distributor1']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_distributor2']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_distributor3']. '", ';
                        $SQL_STRING .= '"' . $column_array['url_distributor4']. '", ';
                        $SQL_STRING .= $column_array['url_distributor5']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'generic':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, resolution, fov, image_aspect_ratio, hdmi_in";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['resolution']. '", ';
                        $SQL_STRING .= '"' . $column_array['fov']. '", ';
                        $SQL_STRING .= '"' . $column_array['image_aspect_ratio']. '", ';
                        $SQL_STRING .= $column_array['hdmi_in']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'hardware':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, hardware_type, size, color, operating_voltage, voltage_min, voltage_max, amps_max";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['hardware_type']. '", ';
                        $SQL_STRING .= '"' . $column_array['size']. '", ';
                        $SQL_STRING .= '"' . $column_array['color']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_voltage']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_min']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_max']. '", ';
                        $SQL_STRING .= $column_array['amps_max']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'motor':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, kv, stator_diameter, stator_height, shaft_size, mounting_screw, operating_voltage, voltage_min, voltage_max";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['kv']. '", ';
                        $SQL_STRING .= '"' . $column_array['stator_diameter']. '", ';
                        $SQL_STRING .= '"' . $column_array['stator_height']. '", ';
                        $SQL_STRING .= '"' . $column_array['shaft_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['mounting_screw']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_voltage']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_min']. '", ';
                        $SQL_STRING .= $column_array['voltage_max']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'pdb':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, stack_size, output_5v, output_10v, led, operating_voltage, voltage_min, voltage_max, amps_max";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['stack_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['output_5v']. '", ';
                        $SQL_STRING .= '"' . $column_array['output_10v']. '", ';
                        $SQL_STRING .= '"' . $column_array['led']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_voltage']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_min']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_max']. '", ';
                        $SQL_STRING .= $column_array['amps_max']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'print':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, filament_type";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= $column_array['filament_type']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'prop':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, prop_length, blades, cw, ccw, material";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['prop_length']. '", ';
                        $SQL_STRING .= '"' . $column_array['blades']. '", ';
                        $SQL_STRING .= '"' . $column_array['cw']. '", ';
                        $SQL_STRING .= '"' . $column_array['ccw']. '", ';
                        $SQL_STRING .= $column_array['material']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'pdb':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, number_of_channels, operating_voltage, antenna_connector, eu, us, frequency, transmit_power_min, transmit_power_max";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['number_of_channels']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_voltage']. '", ';
                        $SQL_STRING .= '"' . $column_array['antenna_connector']. '", ';
                        $SQL_STRING .= '"' . $column_array['eu']. '", ';
                        $SQL_STRING .= '"' . $column_array['us']. '", ';
                        $SQL_STRING .= '"' . $column_array['frequency']. '", ';
                        $SQL_STRING .= '"' . $column_array['transmit_power_min']. '", ';
                        $SQL_STRING .= $column_array['transmit_power_max']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'swag':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, type, swag_size, color";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['type']. '", ';
                        $SQL_STRING .= '"' . $column_array['swag_size']. '", ';
                        $SQL_STRING .= $column_array['color']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'transmitter':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, access, spectrum_analyzer, screen, video_signal, jr, operating_system, training_function, number_of_channels, model_memories, charging_interface, opentx, compatibility";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['access']. '", ';
                        $SQL_STRING .= '"' . $column_array['spectrum_analyzer']. '", ';
                        $SQL_STRING .= '"' . $column_array['screen']. '", ';
                        $SQL_STRING .= '"' . $column_array['video_signal']. '", ';
                        $SQL_STRING .= '"' . $column_array['jr']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_system']. '", ';
                        $SQL_STRING .= '"' . $column_array['training_function']. '", ';
                        $SQL_STRING .= '"' . $column_array['number_of_channels']. '", ';
                        $SQL_STRING .= '"' . $column_array['model_memories']. '", ';
                        $SQL_STRING .= '"' . $column_array['charging_interface']. '", ';
                        $SQL_STRING .= '"' . $column_array['opentx']. '", ';
                        $SQL_STRING .= $column_array['compatibility']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'video_monitor':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, resolution, screen_size, antenna, charging_interface, number_of_channels, video_format, output_10v, battery_type";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['resolution']. '", ';
                        $SQL_STRING .= '"' . $column_array['screen_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['antenna']. '", ';
                        $SQL_STRING .= '"' . $column_array['charging_interface']. '", ';
                        $SQL_STRING .= '"' . $column_array['number_of_channels']. '", ';
                        $SQL_STRING .= '"' . $column_array['video_format']. '", ';
                        $SQL_STRING .= '"' . $column_array['output_10v']. '", ';
                        $SQL_STRING .= $column_array['battery_type']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'video_receiver':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, receiver_method, compatibility, rf_sensitivity, operating_voltage, voltage_min, voltage_max, antenna_connections, antenna_num";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['receiver_method']. '", ';
                        $SQL_STRING .= '"' . $column_array['compatibility']. '", ';
                        $SQL_STRING .= '"' . $column_array['rf_sensitivity']. '", ';
                        $SQL_STRING .= '"' . $column_array['operating_voltage']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_min']. '", ';
                        $SQL_STRING .= '"' . $column_array['voltage_max']. '", ';
                        $SQL_STRING .= '"' . $column_array['antenna_connections']. '", ';
                        $SQL_STRING .= $column_array['antenna_num']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'fc':                               
                $SQL_STRING = "INSERT INTO $table_name (";
                    $SQL_STRING .= " id, band, frequency, eu, us, mounting_holes, transmit_power_min, transmit_power_max, voltage_min, voltage_max, antenna_connector, operating_voltage";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['band']. '", ';
                        $SQL_STRING .= '"' . $column_array['frequency']. '", ';
                        $SQL_STRING .= '"' . $column_array['eu']. '", ';
                        $SQL_STRING .= '"' . $column_array['us']. '", ';
                        $SQL_STRING .= '"' . $column_array['mounting_holes']. '", ';
                        $SQL_STRING .= $column_array['transmit_power_min']. ', ';
                        $SQL_STRING .= $column_array['transmit_power_max']. ', ';
                        $SQL_STRING .= '"' .$column_array['voltage_min']. '", ';
                        $SQL_STRING .= '"' .$column_array['voltage_max']. '", ';
                        $SQL_STRING .= '"' .$column_array['antenna_connector']. '", ';
                        $SQL_STRING .= $column_array['operating_voltage']. '  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            default:
                break;    
        }


        return $SQL_STRING;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            
echo <<<_END
<html>
    <title>
        SwapRC:Add
    </title>
    <body>
            <h1>Add : $category</h1>
            <form action="./add_interface.php" method="post">
            
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