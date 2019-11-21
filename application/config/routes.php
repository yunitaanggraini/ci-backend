<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.

| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login/login';

$route['dashboard']="dashboard";


$route['home']="welcome/home";

$route['master_data/user']="master_data/viewUser";
$route['user/input']="master_data/input_user";
$route['user/edit']="master_data/edit_user";

$route['master_data/user_group']="master_data/viewUserGroup";
$route['master_data/jenis_inventory']="master_data/viewJenisInv";
$route['master_data/sub_inventory']="master_data/viewSubInv";
$route['master_data/status_inventory']="master_data/viewStatusInv";
$route['master_data/perusahaan']="master_data/viewPerusahaan";
$route['master_data/cabang']="master_data/viewCabang";
$route['master_data/lokasi']="master_data/viewLokasi";
$route['master_data/vendor']="master_data/viewVendor";
$route['master_data/jenis_audit']="master_data/viewJenisAudit";
$route['barcode_dan_qrcode/input_kode']="master_data/viewBuatBarQRcode";

$route['data_audit/list']="audit/viewAudit";
$route['data_audit/input']="audit/input";
$route['monitoring/audit']="monitoring_audit/viewMonitoringAudit";
$route['transaksi/monitoring_office']="transaksi_GA/viewOffice";
$route['transaksi/management_office']="transaksi_GA/inputOffice";
$route['laporan/inventory_office']="laporan_GA/viewLaporanOffice";
$route['laporan/audit']="laporan_audit/viewLaporanAudit";
$route['translate_uri_dashes'] = FALSE;

$route['audit/input_jadwal']="audit/JadwalAudit";
$route['audit/list_audit']="audit/viewListAudit";
$route['data_temporary/unit']="audit/viewTempUnit";
$route['data_temporary/part']="audit/viewTempPart";
$route['transaksi/audit']="audit/audit";
$route['transaksi/audit_unit']="audit/audit_unit";
$route['transaksi/audit_part']="audit/audit_part";
$route['laporan/laporan_audit_unit']="laporan_auditor/laporan_unit";


$route['error']='error';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
