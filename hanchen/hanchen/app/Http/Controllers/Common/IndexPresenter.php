<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/21
 * Time: 12:14
 */

namespace App\Http\Controllers\Common;

use Illuminate\Pagination\BootstrapThreePresenter;

class IndexPresenter extends BootstrapThreePresenter{

    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pagination">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }
        return '';
    }


    public function getPreviousButton($text = '&laquo;'){

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text, 'prev');
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param string $text
     *
     * @return string
     */
    /*protected function getDisabledTextWrapper($text)
    {
        return '<li><a href="#" class="page_next">上一页</a></li>';
    }*/

    /**
     * Get HTML wrapper for active text.
     *
     * @param string $text
     *
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="active li_1"><a href="#" class="a_tu section">'.$text.'</a></li>';
    }
    
   protected function getAvailablePageWrapper($url, $page, $rel = null)
   {
       $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';
       return '<li class="li_1"><a href="'.htmlentities($url).'"'.$rel.' class="a_tu">'.$page.'</a></li>';
   }


}