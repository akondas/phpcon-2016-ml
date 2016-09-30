<?php

namespace Machine;

use Phpml\Classification\SVC;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\Dataset\CsvDataset;
use Phpml\Metric\Accuracy;
use Phpml\SupportVectorMachine\Kernel;

require 'vendor/autoload.php';

$dataset = new CsvDataset('examples/beers-score.csv', 3);
$split = new StratifiedRandomSplit($dataset, 0.1);

$classifier = new SVC(Kernel::RBF);
$classifier->train($split->getTrainSamples(), $split->getTrainLabels());

$predicted = $classifier->predict($split->getTestSamples());

echo sprintf("Accuracy: %s\n", Accuracy::score($split->getTestLabels(), $predicted));

$newBeer = [20, 2.5, 7];

echo sprintf("New beer score: %s\n", $classifier->predict($newBeer));
