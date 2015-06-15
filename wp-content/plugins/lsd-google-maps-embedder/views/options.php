<?php

class lsd_gme_options {
    
    public function __construct() {
        
        add_action('admin_menu', array(&$this, 'gme_admin_menu'));
        
    }
    
    public function gme_admin_menu() {
        
        add_options_page('Google Maps Embedder', 'Google Maps', 'manage_options', 'google_maps_embedder', array(&$this, 'gme_admin_page'));
        
    }
    
    public function gme_admin_page() {
        
        $html    = '';
        $updated = false;
        
        if (isset($_POST['submit'])) {
            
            $this->process_update();
            
            $updated = true;
            
        }
        
        $config = get_option("lsd_gme_config",array());
        
        if ($updated) {
            
            $html .= '
            <div id="message" class="updated">
                <p><strong>'.__('Settings saved.','lsd-gme').'</strong></p>
            </div>';
        }
        
        $html .= '
        <form action="" method="post">
        <div class="wrap">
            <h2>'.__('LSD Google Maps Embedder Options', 'lsd-gme').'</h2>
            
            <p>
            To retrieve your API key:<br />
            <br />
            1. Visit the APIs Console at <a target="_blank" href="https://code.google.com/apis/console">https://code.google.com/apis/console</a> and log in with your Google Account.<br />
            2. Click the <strong>Services</strong> link from the left-hand menu.<br />
            3. Activate the <strong>Google Maps Embed API</strong> service.<br />
            4. Click the <strong>API Access</strong> link from the left-hand menu. Your API key is available from the <strong>API Access</strong> page, in the <strong>Simple API Access</strong> section. Maps API applications use the <strong>Key for browser apps</strong>.<br />
            </p>
            
            <table class="form-table">';
            
            $html .= '
            <tr>
                <th scope="row">Google Maps API</th>
                <td>
                    <input class="regular-text" type="text" name="config[google_maps_api_key]" value="'.(isset($config['google_maps_api_key'])?$config['google_maps_api_key']:null).'"/>
                    <p class="description">Your API key looks something like this: AIzaSyCwI3k7JC29_KzlX1S_bC8fARpocLX5bRY</p>
                </td>
            </tr>';
            
        $html .= '
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="'.__('Save changes','lsd-gme').'">
            </p>
        </div>
        </form>';
        
        echo $html;
        
    }
    
    private function process_update() {
        
        update_option('lsd_gme_config',$_POST['config']);
        
    }
    
}