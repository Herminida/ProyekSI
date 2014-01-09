<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /*  function set_apaaja()
	{
		$hello ="ini harusnya keprint";
		return $hello;
	}*/

    /**
     * Get the value from a form
     *
     * Permits you to repopulate a form field with the value it was submitted
     * with, or, if that value doesn't exist, with the default
     *
     * @access    public
     * @param    string    the field name
     * @param    string
     * @return    void
     */    
   /* function set_value($field = '', $default = '')
    {
        if ( ! isset($this->_field_data[$field]))
        {
            if( $this->CI->input->post($field)===FALSE)
            {
                return $default;
            } 
            else 
            {
                return $this->CI->input->post($field);
            }
        }
        
        return $this->_field_data[$field]['postdata'];
    }
    */
    // --------------------------------------------------------------------
    
    /**
     * Set Select
     *
     * Enables pull-down lists to be set to the value the user
     * selected in the event of an error
     *
     * @access    public
     * @param    string
     * @param    string
     * @return    string
     */    
 /*   function set_select($field = '', $value = '', $default = FALSE)
    {        
        return $this->set_value_array($field, $value, ' selected="selected"', $default);
    }*/
    
    // --------------------------------------------------------------------
    
    /**
     * Set Radio
     *
     * Enables radio buttons to be set to the value the user
     * selected in the event of an error
     *
     * @access    public
     * @param    string
     * @param    string
     * @return    string
     */    
   /* function set_radio($field = '', $value = '', $default = FALSE)
    {
        return $this->set_value_array($field, $value, ' selected="selected"', $default);
    }*/
    
    // --------------------------------------------------------------------
    
    /**
     * Set Checkbox
     *
     * Enables checkboxes to be set to the value the user
     * selected in the event of an error
     *
     * @access    public
     * @param    string
     * @param    string
     * @return    string
     */    
    function pasang_checkbox($field = '', $value = '', $default = FALSE)
    {
        //echo $_POST[$field];
    	if  (isset($_POST[$field])){
    		 $field = $_POST($field);
    	}else{
    		return '';
    	}
    	  if (($field == '' OR $value == '') OR ($field != $value))
            {
                return '';
            }else{
            	return 'checked="checked"';
            }
        //return $this->set_value_array($field, $value, ' checked="checked"', $default);
    }
   /* 
    function set_value_array($field = '', $value = '', $default_value = '' ,$default = FALSE){
        if ( ! isset($this->_field_data[$field]) OR ! isset($this->_field_data[$field]['postdata']))
        {
            if( ! ($this->CI->input->post($field) === FALSE))
            {
                $field = $this->CI->input->post($field);
            } 
            else 
            {
                if ($default === TRUE AND count($this->_field_data) === 0)
                {
                    return $default_value;
                }
                return '';
            }
        }
        else
        {
        $field = $this->_field_data[$field]['postdata'];
        }
        
        if (is_array($field))
        {
            if ( ! in_array($value, $field))
            {
                return '';
            }
        }
        else
        {
            if (($field == '' OR $value == '') OR ($field != $value))
            {
                return '';
            }
        }
            
        return $default_value;
    }  
*/
/* End of file Someclass.php */