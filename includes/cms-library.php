<?php
	header('Content-type: text/html; charset=utf-8');
	//include('includes/websiteMembership.php');
	/* STEP 1: LOAD RECORDS - Copy this PHP code block near the TOP of your page */
	
	// load viewer library
	$libraryPath = '/home4/fauxgeek/www/cmsAdmin/lib/viewer_functions.php';
	$dirsToCheck = array('/home4/fauxgeek/public_html/','','../','../../','../../../');
	foreach ($dirsToCheck as $dir) { if (@include_once("$dir$libraryPath")) { break; }}
	if (!function_exists('getRecords')) { die("Couldn't load viewer library, check filepath in sourcecode."); }	
	
	// load record from 'home_page_editor'
	list($home_page_editorRecords, $home_page_editorMetaData) = getRecords(array(
		'tableName'   => 'home_page_editor',
		'where'       => '', // load first record
		'loadUploads' => false,
		'allowSearch' => false,
		'limit'       => '1',
	));
	$homePageEditor = @$home_page_editorRecords[0];
	
	//global functions
	function checkForNum(){
		if(@$_GET['num']){
			return true;
		}else{
			return false;
		}
	}

	function getNewestUsers(){
		list($users, $usersMetaData) = getRecords(array(
			'tableName'   => 'users',
			'loadUploads' => false,
			'limit'       => '5',
			'orderBy'     => 'createdDate DESC'
		));

		return $users;
	}
?>