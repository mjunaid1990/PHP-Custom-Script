<?php if( IS_LOGGED == true && $config->google_place_api !== '' ){ ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $config->google_place_api;?>&libraries=places" async defer></script>
    
<?php } ?>

