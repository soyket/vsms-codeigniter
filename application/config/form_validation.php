<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (
	'addcat' => array (
		array(
		        'field' => 'name',
		        'label' => 'Categoey Name',
		        'rules' => 'required|is_unique[categories.cat_name]'
		     )
		),
	'editcat' => array (
		array(
		        'field' => 'name',
		        'label' => 'Categoey Name',
		        'rules' => 'required'
		     )
		),
    'editemp' => array (
		array(
		        'field' => 'f_name',
		        'label' => 'First Name',
		        'rules' => 'required'
		     ),
                array(
		        'field' => 'l_name',
		        'label' => 'Last Name',
		        'rules' => 'required'
		     ) ,
                array(
		        'field' => 'u_address',
		        'label' => 'Address',
		        'rules' => 'required'
		     ) ,   
                array(
		        'field' => 'u_mobile',
		        'label' => 'Mobile',
		        'rules' => 'required'
		     )    
		),
    'addemp' => array (
                array(
		        'field' => 'u_email',
		        'label' => 'Email',
		        'rules' => 'required|is_unique[users.email]'
		     ),
		array(
		        'field' => 'f_name',
		        'label' => 'First Name',
		        'rules' => 'required'
		     ),
                array(
		        'field' => 'l_name',
		        'label' => 'Last Name',
		        'rules' => 'required'
		     ) ,
                array(
		        'field' => 'u_address',
		        'label' => 'Address',
		        'rules' => 'required'
		     ) ,   
                array(
		        'field' => 'u_mobile',
		        'label' => 'Mobile',
		        'rules' => 'required'
		     )    
		)
    
);
