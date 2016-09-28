<?php

namespace Machine;

use Phpml\Regression\LeastSquares;

require 'vendor/autoload.php';

$samples = [[9300], [10565], [15000], [15000], [17764], [57000], [65940], [73676], [77006], [93739], [146088], [153260]];
$targets = [7100, 15500, 4400, 4400, 5900, 4600, 8800, 2000, 2750, 2550,  960, 1025];

$regression = new LeastSquares();
$regression->train($samples, $targets);


$regression->getCoefficients();
$regression->getIntercept();

$regression->predict([35000]);
