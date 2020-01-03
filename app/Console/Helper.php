<?php
namespace App\Console;
use Illuminate\Support\Facades\Storage;
use \App\Menu;
use \App\Berita;
use \App\Slider;


class Helper{
    static function main_menu(){
        $menu = Menu::where('status', 'a')
            ->orderBy('urutan')
            ->get();
        $menus = array('items'=>array(), 'parents'=>array());
        foreach($menu as $item){
            $menus['items'] [$item->id_menu] = $item;
            $menus['parents'] [$item->parent][] = $item->id_menu;
        }
        if($menus){return Helper::build_menu(0, $menus); }
        return FALSE;
    }
    static function build_menu($p, $menus){
        $html = "";
        if(isset($menus['parents'][$p])){
            if($p == 0){
                $html .= "<ul>";
            }else{
                $html .= "<ul class='dropdown'>";
            }

            foreach($menus['parents'][$p]  as $id_item){
                if(!isset($menus['parents'][$id_item])){
                    if(preg_match("/^http/", $menus['items'][$id_item]->link)){
                        $html .= "<li><a target='_BLANK' href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a></li>";
                    }else{
                        $html .= "<li><a href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a></li>";
                    }
                }
                if(isset($menus['parents'][$id_item])){
                    if(preg_match("/^http/", $menus['items'][$id_item]->link)){
                        $html .= "<li><a target='_BLANK' href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a>";
                    }else{
                        $html .= "<li><a href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a>";
                    }

                    $html .= Helper::build_menu($id_item, $menus);
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }

    static function toParentName($parent){
        return Menu::findOrfail($parent)->nama_menu;
    }
	static function berita_terbaru(){ 
		return Berita::select('judul_berita','judul_seo')
					 ->where('status', 'YA')
					 ->take(5)
					 ->orderBy('id_berita', 'desc')
					 ->get();
	}
	static function foto_samping(){ 
	if(Storage::disk('local')->exists('foto_samping.json'))
		try {
		   return json_decode(Storage::disk('local')->get('foto_samping.json'));
	  } catch (\Exception $e) {
		   dd($e);
	  }
	  else
		  Storage::put('foto_samping.json', json_encode(["foto" => ""]));
	}
	static function slider(){ return Slider::take(5)->orderBy('id', 'desc')->get();}
	static function judul_seo($text){
            $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
            $text = trim($text, '-');
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            $text = strtolower($text);
            $text = preg_replace('~[^-\w]+~', '', $text);
            if (empty($text))
            {
                return 'n-a';
            }
                return $text;
	}
	static function _user_agen(){
		$u_agent 	= $_SERVER['HTTP_USER_AGENT']; 
		$bname   	= 'Unknown';
		$platform 	= 'Unknown';
		$version 	= "";
		$os_array   =   array(
						'/windows nt 10.0/i'     =>  'Windows 10',
						'/windows nt 6.2/i'     =>  'Windows 8',
						'/windows nt 6.1/i'     =>  'Windows 7',
						'/windows nt 6.0/i'     =>  'Windows Vista',
						'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
						'/windows nt 5.1/i'     =>  'Windows XP',
						'/windows xp/i'         =>  'Windows XP',
						'/windows nt 5.0/i'     =>  'Windows 2000',
						'/windows me/i'         =>  'Windows ME',
						'/win98/i'              =>  'Windows 98',
						'/win95/i'              =>  'Windows 95',
						'/win16/i'              =>  'Windows 3.11',
						'/macintosh|mac os x/i' =>  'Mac OS X',
						'/mac_powerpc/i'        =>  'Mac OS 9',
						'/linux/i'              =>  'Linux',
						'/ubuntu/i'             =>  'Ubuntu',
						'/iphone/i'             =>  'iPhone',
						'/ipod/i'               =>  'iPod',
						'/ipad/i'               =>  'iPad',
						'/android/i'            =>  'Android',
						'/blackberry/i'         =>  'BlackBerry',
						'/webos/i'              =>  'Mobile'
					);
		foreach ($os_array as $regex => $value) { 
			if (preg_match($regex, $u_agent)) {
				$platform    =   $value;
				break;
			}
		}
		// Next get the name of the useragent yes seperately and for good reason
		if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { 
			$bname = 'Internet Explorer'; 
			$ub = "MSIE"; 
		
		} elseif(preg_match('/Firefox/i',$u_agent)) { 
			$bname = 'Mozilla Firefox'; 
			$ub = "Firefox"; 
		
		} elseif(preg_match('/Chrome/i',$u_agent)) { 
			$bname = 'Google Chrome'; 
			$ub = "Chrome"; 
		} elseif (preg_match('/Safari/i',$u_agent)) { 
			$bname = 'Apple Safari'; 
			$ub = "Safari"; 
		} elseif (preg_match('/Opera/i',$u_agent)) { 
			$bname = 'Opera'; 
			$ub = "Opera"; 
		
		} elseif (preg_match('/Netscape/i',$u_agent)) { 
			$bname = 'Netscape'; 
			$ub = "Netscape"; 
		}
		//  finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	   
		if (! preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
				$version= $matches['version'][0];
			
			} else {
				$version= $matches['version'][1];
			}
		} else {
			$version= $matches['version'][0];
		}
		
		// check if we have a number
		$version = ( $version == null || $version == "" ) ? "?" : $version;
		
		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'   => $pattern
		);
		//retrun $bname;
	}
}
?>