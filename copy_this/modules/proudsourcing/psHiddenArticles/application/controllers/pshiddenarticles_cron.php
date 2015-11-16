<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @copyright (c) Proud Sourcing GmbH | 2015
 * @link www.proudcommerce.com
 * @package psHiddenArticles
 * @version 1.0.0
**/

class pshiddenarticless_cron extends oxUBase
{

    protected $_debug = false;

    /**
     * Standard render function
     */
    public function render()
    {
        parent::render();
        $this->_debug = oxRegistry::getConfig()->getRequestParameter("debug");
        $this->setArticlesHidden();
        $this->setArticlesVisible();
        // do not return template name, just die...
        exit;
    }

    /**
     * Hide all articles without stock by setting custom flag
     */
    public function setArticlesHidden()
    {
        $sTable = getViewName("oxarticles");
        // get all articles without stock
        $sQ = "SELECT oxid FROM $sTable WHERE oxactive = 1 AND oxstockflag=2 AND (oxstock < 1 AND (oxvarcount = 0 OR (oxvarcount > 0 and oxvarstock < 1)))";
        $rs = oxDb::getDb()->execute($sQ);
        if ($rs != false && $rs->recordCount() > 0) {
            while (!$rs->EOF) {
                $sSql = 'UPDATE oxarticles SET pshidden = "1", oxstockflag = 3 WHERE oxid = "'.$rs->fields[0].'"';
                if($this->_debug) {
                    echo "<br>SQL: $sSql";
                } else {
                    oxDb::getDb()->Execute($sSql);
                }
                $rs->moveNext();
            }
        }
    }

    /**
     * Hide all articles without stock by setting custom flag
     */
    public function setArticlesVisible()
    {
        $sSql = 'UPDATE oxarticles SET pshidden = "0" WHERE oxactive = 1 AND pshidden = 1 AND (oxstock > 0 OR oxvarstock > 0)';
        if($this->_debug) {
            echo "<br>SQL: $sSql";
        } else {
            oxDb::getDb()->Execute($sSql);
        }
    }
}