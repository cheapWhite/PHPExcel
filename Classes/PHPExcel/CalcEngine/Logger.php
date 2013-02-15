<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2012 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Calculation
 * @copyright  Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */

/**
 * PHPExcel_Calculation_Logger
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_CalcEngine_Logger {

	/**
	 * Flag to determine whether a debug log should be generated by the calculation engine
	 *		If true, then a debug log will be generated
	 *		If false, then a debug log will not be generated
	 *
	 * @var boolean
	 *
	 */
	private $_writeDebugLog = FALSE;

	/**
	 * Flag to determine whether a debug log should be echoed by the calculation engine
	 *		If true, then a debug log will be echoed
	 *		If false, then a debug log will not be echoed
	 * A debug log can only be echoed if it is generated
	 *
	 * @var boolean
	 *
	 */
	private $_echoDebugLog = FALSE;


	/**
	 * The debug log generated by the calculation engine
	 *
	 * @var string[]
	 *
	 */
	private $_debugLog = array();


	public function setWriteDebugLog($pValue = FALSE) {
		$this->_writeDebugLog = $pValue;
	}

	public function getWriteDebugLog() {
		return $this->_writeDebugLog;
	}

	public function setEchoDebugLog($pValue = FALSE) {
		$this->_echoDebugLog = $pValue;
	}

	public function getEchoDebugLog() {
		return $this->_echoDebugLog;
	}

	public function writeDebugLog(array $cellReferencePath) {
		//	Only write the debug log if logging is enabled
		if ($this->_writeDebugLog) {
			$message = func_get_args();
			array_shift($message);
			$cellReference = implode(' -> ', $cellReferencePath);
			$message = implode($message);
			if ($this->_echoDebugLog) {
				echo $cellReference, (count($cellReferencePath) > 0 ? ' => ' : ''), $message,PHP_EOL;
			}
			$this->_debugLog[] = $cellReference . (count($cellReferencePath) > 0 ? ' => ' : '') . $message;
		}
	}	//	function _writeDebug()


	public function clearLog() {
		$this->_debugLog = array();
	}	//	function flushLogger()

	public function getLog() {
		return $this->_debugLog;
	}	//	function flushLogger()


}	//	class PHPExcel_Calculation_Logger
