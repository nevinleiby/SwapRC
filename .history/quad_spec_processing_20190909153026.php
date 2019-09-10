<?php

    // Data processing functions:

    function check_id ($id)
    {
        if ($id > 0)
        {
            $id = 1;
        }
        return $id;        
    }

    function check_processor ($processor)
    {
        if ($processor)
        {
            $processor .= 'valid_proc';
        }
        return $processor;
    }

    function check_gyro ($gyro)
    {
        if ($gyro)
        {
            $gyro .= 'valid_gyro';            
        }
        return $gyro;
    }

    function check_mounting_holes ($mounting_holes)
    {
        if ($mounting_holes)
        {
            $mounting_holes .= 'valid_holes';
        }
        return $mounting_holes;
    }

    function check_osd ($osd)
    {
        if ($osd)
        {
            $osd .= 'valid_osd';            
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
    function check_antenna_connector ($antenna_connector)
    {
        if ($antenna_connector)
        {
            $antenna_connector .= 'valid_antenna_connector';            
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


?>