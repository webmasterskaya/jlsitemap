<?php
/**
 * @package    JLSitemap Package
 * @version    @version@
 * @author     Joomline - joomline.ru
 * @copyright  Copyright (c) 2010 - 2018 Joomline. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://joomline.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Version;

class pkg_jlsitemapInstallerScript
{
	/**
	 * Minimum PHP version required to install the extension
	 *
	 * @var  string
	 *
	 * @since 1.3.1
	 */
	protected $minimumPhp = '5.6';

	/**
	 * Minimum Joomla! version required to install the extension
	 *
	 * @var string
	 *
	 * @since 1.3.1
	 */
	protected $minimumJoomla = '3.9.0';

	/**
	 * Method to check compatible
	 *
	 * @return bool
	 *
	 * @since  1.3.1
	 */
	function preflight()
	{
		// Check old Joomla!
		if (!class_exists('Joomla\CMS\Version'))
		{
			JFactory::getApplication()->enqueueMessage(JText::sprintf('PKG_JLSITEMAP_ERROR_COMPATIBLE_JOOMLA',
				$this->minimumJoomla), 'error');

			return false;
		}

		$app      = Factory::getApplication();
		$jversion = new Version();

		// Check PHP
		if (!(version_compare(PHP_VERSION, $this->minimumPhp) >= 0))
		{
			$app->enqueueMessage(Text::sprintf('PKG_JLSITEMAP_ERROR_COMPATIBLE_PHP',
				$this->minimumPhp), 'error');

			return false;
		}

		// Check joomla version
		if (!$jversion->isCompatible($this->minimumJoomla))
		{
			$app->enqueueMessage(Text::sprintf('PKG_JLSITEMAP_ERROR_COMPATIBLE_JOOMLA',
				$this->minimumJoomla), 'error');

			return false;
		}

		return true;
	}
}