<?php
/* function lcss($a, $b) {
	$lena = strlen($a)+1;
	$lenb = strlen($b)+1;

	$bufrlen = 40;
	
	for ($i=0; $i<$lena; $i++) $lengths[$i] = $i*$lenb;

	for ($i=0,$x=$a; $x; $i++, $x++) {
		for ($j=0,$y=$b; $y; $j++,$y++ ) {
			if ($x == $y) {
				$lengths[$i+1][$j+1] = $lengths[$i][$j] +1;
			}
			else {
				$ml = max($lengths[$i+1][$j], $lengths[$i][$j+1]);
				$lengths[$i+1][$j+1] = $ml;
			}
		}
	}

	$result = $bufr + $bufrlen;
	
	$result--;
	$result = '\0';
	
	$i = $lena-1; $j = $lenb-1;
	while ( ($i>0) && ($j>0) ) {
		if ($lengths[$i][$j] == $lengths[$i-1][$j])  $i -= 1;
		else if ($lengths[$i][$j] == $lengths[$i][$j-1]) $j-= 1;
		else {
			//			assert( a[i-1] == b[j-1]);
			--$result;
			$result = $a[i-1];
			$i-=1; $j-=1;
		}
	}
	
	return strdup($result);
} */

function lcss($a, $b, $out)
{
	$longest = 0;
	function match(char &$a, &$b, $dep) {
		if (!$a || !$b) return 0;
		if (!$a || !$b) {
			if ($dep <= $longest) return 0;
			$out[ $longest = $dep ] = 0;
			return 1;
		}

		if ($a == $b)
			return match($a + 1, $b + 1, $dep + 1) && ($out[$dep] = &$a);

		return	match($a + 1, $b + 1, $dep) +
		match(strchr($a, $b), $b, $dep) +
		match($a, strchr($b, $a), $dep);
	}

	return match(&$a, &$b, 0) ? $out : 0;
}

?>