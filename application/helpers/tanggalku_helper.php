<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('buatHari'))
{
    function buatHari($name='',$value='')
    {
        $days = range(1, 31);
	//$day_list[''] = 'Tanggal';
        foreach($days as $day)
        {
            $day_list[$day] = $day;
        } 		
        return form_dropdown($name, $day_list, $value,'style=width:50;');
    }
}	

if ( !function_exists('buatTahun'))
{
    function buatTahun($name='',$value='')
    {        
        $years = range(1922, date("Y"));
	//$year_list[''] = 'Tahun';
        foreach($years as $year)
        {
            $year_list[$year] = $year;
        }    
        
        return form_dropdown($name, $year_list, $value,'style=width:80;');
    }
}

if (!function_exists('buatBulan'))
{
    function buatBulan($name='',$value='')
    {
        $month=array(
            '01'=>'Januari',
            '02'=>'Februari',
            '03'=>'Maret',
            '04'=>'April',
            '05'=>'Mei',
            '06'=>'Juni',
            '07'=>'Juli',
            '08'=>'Agustus',
            '09'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember');
        return form_dropdown($name, $month, $value,'style=width:120;');
    }
}
