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
    function check_swr ($swr)
    {
        if ($swr)
        {
            $swr .= '';            
        }
        return $swr;
    }
    function check_gain ($gain)
    {
        if ($gain)
        {
            $gain .= '';            
        }
        return $gain;
    }

?>