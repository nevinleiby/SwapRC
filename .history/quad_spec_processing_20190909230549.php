<?php

    // Data processing functions:

    ///////////////////////////////////////////////
    // check_parameter
    //    Simplified method for data checking based upon parameter name
    //    $value = check_parameter($parameter_type, $value);
    ///////////////////////////////////////////////
    function check_parameter ($parameter_type, $value)
    {
        $return_value = 0;

        switch ($parameter_type):
        {
            case 'id':
                if (! is_numeric($value))
                {
                     $return_value = 1;
                }                
                break;
            case 'processor':
            case 'gyro':
            case 'mounting_holes':
            case 'osd':
            case 'firmware':
            case 'voltage_control':
            case 'antenna_connector':
            case 'filament_type':
            case 'polarization':
            case 'bandwidth':
            case 'material':
            case 'swr':
            case 'gain':
            case 'battery_type':
            case 'receiver':
            case 'transmitter':
            case 'goggles':
            case 'esc_type':
            case 'stack_size':
            case 'protocols_supported':
            case 'image_aspect_ratio':
            case 'lens':
            case 'prints':
            case 'camera_sizes':
            case 'resolution':
            case 'hdmi_in':
            case 'hardware_type':
            case 'color':
            case 'mounting_screw':
            case 'output_5v':
            case 'output_10v':
            case 'lens':
            case 'frequency':
            case 'swag_size':
            case 'access':
            case 'spectrum_analyzer':
            case 'screen':
            case 'video_signal':
            case 'jr':
            case 'operating_system':
            case 'training_function':
            case 'charging_interface':
            case 'opentx':
            case 'compatibility':
            case 'video_format':
            case 'receiver_method':
            case 'rf_sensitivity':
            case 'antenna_connections':
            case 'band':
            case 'type1':
            case 'type2':
            case 'manufacturer':
            case 'model':
            case 'release_year':
            case 'dimension':
            case 'shipping_restriction':
            case 'id_code':
            case 'country_of_origin':            
                if ($value != '')
                {
                    $return_value = $value;
                }
                else
                {
                    $return_value = '';
                }
                break;            
            case 'voltage_min':
            case 'voltage_max':
            case 'operating_voltage':
            case 'antenna_length':
            case 'c_rating':
            case 'mah':
            case 'length':
            case 'width':
            case 'height':
            case ' frame_size':
            case 'size':
            case 'amps_max':
            case 'fov':
            case ' arms':
            case 'stacks':
            case 'kv':
            case 'stator_diameter':
            case 'stator_height':
            case ' shaft_size':
            case 'prop_length':
            case 'blades':
            case 'cw':
            case 'ccw':
            case 'number_of_channels':
            case 'transmit_power_min':
            case 'transmit_power_max':
            case 'model_memories':
            case 'antenna_num':
                if (! is_numeric($value))
                {
                    $return_value = $value;
                }
                else {
                    $return_value = 0;
                }
                break;
            case 'url':
                $return_value = check_url($url)
                break;
            default:
                break;               
        }
        return $return_value;
    } 

    function check_url ($url)
    {
        if ($url)
        {
            $url .= '';
        }
        return $url;
    }
























?>