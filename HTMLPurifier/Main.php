<?php

    namespace IdnoPlugins\HTMLPurifier {

        class Main extends \Idno\Common\Plugin {
	    
            function registerEventHooks() {
		
                \Idno\Core\site()->addEventHook('text/filter',function(\Idno\Core\Event $event) {
                    
		    $text = $event->response();
		    
		    require_once(dirname(__FILE__) . '/vendor/htmlpurifier-4.6.0/library/HTMLPurifier.auto.php');
		    
		    $config = \HTMLPurifier_Config::createDefault();
		    $purifier = new \HTMLPurifier($config);
		    $text = $purifier->purify($text);
		    
		    $event->setResponse($text);
                });

            }
	}

    }
