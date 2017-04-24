<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/21
 * Time: 12:14
 */

namespace App\Http\Controllers\Common;

use Illuminate\Pagination\BootstrapThreePresenter;

class BoolawuiThreePresenter extends BootstrapThreePresenter{

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

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param string $text
     *
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return '';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param string $text
     *
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li><a href="#" class="active">'.$text.'</a></li>';
    }


}