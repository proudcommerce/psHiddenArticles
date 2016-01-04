<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @copyright (c) Proud Sourcing GmbH | 2016
 * @link www.proudcommerce.com
 * @package psHiddenArticles
 * @version 1.0.1
**/

class pshiddenarticles_oxarticle extends pshiddenarticles_oxarticle_parent
{
    /**
     * Returns part of sql query used in active snippet. Query checks
     * if product "oxactive = 1". If config option "blUseTimeCheck" is TRUE
     * additionally checks if "oxactivefrom < current data < oxactiveto"
     *
     * Additionally checks if the article should be hidden in article lists etc.
     *
     * @param bool $blForceCoreTable force core table usage
     *
     * @return string
     */
    public function getActiveCheckQuery( $blForceCoreTable = null )
    {
        $sTable = $this->getViewName( $blForceCoreTable );
        $sQ = parent::getActiveCheckQuery( $blForceCoreTable );

        // check if article is hidden
        $sQ .= " and $sTable.pshidden = 0 ";

        return $sQ;
    }

}