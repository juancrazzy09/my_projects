<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['transaction_history'] = 'pages/transaction_history';

$route['list_of_request'] = 'speaker/list_of_request';

$route['list_of_transaction'] = 'speaker/list_of_transaction';

$route['speaker_dashboard'] = 'speaker/speaker_dashboard';

$route['staff_dashboard'] = 'staff/staff_dashboard';

$route['staff_categories'] = 'staff/staff_categories';

$route['staff_speaker'] = 'staff/staff_speaker';

$route['staff_request'] = 'staff/staff_request';

$route['staff_transactions'] = 'staff/staff_transactions';

$route['staff_users'] = 'staff/staff_users';

$route['admin_user'] = 'admin/admin_user';

$route['admin_categories'] = 'admin/admin_categories';

$route['admin_speaker'] = 'admin/admin_speaker';

$route['admin_request'] = 'admin/admin_request';

$route['admin_dashboard'] = 'admin/admin_dashboard';

$route['admin_transactions'] = 'admin/admin_transactions';

$route['official_receipt'] = 'pages/official_receipt';

$route['msgs'] = 'pages/msgs';

$route['application_form'] = 'pages/application_form';

$route['create_msg'] = 'pages/create_msg';

$route['receipt'] = 'pages/receipt';

$route['gcash'] = 'pages/gcash';

$route['paymaya'] = 'pages/paymaya';

$route['certificate_list'] = 'pages/certificate_list';

$route['message'] = 'pages/message';

$route['payment'] = 'pages/payment';

$route['payment_confirmation'] = 'pages/payment_confirmation';

$route['schedule'] = 'pages/schedule';

$route['speaker'] = 'pages/speaker';

$route['account'] = 'pages/account';

$route['register'] = 'pages/register';

$route['login'] = 'pages/login';

$route['default_controller'] = 'pages/home';

$route['(:any)'] = 'pages/home/$1';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
