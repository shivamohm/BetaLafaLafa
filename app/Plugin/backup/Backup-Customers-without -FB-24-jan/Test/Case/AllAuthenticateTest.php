<?php
/**
 * All Users Authenticate plugin tests
 *
 * @package       Cake.Test.Case.Controller.Component.Auth
 */
class AllAuthenticateTest extends CakeTestCase {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All customers Authenticate test');

		$path = CakePlugin::path('Customers') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}
}
