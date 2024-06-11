<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['cas_server_url'] = 'https://login.itb.ac.id/cas';

$config['phpcas_path'] = str_replace("\\","/",APPPATH).'libraries/CAS-1.3.4';
$config['cas_debug']   = TRUE;
$config['cas_disable_server_validation'] = TRUE;