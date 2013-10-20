<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Auth extends CI_Controller
    {
        public function session($provider)
        {
            $this->load->library('OAuth2');
            $this->load->helper('url_helper');

            // $this->load->spark('oauth2/0.3.1');

            $provider = $this->oauth2->provider($provider, array(
                // 'id' => '97734893287.apps.googleusercontent.com',
                // 'secret' => '74QQQ-8XRjfg5ef11lg4gLKt',
                

                // 'id' => '1406197466278826',
                // 'secret' => '72eeed3ed21a43d233d9e83aefc9d919',

                //WindowsLive
                'id' => '000000004C105615',
                'secret' => 'eSE6FYDzWzWTJwJPDwqyCaL7bAhiTD4E',
            ));

            if ( ! $this->input->get('code'))
            {
                // By sending no options it'll come back here
                $provider->authorize();
            }
            else
            {
                // Howzit?
                try
                {
                    $token = $provider->access($_GET['code']);

                    $user = $provider->get_user_info($token);

                    // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
                    // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
                    echo "<pre>Tokens: ";
                    var_dump($token);

                    echo "\n\nUser Info: ";
                    var_dump($user);
                }

                catch (OAuth2_Exception $e)
                {
                    show_error('That didnt work: '.$e);
                }

            }
        }
    }