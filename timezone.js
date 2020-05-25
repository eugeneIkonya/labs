$(document).ready(function(){
    var offset = new Date().getTimezoneOffset();//return number of minutes ahead or behind the green which meridian
    var timestamp = new Date().getTime();//returns number of milliseconds since 1970/01/01;
    
    var utc_timestamp = timestamp + (60000 * offset);

    $(' #time_zone_offset ').val(offset);
    $(' #utc_timestamp ').val(utc_timestamp);

});