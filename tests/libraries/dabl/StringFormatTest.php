<?php

/**
 * Test class for StringFormat.
 */
class StringFormatTest extends PHPUnit_Framework_TestCase {

	public function testClassName() {
		$this->assertEquals(StringFormat::className('myClassName'), 'MyClassName');
		$this->assertEquals(StringFormat::className('my-class-name'), 'MyClassName');
		$this->assertEquals(StringFormat::className('my Class name'), 'MyClassName');
		$this->assertEquals(StringFormat::className('my %^&* Class name'), 'MyClassName');
		$this->assertEquals(StringFormat::className('my____Class name'), 'MyClassName');
		$this->assertEquals(StringFormat::className('my/Class name'), 'MyClassName');
	}

	public function testClassMethod() {
		$this->assertEquals(StringFormat::classMethod('myClassMethod'), 'myClassMethod');
		$this->assertEquals(StringFormat::classMethod('my-class-Method'), 'myClassMethod');
		$this->assertEquals(StringFormat::classMethod('my Class Method'), 'myClassMethod');
		$this->assertEquals(StringFormat::classMethod('my %^&* Class Method'), 'myClassMethod');
		$this->assertEquals(StringFormat::classMethod('my____Class Method'), 'myClassMethod');
		$this->assertEquals(StringFormat::classMethod('my/Class Method'), 'myClassMethod');
	}

	public function testClassProperty() {
		$this->assertEquals(StringFormat::classProperty('myClassProperty'), 'myClassProperty');
		$this->assertEquals(StringFormat::classProperty('my-class-Property'), 'myClassProperty');
		$this->assertEquals(StringFormat::classProperty('my Class Property'), 'myClassProperty');
		$this->assertEquals(StringFormat::classProperty('my %^&* Class Property'), 'myClassProperty');
		$this->assertEquals(StringFormat::classProperty('my____Class Property'), 'myClassProperty');
		$this->assertEquals(StringFormat::classProperty('my/Class Property'), 'myClassProperty');
	}

	public function testUrl() {
		$this->assertEquals(StringFormat::URL('myURL'), 'my-url');
		$this->assertEquals(StringFormat::URL('my--URL'), 'my-url');
		$this->assertEquals(StringFormat::URL('my  URL'), 'my-url');
		$this->assertEquals(StringFormat::URL('my %^&*  URL'), 'my-url');
		$this->assertEquals(StringFormat::URL('my____ URL--'), 'my-url');
		$this->assertEquals(StringFormat::URL('my/ \URL'), 'my-url');
	}

	public function testPluralURL() {
		$this->assertEquals(StringFormat::pluralURL('myURL'), 'my-urls');
		$this->assertEquals(StringFormat::pluralURL('my--URL'), 'my-urls');
		$this->assertEquals(StringFormat::pluralURL('my  URL'), 'my-urls');
		$this->assertEquals(StringFormat::pluralURL('my %^&*  URL'), 'my-urls');
		$this->assertEquals(StringFormat::pluralURL('my____ URL--'), 'my-urls');
		$this->assertEquals(StringFormat::pluralURL('my/ \URL'), 'my-urls');
	}

	public function testVariable() {
		$this->assertEquals(StringFormat::variable('myVar'), 'my_var');
		$this->assertEquals(StringFormat::variable('my--var'), 'my_var');
		$this->assertEquals(StringFormat::variable('my  var'), 'my_var');
		$this->assertEquals(StringFormat::variable('my %^&*  var'), 'my_var');
		$this->assertEquals(StringFormat::variable('my____ var--'), 'my_var');
		$this->assertEquals(StringFormat::variable('my/ \var'), 'my_var');
	}

	public function testConstant() {
		$this->assertEquals(StringFormat::constant('myConstant'), 'MY_CONSTANT');
		$this->assertEquals(StringFormat::constant('my--constant'), 'MY_CONSTANT');
		$this->assertEquals(StringFormat::constant('my  constant'), 'MY_CONSTANT');
		$this->assertEquals(StringFormat::constant('my %^&*  constant'), 'MY_CONSTANT');
		$this->assertEquals(StringFormat::constant('my____ constant--'), 'MY_CONSTANT');
		$this->assertEquals(StringFormat::constant('my/ \constant'), 'MY_CONSTANT');
	}

	public function testPluralVariable() {
		$this->assertEquals(StringFormat::pluralVariable('myVar'), 'my_vars');
		$this->assertEquals(StringFormat::pluralVariable('my--var'), 'my_vars');
		$this->assertEquals(StringFormat::pluralVariable('my  var'), 'my_vars');
		$this->assertEquals(StringFormat::pluralVariable('my %^&*  var'), 'my_vars');
		$this->assertEquals(StringFormat::pluralVariable('my____ var--'), 'my_vars');
		$this->assertEquals(StringFormat::pluralVariable('my/ \var'), 'my_vars');
	}

	public function testTitleCase() {
		$this->assertEquals(StringFormat::titleCase('title case'), 'TitleCase');
		$this->assertEquals(StringFormat::titleCase('Title_case'), 'TitleCase');
		$this->assertEquals(StringFormat::titleCase('TitleCase'), 'TitleCase');
		$this->assertEquals(StringFormat::titleCase('Title\Case', '-'), 'Title\Case');
		$this->assertEquals(StringFormat::titleCase('TitleCase', '_'), 'Title_Case');
	}

	public function testGetWords() {
		$this->assertEquals(StringFormat::getWords('test case'), array('test', 'case'));
		$this->assertEquals(StringFormat::getWords('testCase'), array('test', 'Case'));
		$this->assertEquals(StringFormat::getWords('test_case'), array('test', 'case'));
		$this->assertEquals(StringFormat::getWords('test-case'), array('test', 'case'));
	}

	public function testPlural() {
		$this->assertEquals(StringFormat::plural('test-case'), 'test-cases');
		$this->assertEquals(StringFormat::plural('x-man'), 'x-men');
		$this->assertEquals(StringFormat::plural('test-quiz'), 'test-quizzes');
		$this->assertEquals(StringFormat::plural('test-ox'), 'test-oxen');
		$this->assertEquals(StringFormat::plural('test-mouse'), 'test-mice');
		$this->assertEquals(StringFormat::plural('test-vertex'), 'test-vertices');
		$this->assertEquals(StringFormat::plural('test-mess'), 'test-messes');
		$this->assertEquals(StringFormat::plural('test-max'), 'test-maxes');
		$this->assertEquals(StringFormat::plural('test-marty'), 'test-marties');
		$this->assertEquals(StringFormat::plural('test hive'), 'test hives');
		$this->assertEquals(StringFormat::plural('test half'), 'test halves');
		$this->assertEquals(StringFormat::plural('test calf'), 'test calves');
		$this->assertEquals(StringFormat::plural('test crisis'), 'test crises');
		$this->assertEquals(StringFormat::plural('test titanium'), 'test titania');
		$this->assertEquals(StringFormat::plural('test tomotato'), 'test tomotatos');
//			array('/(bu)s$/i', "$1ses"),
//			array('/(alias|status|campus)$/i', "$1es"),
//			array('/(octop|cact|vir)us$/i', "$1i"),
//			array('/(ax|test)is$/i', "$1es"),
//			array('/^(m|wom)an$/i', "$1en"),
//			array('/(child)$/i', "$1ren"),
//			array('/(p)erson$/i', "$1eople"),
//			array('/s$/i', "s"),
//			array('/$/', "s")
	}

	/**
	 * @todo Implement testRemoveAccents().
	 */
	public function testRemoveAccents() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @todo Implement testClean().
	 */
	public function testClean() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

}