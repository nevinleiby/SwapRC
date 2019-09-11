<?php


    // q_display_table
    function q_display_table ($table_name)
    {
        $SQL_STRING = '';
        
        // consider Exit immediately if nothing defined:

          

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
        
        // No parameters - exit! Don't try to continue:
        if (! $parameters)
        {
            return '';
        }

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
                    $SQL_STRING .= " id, frame_size, arms, print, camera_sizes, stacks, stack_size";
                    $SQL_STRING .= ") VALUES (";
                        $SQL_STRING .= $column_array['id'] . ', ';
                        $SQL_STRING .= '"' . $column_array['frame_size']. '", ';
                        $SQL_STRING .= '"' . $column_array['arms']. '", ';
                        $SQL_STRING .= '"' . $column_array['print']. '", ';
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
                        $SQL_STRING .= '"' . $column_array['url_distributor5']. '"  ';              
                        // check for trailing ','
                    $SQL_STRING .= ');';
                break;
            case 'goggle':                               
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
?>