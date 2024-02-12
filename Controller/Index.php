<?php
/**
 * Index.php
 *
 * @module Email
 * @package Email\Controller
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <info@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace Email\Controller;

use App\Controller;
use Email\DataType\Config;
use MVC\DataType\DTRequestCurrent;
use MVC\DataType\DTRoute;

class Index extends Controller
{
    /**
     * @var \Email\Model\Index
     */
    public $oModelEmail;

    public static function __preconstruct ()
    {
        ;
    }

    /**
     * @throws \ReflectionException
     */
	public function __construct(DTRequestCurrent $oDTRequestCurrent = null, DTRoute $oDTRoute = null)
	{
        $aConfig = \MVC\Config::MODULE('Email');
		$this->oModelEmail = new \Email\Model\Index(
		    Config::create($aConfig)
        );
	}

	/**
	 * Processes the mails to be sent in the spooler folder
	 */
	public function spool()
	{
		return $this->oModelEmail->spool();
	}
	
	/**
	 * Escalation to failed mails
	 */
	public function escalate()
	{
		return $this->oModelEmail->escalate();
	}

    /**
     * deletes older emails and attachments from spooler
     * @return null
     * @throws \ReflectionException
     */
    public function cleanup()
    {
        return $this->oModelEmail->cleanup();
    }

    public function __destruct()
    {
        ;
    }
}
