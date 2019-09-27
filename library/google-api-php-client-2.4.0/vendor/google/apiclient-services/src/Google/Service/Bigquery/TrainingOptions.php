<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Bigquery_TrainingOptions extends Google_Collection
{
  protected $collection_key = 'inputLabelColumns';
  public $dataSplitColumn;
  public $dataSplitEvalFraction;
  public $dataSplitMethod;
  public $distanceType;
  public $earlyStop;
  public $initialLearnRate;
  public $inputLabelColumns;
  public $kmeansInitializationColumn;
  public $kmeansInitializationMethod;
  public $l1Regularization;
  public $l2Regularization;
  public $labelClassWeights;
  public $learnRate;
  public $learnRateStrategy;
  public $lossType;
  public $maxIterations;
  public $minRelativeProgress;
  public $modelUri;
  public $numClusters;
  public $optimizationStrategy;
  public $warmStart;

  public function setDataSplitColumn($dataSplitColumn)
  {
    $this->dataSplitColumn = $dataSplitColumn;
  }
  public function getDataSplitColumn()
  {
    return $this->dataSplitColumn;
  }
  public function setDataSplitEvalFraction($dataSplitEvalFraction)
  {
    $this->dataSplitEvalFraction = $dataSplitEvalFraction;
  }
  public function getDataSplitEvalFraction()
  {
    return $this->dataSplitEvalFraction;
  }
  public function setDataSplitMethod($dataSplitMethod)
  {
    $this->dataSplitMethod = $dataSplitMethod;
  }
  public function getDataSplitMethod()
  {
    return $this->dataSplitMethod;
  }
  public function setDistanceType($distanceType)
  {
    $this->distanceType = $distanceType;
  }
  public function getDistanceType()
  {
    return $this->distanceType;
  }
  public function setEarlyStop($earlyStop)
  {
    $this->earlyStop = $earlyStop;
  }
  public function getEarlyStop()
  {
    return $this->earlyStop;
  }
  public function setInitialLearnRate($initialLearnRate)
  {
    $this->initialLearnRate = $initialLearnRate;
  }
  public function getInitialLearnRate()
  {
    return $this->initialLearnRate;
  }
  public function setInputLabelColumns($inputLabelColumns)
  {
    $this->inputLabelColumns = $inputLabelColumns;
  }
  public function getInputLabelColumns()
  {
    return $this->inputLabelColumns;
  }
  public function setKmeansInitializationColumn($kmeansInitializationColumn)
  {
    $this->kmeansInitializationColumn = $kmeansInitializationColumn;
  }
  public function getKmeansInitializationColumn()
  {
    return $this->kmeansInitializationColumn;
  }
  public function setKmeansInitializationMethod($kmeansInitializationMethod)
  {
    $this->kmeansInitializationMethod = $kmeansInitializationMethod;
  }
  public function getKmeansInitializationMethod()
  {
    return $this->kmeansInitializationMethod;
  }
  public function setL1Regularization($l1Regularization)
  {
    $this->l1Regularization = $l1Regularization;
  }
  public function getL1Regularization()
  {
    return $this->l1Regularization;
  }
  public function setL2Regularization($l2Regularization)
  {
    $this->l2Regularization = $l2Regularization;
  }
  public function getL2Regularization()
  {
    return $this->l2Regularization;
  }
  public function setLabelClassWeights($labelClassWeights)
  {
    $this->labelClassWeights = $labelClassWeights;
  }
  public function getLabelClassWeights()
  {
    return $this->labelClassWeights;
  }
  public function setLearnRate($learnRate)
  {
    $this->learnRate = $learnRate;
  }
  public function getLearnRate()
  {
    return $this->learnRate;
  }
  public function setLearnRateStrategy($learnRateStrategy)
  {
    $this->learnRateStrategy = $learnRateStrategy;
  }
  public function getLearnRateStrategy()
  {
    return $this->learnRateStrategy;
  }
  public function setLossType($lossType)
  {
    $this->lossType = $lossType;
  }
  public function getLossType()
  {
    return $this->lossType;
  }
  public function setMaxIterations($maxIterations)
  {
    $this->maxIterations = $maxIterations;
  }
  public function getMaxIterations()
  {
    return $this->maxIterations;
  }
  public function setMinRelativeProgress($minRelativeProgress)
  {
    $this->minRelativeProgress = $minRelativeProgress;
  }
  public function getMinRelativeProgress()
  {
    return $this->minRelativeProgress;
  }
  public function setModelUri($modelUri)
  {
    $this->modelUri = $modelUri;
  }
  public function getModelUri()
  {
    return $this->modelUri;
  }
  public function setNumClusters($numClusters)
  {
    $this->numClusters = $numClusters;
  }
  public function getNumClusters()
  {
    return $this->numClusters;
  }
  public function setOptimizationStrategy($optimizationStrategy)
  {
    $this->optimizationStrategy = $optimizationStrategy;
  }
  public function getOptimizationStrategy()
  {
    return $this->optimizationStrategy;
  }
  public function setWarmStart($warmStart)
  {
    $this->warmStart = $warmStart;
  }
  public function getWarmStart()
  {
    return $this->warmStart;
  }
}
