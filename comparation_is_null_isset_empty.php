<!DOCTYPE html>
<html>
<head>
<title>Comparation is_null() vs isset() vs empty() vs isEmpty()</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="comparation.css" type="text/css">
</head>
<body>
<?php
$null = null;
$emptyString = '';
$false = false;
$emptyArray = [];
$zeroString = '0';
$zero = 0;
$minusOne = -1;
$one = 1;
$minusOneString = '-1';
$oneString = '1';
$nonEmptyArray = ['hello', 'world'];
$emptyx8F = '\x8F'; //Outputs an empty string unicoide
$emptyhex = '&#0';  //Outputs an empty string hex
$true = true;
$space = ' ';
$text = 'some text';
$hack = "); /*";

function test_input($data) {
	if(is_array($input)) {
		$data = trim($data);
		$data = htmlentities($data, ENT_QUOTES | ENT_IGNORE, "UTF-8");
	}
	$search = array("%", chr(92), chr(96)); //92 "\", 96 "`"
	$replace = array("&#37;", "&#92;", "&#96;");
	$data = str_replace($search, $replace, $data);
	return $data;
}

function isEmpty(&$value) {
	if ($value === 0 || $value === '0') {
		return false;
	}
	return !$value;
}
?>
<div id="version"><b>PHP Version: <?php echo phpversion(); ?></b></div>
<h1>Comparation is_null() vs isset() vs empty()</h1>
<table border="1px">
	<thead>
		<tr>
			<th>Value</th>
			<th>gettype()</th>
			<th>is_null()</th>
			<th>isset()</th>
			<th>empty()</th>
			<th>isEmpty() <sub>(1)</sub></th>
			<th>if ()</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="left">undefined</td>
			<td><?php echo gettype($undefined) ?></td>
			<?php echo is_null($undefined) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($undefined) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($undefined) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($undefined) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $undefined ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">null</td>
			<td><?php echo gettype($null) ?></td>
			<?php echo is_null($null) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($null) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($null) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($null) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $null ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">''</td>
			<td><?php echo gettype($emptyString) ?></td>
			<?php echo is_null($emptyString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($emptyString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($emptyString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($emptyString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $emptyString ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">false</td>
			<td><?php echo gettype($false) ?></td>
			<?php echo is_null($false) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($false) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($false) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($false) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $false ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">[]</td>
			<td><?php echo gettype($emptyArray) ?></td>
			<?php echo is_null($emptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($emptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($emptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($emptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $emptyArray ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">'0'</td>
			<td><?php echo gettype($zeroString) ?></td>
			<?php echo is_null($zeroString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($zeroString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($zeroString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($zeroString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $zeroString ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">0</td>
			<td><?php echo gettype($zero) ?></td>
			<?php echo is_null($zero) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($zero) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($zero) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($zero) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $zero ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">-1</td>
			<td><?php echo gettype($minusOne) ?></td>
			<?php echo is_null($minusOne) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($minusOne) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($minusOne) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($minusOne) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $minusOne ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">1</td>
			<td><?php echo gettype($one) ?></td>
			<?php echo is_null($one) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($one) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($one) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($one) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $one ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">'-1'</td>
			<td><?php echo gettype($minusOneString) ?></td>
			<?php echo is_null($minusOneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($minusOneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($minusOneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($minusOneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $minusOneString ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">'1'</td>
			<td><?php echo gettype($oneString) ?></td>
			<?php echo is_null($oneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($oneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($oneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($oneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $oneString ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">['hello', 'world']</td>
			<td><?php echo gettype($nonEmptyArray) ?></td>
			<?php echo is_null($nonEmptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($nonEmptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($nonEmptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($nonEmptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $nonEmptyArray ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">\x8F</td>
			<td><?php echo gettype($emptyx8F) ?></td>
			<?php echo is_null($emptyx8F) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($emptyx8F) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($emptyx8F) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($emptyx8F) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $emptyx8F ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">&amp;#x0;</td>
			<td><?php echo gettype($emptyhex) ?></td>
			<?php echo is_null($emptyhex) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($emptyhex) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($emptyhex) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($emptyhex) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $emptyhex ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">true</td>
			<td><?php echo gettype($true) ?></td>
			<?php echo is_null($true) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($true) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($true) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($true) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $true ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">space</td>
			<td><?php echo gettype($space) ?></td>
			<?php echo is_null($space) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($space) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($space) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($space) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $space ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">'some text'</td>
			<td><?php echo gettype($text) ?></td>
			<?php echo is_null($text) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($text) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($text) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($text) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $text ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
		<tr>
			<td class="left">hack text</td>
			<td><?php echo gettype($hack) ?></td>
			<?php echo is_null($hack) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isset($hack) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty($hack) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo isEmpty($hack) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo $hack ? '<td class="true">true' : '<td class="false">false'; ?></td>
		</tr>
	</tbody>
</table>
<p><b>Note: <span id="note">(1)</span></b> isEmpty() it is a function where 0 and “0” are considered not empty.</p>
<table border="1px">
	<thead>
		<tr>
			<th>Value</th>
			<th>test_input()</th>
			<th>is_null(test_input())</th>
			<th>empty(test_input())</th>
			<th>isset(test_input())</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="left">undefined</td>
			<td><?php echo test_input($undefined) ?></td>
			<?php echo test_input($undefined) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($undefined)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($undefined)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">null</td>
			<td><?php echo test_input($null) ?></td>
			<?php echo test_input($null) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($null)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($null)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">''</td>
			<td><?php echo test_input($emptyString) ?></td>
			<?php echo test_input($emptyString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($emptyString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($emptyString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">[]</td>
			<td><?php echo test_input($emptyArray) ?></td>
			<?php echo test_input($emptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($emptyArray)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($emptyArray)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">false</td>
			<td><?php echo test_input($false) ?></td>
			<?php echo test_input($false) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($false)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($false)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">'0'</td>
			<td><?php echo test_input($zeroString) ?></td>
			<?php echo test_input($zeroString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($zeroString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($zeroString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">0</td>
			<td><?php echo test_input($zero) ?></td>
			<?php echo test_input($zero) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($zero)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($zero)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">-1</td>
			<td><?php echo test_input($minusOne) ?></td>
			<?php echo test_input($minusOne) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($minusOne)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($minusOne)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">1</td>
			<td><?php echo test_input($minusOneString) ?></td>
			<?php echo test_input($one) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($one)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($one)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">'-1'</td>
			<td><?php echo test_input($minusOneString) ?></td>
			<?php echo test_input($minusOneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($minusOneString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($minusOneString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">'1'</td>
			<td><?php echo test_input($oneString) ?></td>
			<?php echo test_input($oneString) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($oneString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($oneString)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">['hello', 'world']</td>
			<td><?php echo test_input($nonEmptyArray) ?></td>
			<?php echo test_input($nonEmptyArray) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($nonEmptyArray)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($nonEmptyArray)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">\x8F</td>
			<td><?php echo test_input($emptyx8F) ?></td>
			<?php echo test_input($emptyx8F) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($emptyx8F)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($emptyx8F)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">&amp;#x0;</td>
			<td><?php echo test_input($emptyhex) ?></td>
			<?php echo test_input($emptyhex) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($emptyhex)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($emptyhex)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">true</td>
			<td><?php echo test_input($true) ?></td>
			<?php echo test_input($true) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($true)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($true)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">space</td>
			<td><?php echo test_input($space) ?></td>
			<?php echo test_input($space) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($space)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($space)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">'some text'</td>
			<td><?php echo test_input($text) ?></td>
			<?php echo test_input($text) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($text)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($text)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
		<tr>
			<td class="left">hack</td>
			<td><?php echo test_input($hack) ?></td>
			<?php echo test_input($hack) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo is_null(test_input($hack)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<?php echo empty(test_input($hack)) ? '<td class="true">true' : '<td class="false">false'; ?></td>
			<td>PHP Fatal error:  Cannot use isset() on the result of an expression</td>
		</tr>
</table>
</tbody>
</body>
</html>