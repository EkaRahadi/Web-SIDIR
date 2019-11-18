<?php
namespace App\Console;
class Helper{
    static function main_menu(){
        $menu = \App\Menu::where('status', 'a')
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
        return \app\Menu::findOrfail($parent)->nama_menu;
    }
}
?>