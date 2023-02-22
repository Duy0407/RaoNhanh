<?php
require_once '../classes/Mobile_Detect.php';
function layoutTypes()
{
    return array('classic', 'mobile', 'tablet');
}
function initLayoutType()
{
    // Safety check.
    if (!class_exists('Mobile_Detect')) { return 'classic'; }

    $detect = new Mobile_Detect;
    $isMobile = $detect->isMobile();
    $isTablet = $detect->isTablet();

    $layoutTypes = layoutTypes();

    // Set the layout type.
    if ( isset($_GET['layoutType']) ) {

        $layoutType = $_GET['layoutType'];

    } else {

        //if (empty($_COOKIE['layoutType'])) {

            $layoutType = ($isMobile ? ($isTablet ? 'tablet' : 'mobile') : 'classic');

        //} else {

        //    $layoutType =  $_COOKIE['layoutType'];

        //}

    }

    // Fallback. If everything fails choose classic layout.
    if ( !in_array($layoutType, $layoutTypes) ) { $layoutType = 'classic'; }

    // Store the layout type for future use.
    //setcookie('layoutType', $layoutType ,time() + 3600,'/');

    return $layoutType;
}
$layoutType = initLayoutType();
?>