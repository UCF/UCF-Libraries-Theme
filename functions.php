// Allows xml files

add_filter('upload_mimes', 'custom_upload_xml');
 
function custom_upload_xml($mimes) {
    $mimes = array_merge($mimes, array('xml' => 'application/xml'));
    return $mimes;
}