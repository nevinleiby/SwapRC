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
        f (! is_numeric($mah))
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














?>