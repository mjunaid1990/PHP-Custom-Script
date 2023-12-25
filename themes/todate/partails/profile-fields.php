<?php $fid = '';
if (!empty($custom_data[$field['fid']])) {
    $fid = $custom_data[$field['fid']];
}
if( isset( $_GET[ $field['fid'] ] ) && !empty( $_GET[ $field['fid'] ] ) ){
    $fid = Secure( $_GET[ $field['fid'] ] );
}

/*
 * to change width of profile custom fields 
 * By Community Devs LLC
 */

$cls = 's6';
$max_length = '';
$resize = '';
if($field['fid'] == 'fid_27') {
    $cls = 's12';
}else if($field['fid'] == 'fid_28') {
    $rows = 3;
    $cls = 's12';
    $resize = 'resize: vertical !important;';
}else if($field['fid'] == 'fid_29') {
    $rows = 3;
    $cls = 's12';
    $resize = 'resize: vertical !important;';
}else if($field['fid'] == 'fid_11') {
    $cls = 's3';
}else if($field['fid'] == 'fid_12') {
    $cls = 's3';
}else if($field['fid'] == 'fid_44') {
    $cls = 's12';
    $rows = 4;
    $resize = 'resize: vertical !important;';
}else if($field['fid'] == 'fid_48') {
    $cls = 's12';
    $max_length = 'maxlength="'. characters_length().'"';
}
if($field['type'] == 'textarea') {
    $cls = 's12';
}
//end by Community Devs LLC
?>
<div class="col <?php echo $cls; ?> xs12"> 
	<div class="to_mat_input">
		<?php
			if ($field['select_type'] == 'yes') {
				$options = @explode(',', $field['type']); ?>
			<select name="<?php echo $field['fid'];?>" class="browser-default pp_select_has_label">
                            <!--added disable for default selection and also added description as selected if no value
                            by Community Devs LLC-->
                                <option value="" disabled="" <?php echo $fid?'':'selected'; ?>>Select</option>
				<?php
                                if($field['fid'] == 'fid_11') {
                                    for($i = 18 ; $i <= 70 ; $i++ ){?>
                                            <option value="<?php echo $i;?>" <?php if( $i == $fid){ echo 'selected';}?> ><?php echo $i;?></option>
                                    <?php }
                                }else if($field['fid'] == 'fid_12') {
                                    for($i = 19 ; $i <= 71 ; $i++ ){?>
                                            <option value="<?php echo $i;?>" <?php if( $i == $fid){ echo 'selected';}?>><?php echo $i;?></option>
                                    <?php }
                                }else {
					foreach ($options as $key => $value) {
					$selected = (($key + 1) == $fid) ? 'selected' : '';
                ?>
					<option value="<?php echo $key + 1;?>" <?php echo $selected;?>><?php echo $value;?></option>
				<?php }
                                } ?>
                                        <!--end by Community Devs LLC-->
			</select>
		<?php
			} else {
			if ($field['type'] == 'textbox') { ?>
            <input id="<?php echo $field['fid'];?>" name="<?php echo $field['fid'];?>" <?php echo $max_length; ?> type="text" class="browser-default" value="<?php echo $fid?>" placeholder="<?php echo $field['description']; ?>">
        <?php } else if ($field['type'] == 'textarea') {?>
            <textarea id="<?php echo $field['fid'];?>" name="<?php echo $field['fid'];?>" placeholder="<?php echo $field['description']; ?>" <?php echo isset($rows)?'rows="'.$rows.'"':''; ?> style="white-space: pre-wrap;<?php echo $resize;?>"><?php echo breaktonewline($fid); ?></textarea>
        <?php } } ?>
            
            <!--<label for="<?php // echo $field['name'];?>"><?php // echo $field['description'];?></label>
            changed description to name's
            by Community Devs LLC
            -->
            <?php if ($field['select_type'] == 'yes') { ?>
            <label for="<?php echo $field['fid'];?>"><?php echo $field['name'];?></label>
            <?php }else { ?>
            <label for="<?php echo $field['fid'];?>"><?php echo $field['name'];?></label>
            <?php } ?>
            
            <!--end by Community Devs LLC-->
		
		
	</div>
</div>