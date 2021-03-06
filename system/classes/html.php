<?php defined('SELF') or die();

class Html {

	private static $instance;

	public static function getInstance() {
		if(!self::$instance) {
			self::$instance = new Html();
		}

		return self::$instance;
	}

	public function js() {
		$jshtml = '';
		$config = Config::get();

		if(isset($config['js'])) {
			if(!is_array($config['js'])) {
				$jshtml .= $this->echoJS($config['js']);
			} else {
				foreach($config['js'] as $file) {
					$jshtml .= $this->echoJS($file);
				}
			}
		} else {
			$jshtml .= $this->echoJS('load-more');
		}

		return $jshtml;
	}

	public function css() {
		$csshtml = '';
		$config = Config::get();

		if(isset($config['css'])) {
			if(!is_array($config['css'])) {
				$csshtml .= $this->echoCSS($config['css']);
			} else {
				foreach($config['css'] as $file) {
					$csshtml .= $this->echoCSS($file);
				}
			}
		} else {
			$csshtml .= $this->echoCSS('screen');
			$csshtml .= $this->echoCSS('animate.min');
		}

		return $csshtml;
	}

	public function currentURL() {
		return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}

	public function baseURL() {
		$url = $this->currentURL();
		$new = explode('?', $url);
		return $new[0];
	}

	public function echoJS($file) {
		return  '<script type="text/javascript" src="' . BASE . 'application/js/' . $file . '.js' . '"></script>';
	}

	public function echoCSS($file) {
		return '<link rel="stylesheet" href="' . BASE . 'application/css/' . $file . '.css">';
	}

	public function getGravatar($email) {
		return "http://www.gravatar.com/avatar/" . md5(strtolower($email));
	}

	function time_elapsed_string($ptime) {
	    $etime = time() - $ptime;
	    
	    if ($etime < 1) {
	        return '0 seconds';
	    }
	    
	    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
	                30 * 24 * 60 * 60       =>  'month',
	                24 * 60 * 60            =>  'day',
	                60 * 60                 =>  'hour',
	                60                      =>  'minute',
	                1                       =>  'second'
	                );
	    
	    foreach ($a as $secs => $str) {
	        $d = $etime / $secs;
	        if ($d >= 1) {
	            $r = round($d);
	            return $r . ' ' . $str . ($r > 1 ? 's' : '');
	        }
	    }
	}

}