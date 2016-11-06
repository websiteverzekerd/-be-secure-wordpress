<?php

// version comparison
$version = file_get_contents(plugin_dir_path( __FILE__ ) . '../version/file.txt');
$crnt_version = file_get_contents($version_server);


$versioncheck = version_compare($version, $crnt_version, '<');

function display_outdated() {
	$crnt_version = file_get_contents($version_server);

    ?>
    <div class="error notice">
   		<p>De WebsiteVerzekerd Plugin is <b style=\'color:red;\'>verouderd</b>, die nieuwste versie is <?php echo $crnt_version; ?>- voor updates zie de <a href="http://www.websiteverzekerd.nl/plugin-updates">plugin-support</a> pagina</p>
    </div>
    <?php
}


if($versioncheck) {add_action( 'admin_notices', 'display_outdated'); $outdated = 1; } 

$options = get_option( 'be_secure_settings' );
 

function display_emailnotset() {
?>
	 <div class="error notice">
   		<p>Het email-adres voor de WebsiteVerzekerd Plugin is <b style='color:red;'>niet ingesteld</b>, ga naar de <a href="admin.php?page=be-secure-wordpress">configuratie-pagina</a> of neem contact op via <a href="http://www.websiteverzekerd.nl/contact">onze website</a> voor ondersteuning</p>
    </div>
<?php
}

if(empty($options['be_secure_text_field_0'])){ add_action( 'admin_notices', 'display_emailnotset'); $email = 1; }


function display_emailinvalid() {
?>
	 <div class="error notice">
   		<p>Het email-adres voor de WebsiteVerzekerd Plugin is <b style='color:red;'>ongeldig</b>, ga naar de <a href="admin.php?page=be-secure-wordpress">configuratie-pagina</a> of neem contact op via <a href="http://www.websiteverzekerd.nl/contact">onze website</a> voor ondersteuning</p>
    </div>
<?php
}

function display_inactive() {
?>

	 <div class="error notice">
   		<p>De WebsiteVerzekerd Plugin is <b style='color:red;'>inactief</b>, ga naar de <a href="admin.php?page=be-secure-wordpress">configuratie-pagina</a> of neem contact op via <a href="http://www.websiteverzekerd.nl/contact">onze website</a> voor ondersteuning</p>
    </div>

	<?php
	}

if($checklist == 0)
{
add_action( 'admin_notices', 'display_inactive');
}