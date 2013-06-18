<?php

namespace Vprasanja\View\Helper;
use Zend\View\Helper\AbstractHelper;

class Tab extends AbstractHelper {   
    public function __invoke ($items, $selected) {
        $result = '<ul class="nav nav-tabs">';

        foreach ($items as $item) {
            if ($item['id'] == $selected) {
                $result .= '<li class="active"><a href="'. $item['url'] .'">'. $item['name'] .'</a></li>';
            } else {
                $result .= '<li><a href="'. $item['url'] .'">'. $item['name'] .'</a></li>';
            }
        }

        return $result . '</ul>';
    }
}
