<form id="show_new_form_profile" action="<?php echo url_for('mdUserManagement/showUserProfileAjax'); ?>" method="post" onsubmit="return mdUserManagement.getInstance().showProfile();" >

    <span>Seleccionar un perfil</span>
    <div class="clear"></div>
        <?php use_helper( 'JavascriptBase' );?>
        <?php echo javascript_tag("mdUserManagement.getInstance().showProfile();"); ?>
    


    <div id="list_profiles_">
        <?php include_partial('listUserProfiles', array('mdProfiles' => $mdProfiles)); ?>
    </div>
    <div id="profile_form_"></div>
</form>
