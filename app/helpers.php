<?php

function format_time( $timeString ) {
	$delimiter = '.';
	$dotPos    = $p = 0;

	if ( $p = strpos( $timeString, ',5' ) ) {
		$delimeter = ',';
		$dotPos    = $p;
	}

	if ( $p = strpos( $timeString, '.5' ) ) {
		$delimeter = '.';
		$dotPos    = $p;
	}


	if ( $dotPos > 0 ) {
		$timeString = str_replace( $delimeter . '5', ':30', $timeString );
	} else {
		$timeString .= ':00';
	}


	return $timeString;
}