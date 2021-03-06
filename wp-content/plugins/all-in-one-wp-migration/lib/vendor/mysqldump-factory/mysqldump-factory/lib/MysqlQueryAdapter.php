<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * MysqlQueryAdapter class
 *
 * PHP version 5
 *
 * LICENSE: Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 * of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category  Databases
 * @package   MysqlDumpFactory
 * @author    Yani Iliev <yani@iliev.me>
 * @author    Bobby Angelov <bobby@servmask.com>
 * @copyright 2014 Yani Iliev, Bobby Angelov
 * @license   https://raw.github.com/yani-/mysqldump-factory/master/LICENSE The MIT License (MIT)
 * @version   GIT: 2.2.0
 * @link      https://github.com/yani-/mysqldump-factory/
 */

/**
 * MysqlQueryAdapter class
 *
 * @category  Databases
 * @package   MysqlDumpFactory
 * @author    Yani Iliev <yani@iliev.me>
 * @author    Bobby Angelov <bobby@servmask.com>
 * @copyright 2014 Yani Iliev, Bobby Angelov
 * @license   https://raw.github.com/yani-/mysqldump-factory/master/LICENSE The MIT License (MIT)
 * @version   GIT: 2.2.0
 * @link      https://github.com/yani-/mysqldump-factory/
 */
class MysqlQueryAdapter
{
	public function __construct($type)
	{
		$this->type = $type;
	}

	public function set_names($encoding = 'utf8')
	{
		return "SET NAMES '$encoding'";
	}

	public function set_foreign_key($enabled = 0)
	{
		return "SET FOREIGN_KEY_CHECKS = $enabled";
	}

	public function show_create_table($tableName)
	{
		return "SHOW CREATE TABLE `$tableName`";
	}

	public function drop_table($tableName)
	{
		return "DROP TABLE IF EXISTS `$tableName`";
	}

	public function show_tables($databaseName)
	{
		return "SHOW TABLES FROM `$databaseName`";
	}

	public function show_views($databaseName) {
		return "SHOW FULL TABLES FROM `$databaseName` WHERE TABLE_TYPE = 'VIEW'";
	}

	public function show_tables_information_schema($databaseName) {
		return "SELECT TABLE_NAME AS table_name FROM `INFORMATION_SCHEMA`.`TABLES` WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$databaseName'";
	}

	public function show_views_information_schema($databaseName)
	{
		return "SELECT VIEW_NAME AS view_name FROM `INFORMATION_SCHEMA`.`TABLES` WHERE TABLE_TYPE = 'VIEW' AND TABLE_SCHEMA = '$databaseName'";
	}

	public function start_transaction()
	{
		return "START TRANSACTION";
	}

	public function commit_transaction()
	{
		return "COMMIT";
	}

	public function rollback_transaction()
	{
		return "ROLLBACK";
	}

	public function lock_table_read($tableName)
	{
		return "LOCK TABLES `$tableName` READ";
	}

	public function lock_table_write($tableName)
	{
		return "LOCK TABLES `$tableName` WRITE";
	}

	public function unlock_tables()
	{
		return "UNLOCK TABLES";
	}
}
