<?php

    // Data processing functions:

    function check_id ($id)
    {
        if (! is_numeric($id))
        {
            $id = 1;
        }
        return $id;        
    }

    function check_processor ($processor)
    {
        if ($processor)
        {
            $processor .= '';
        }
        return $processor;
    }

    function check_gyro ($gyro)
    {
        if ($gyro)
        {
            $gyro .= '';            
        }
        return $gyro;
    }

    function check_mounting_holes ($mounting_holes)
    {
        if ($mounting_holes)
        {
            $mounting_holes .= '';
        }
        return $mounting_holes;
    }

    function check_osd ($osd)
    {
        if ($osd)
        {
            $osd .= '';            
        }
        return $osd;
    }

    function check_voltage_min ($voltage_min)
    {
        if ($voltage_min > 0)
        {
            //$voltage_min .= 'valid_voltage_min';            
        }
        else 
        {
            $voltage_min = 1;
        }        
        return $voltage_min;
    }

    function check_firmware ($firmware)
    {
        if ($firmware)
        {
            //$firmware .= 'valid_firmware';            
        }
        else 
        {
            $firmware = 1;
        }        
        return $firmware;
    }

    function check_voltage_max ($voltage_max)
    {
        if ($voltage_max > 0)
        {
            //$voltage_max .= 'valid_voltage_max';            
        }
        else 
        {
            $voltage_max = 1;
        }
        return $voltage_max;
    }

    function check_voltage_control ($voltage_control)
    {
        if ($voltage_control > 0)
        {
            //$voltage_control .= 'valid_voltage_control';            
        }
        else 
        {
            $voltage_control = 1;
        }
        return $voltage_control;
    }


    function check_antenna_connector ($antenna_connector)
    {
        if ($antenna_connector)
        {
            $antenna_connector .= '';            
        }
        return $antenna_connector;
    }

    function check_operating_voltage ($operating_voltage)
    {
        if ($operating_voltage > 0)
        {
            //$voltage_max .= 'valid_voltage_max';            
        }
        else 
        {
            $operating_voltage = 1;
        }
        return $operating_voltage;
    }

    function check_filament_type ($filament_type)
    {
        if ($filament_type)
        {
            $filament_type .= '';            
        }
        return $filament_type;
    }

    function check_antenna_length ($antenna_length)
    {
        if (! is_numeric($antenna_length))
        {
            $antenna_length = 1;            
        }
        return $antenna_length;
    }

    function check_polarization ($polarization)
    {
        if ($polarization)
        {
            $polarization .= '';            
        }
        return $polarization;
    }

    function check_bandwidth ($bandwidth)
    {
        if ($bandwidth)
        {
            $bandwidth .= '';            
        }
        return $bandwidth;
    }

    function check_material ($material)
    {
        if ($material)
        {
            $material .= '';            
        }
        return $material;
    }

    function check_gain ($gain)
    {
        if ($gain)
        {
            $gain .= '';            
        }
        return $gain;
    }


    function check_c_rating ($c_rating)
    {
        if (! is_numeric($c_rating))
        {
            $c_rating = 1;           
        }
        return $c_rating;
    }

    function check_mah ($mah)
    {
        if (! is_numeric($mah))
        {
            $mah = 1;           
        }
        return $mah;
    }

    function check_battery_type ($battery_type)
    {
        if ($battery_type)
        {
            $battery_type .= '';            
        }
        return $battery_type;
    }

    function check_length ($length)
    {
        if (! is_numeric($length))
        {
            $length = 1;          
        }
        return $length;
    }

    function check_width ($width)
    {
        if (! is_numeric($width))
        {
            $width = 1;          
        }
        return $width;
    }

    function check_height ($height)
    {
        if (! is_numeric($height))
        {
            $height = 1;          
        }
        return $height;
    }

    function check_frame_size ($frame_size)
    {
        if (! is_numeric($frame_size))
        {
            $frame_size .= '1';            
        }
        return $frame_size;
    }

    function check_receiver ($receiver)
    {
        if ($receiver)
        {
            $receiver .= '';            
        }
        return $receiver;
    }
    function check_transmitter ($transmitter)
    {
        if ($transmitter)
        {
            $transmitter .= '';            
        }
        return $transmitter;
    }

    function check_goggles ($goggles)
    {
        if ($goggles)
        {
            $goggles .= '';            
        }
        return $goggles;
    }

    function check_esc_type ($esc_type)
    {
        if ($esc_type)
        {
            $esc_type .= '';            
        }
        return $esc_type;
    }

    function check_size ($size)
    {
        if (! is_numeric($size))
        {
            $size = 1;        
        }
        return $size;
    }

    function check_stack_size ($stack_size)
    {
        if ($stack_size)
        {
            $stack_size .= '';            
        }
        return $stack_size;
    }


    function check_protocols_supported ($protocols_supported)
    {
        if ($protocols_supported)
        {
            $protocols_supported .= '';            
        }
        return $protocols_supported;
    }

    function check_amps_max ($amps_max)
    {
        if (! is_numeric($amps_max))
        {
            $protocols_samps_max = 1;
        }
        return $amps_max;
    }

    function check_fov ($fov)
    {
        if (! is_numeric($fov))
        {
            $fov = 1;            
        }
        return $fov;
    }

    function check_image_aspect_ratio ($image_aspect_ratio)
    {
        if ($image_aspect_ratio)
        {
            $image_aspect_ratio .= '';            
        }
        return $image_aspect_ratio;
    }

    function check_lens ($lens)
    {
        if ($lens)
        {
            $lens .= '';            
        }
        return $lens;
    }

    function check_arms ($arms)
    {
        if (! is_numeric($arms))
        {
            $arms = 1;
        }
        return $arms;
    }

    function check_prints ($prints)
    {
        if ($prints)
        {
            $prints .= '';            
        }
        return $prints;
    }

    function check_camera_sizes ($camera_sizes)
    {
        if ($camera_sizes)
        {
            $camera_sizes .= '';            
        }
        return $camera_sizes;
    }

    function check_stacks ($stacks)
    {
        if (! is_numeric($stacks))
        {
            $stacks = 1;
        }
        return $stacks;
    }

    function check_resolution ($resolution)
    {
        if ($resolution)
        {
            $resolution .= '';            
        }
        return $resolution;
    }

    function check_hdmi_in ($hdmi_in)
    {
        if ($hdmi_in)
        {
            $hdmi_in .= '';            
        }
        return $hdmi_in;
    }

    function check_hardware_type ($hardware_type)
    {
        if ($hardware_type)
        {
            $hardware_type .= '';            
        }
        return $hardware_type;
    }


    function check_color ($color)
    {
        if ($color)
        {
            $color .= '';            
        }
        return $color;
    }


    function check_kv ($kv)
    {
        if (! is_numeric($kv))
        {
            $kv = 1;         
        }
        return $kv;
    }
 
    function check_stator_diameter ($stator_diameter)
    {
        if (! is_numeric($stator_diameter))
        {
            $stator_diameter = 1;         
        }
        return $stator_diameter;
    }
 
    function check_stator_height ($stator_height)
    {
        if (! is_numeric($stator_height))
        {
            $stator_height = 1;         
        }
        return $stator_height;
    }
 
    function check_shaft_size ($shaft_size)
    {
        if (! is_numeric($shaft_size))
        {
            $shaft_size = 1;         
        }
        return $shaft_size;
    }
 
    
    function check_mounting_screw ($mounting_screw)
    {
        if ($mounting_screw)
        {
            $mounting_screw .= '';            
        }
        return $mounting_screw;
    }

    function check_output_5v ($output_5v)
    {
        if ($output_5v)
        {
            $output_5v .= '';            
        }
        return $output_5v;
    }

    function check_output_10v ($output_10v)
    {
        if ($output_10v)
        {
            $output_10v .= '';            
        }
        return $output_10v;
    }

    function check_led ($led)
    {
        if ($led)
        {
            $led .= '';            
        }
        return $led;
    }

    function check_prop_length ($prop_length)
    {
        if (! is_numeric($prop_length))
        {
            $prop_length = 1; 
        }
        return $prop_length;
    }

    function check_blades ($blades)
    {
        if (! is_numeric($blades))
        {
            $blades = 1; 
        }
        return $blades;
    }

    function check_cw ($cw)
    {
        if (! is_numeric($cw))
        {
            $cw = 1; 
        }
        return $cw;
    }

    function check_ccw ($ccw)
    {
        if (! is_numeric($ccw))
        {
            $ccw = 1; 
        }
        return $ccw;
    }

    function check_number_of_channels ($number_of_channels)
    {
        if (! is_numeric($number_of_channels))
        {
            $number_of_channels = 1; 
        }
        return $number_of_channels;
    }

    function check_frequency ($frequency)
    {
        if ($frequency)
        {
            $frequency .= '';
        }
        return $frequency;
    }

    function check_transmit_power_min ($transmit_power_min)
    {
        if (! is_numeric($transmit_power_min))
        {
            $transmit_power_min = 1; 
        }
        return $transmit_power_min;
    }

    function check_transmit_power_max ($transmit_power_max)
    {
        if (! is_numeric($transmit_power_max))
        {
            $transmit_power_max = 1; 
        }
        return $transmit_power_max;
    }

    function check_swag_size ($swag_size)
    {
        if ($swag_size)
        {
            $swag_size .= '';
        }
        return $swag_size;
    }

    function check_access ($access)
    {
        if ($access)
        {
            $access .= '';
        }
        return $access;
    }

    function check_spectrum_analyzer ($spectrum_analyzer)
    {
        if ($spectrum_analyzer)
        {
            $spectrum_analyzer .= '';
        }
        return $spectrum_analyzer;
    }
    function check_screen ($screen)
    {
        if ($screen)
        {
            $screen .= '';
        }
        return $screen;
    }
    function check_video_signal ($video_signal)
    {
        if ($video_signal)
        {
            $video_signal .= '';
        }
        return $video_signal;
    }
    function check_jr ($jr)
    {
        if ($jr)
        {
            $jr .= '';
        }
        return $jr;
    }
    function check_operating_system ($operating_system)
    {
        if ($operating_system)
        {
            $operating_system .= '';
        }
        return $operating_system;
    }
    function check_training_function ($training_function)
    {
        if ($training_function)
        {
            $training_function .= '';
        }
        return $swag_size;
    }
 
    function check_model_memories ($model_memories)
    {
        if (! is_numeric($model_memories))
        {
            $model_memories = 1; 
        }
        return $model_memories;
    }

    function check_charging_interface ($charging_interface)
    {
        if ($charging_interface)
        {
            $charging_interface .= '';
        }
        return $charging_interface;
    }
    function check_opentx ($opentx)
    {
        if ($opentx)
        {
            $opentx .= '';
        }
        return $opentx;
    }
    function check_compatibility ($compatibility)
    {
        if ($compatibility)
        {
            $compatibility .= '';
        }
        return $compatibility;
    }
    function check_video_format ($video_format)
    {
        if ($video_format)
        {
            $video_format .= '';
        }
        return $video_format;
    }
    function check_receiver_method ($receiver_method)
    {
        if ($receiver_method)
        {
            $receiver_method .= '';
        }
        return $receiver_method;
    }

    function check_rf_sensitivity ($rf_sensitivity)
    {
        if ($rf_sensitivity)
        {
            $rf_sensitivity .= '';
        }
        return $rf_sensitivity;
    }

    function check_antenna_connections ($antenna_connections)
    {
        if ($antenna_connections)
        {
            $antenna_connections .= '';
        }
        return $antenna_connections;
    }
    function check_antenna_num ($antenna_num)
    {
        if (! is_numeric($antenna_num))
        {
            $antenna_num = 1; 
        }
        return $antenna_num;
    }
    function check_band ($band)
    {
        if ($band)
        {
            $band .= '';
        }
        return $band;
    }

    function check_type1 ($type1)
    {
        if ($type1)
        {
            $type1 .= '';
        }
        return $type1;
    }
    function check_type2 ($type2)
    {
        if ($type2)
        {
            $type2 .= '';
        }
        return $type2;
    }
    function check_manufacturer ($manufacturer)
    {
        if ($manufacturer)
        {
            $manufacturer .= '';
        }
        return $manufacturer;
    }
    function check_model ($model)
    {
        if ($model)
        {
            $model .= '';
        }
        return $model;
    }
    function check_release_year ($release_year)
    {
        if ($release_year)
        {
            $release_year .= '';
        }
        return $release_year;
    }
    function check_dimension ($dimension)
    {
        if ($dimension)
        {
            $dimension .= '';
        }
        return $dimension;
    }
    function check_shipping_restriction ($shipping_restriction)
    {
        if ($shipping_restriction)
        {
            $shipping_restriction .= '';
        }
        return $shipping_restriction;
    }
    function check_id_code ($id_code)
    {
        if ($id_code)
        {
            $id_code .= '';
        }
        return $id_code;
    }
    function check_country_of_origin ($country_of_origin)
    {
        if ($country_of_origin)
        {
            $country_of_origin .= '';
        }
        return $country_of_origin;
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