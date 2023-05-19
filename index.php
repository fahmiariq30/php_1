<?php
$data = <<<'EOD'
X,-9\\\10\100\-5\\\0\\\\,A
Y,\\13\\1\, B
Z,\\\5\\\-3\\2\\\800,C
EOD;

		$rows = explode("\n", $data);
		$result = [];

		foreach ($rows as $r) {
    		$a = explode(',', $r);

    		 $var1 = $a[0];
   			 $var2 = trim($a[2]);
    		 $int = preg_split('/\\\\+/', $a[1]);
			 
    	foreach ($int as $number) {
        if (is_numeric($number)) {
            $result[] = [$var1, (int)$number, $var2];
        }
    }
}
		usort($result, function ($a, $b) {
    		return $a[1] <=> $b[1];});

		$run = [];
		foreach ($result as &$res) {
   		 if (!isset($run[$res[0]])) {
    	 $run[$res[0]] = 0; }
    	 $run[$res[0]]++;
    	 $res[] = $run[$res[0]];
}
		
		foreach ($result as $res) {
    		echo implode(', ', $res) . "\n";
    		echo '<br>';
}

?>