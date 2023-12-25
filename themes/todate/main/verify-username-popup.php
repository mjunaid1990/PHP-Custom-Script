<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="username-veri">
    <div class="row">
        <div class="col m12 s12">

            <!-- Email -->
            <div class="col s12 m12">
                <div class="to_mat_input">
                    <input name="usernames" id="username-popup" class="browser-default" type="text" placeholder="<?php echo __( 'Username' );?>" value="">
                    <label for="usernames"><?php echo __( 'Username' );?></label> 
                </div>
                <button class="btn waves-effect waves-light" id="verify-username-btn"><?php echo __('Submit'); ?></button>
            </div>
        </div>

        

    </div>

</div>

<div class="username-verified" style="display: none;">
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path></svg>
    <p style="text-align: center;"><?php echo __('Congratulations!. Your username is changed successfully.'); ?></p>
</div>
