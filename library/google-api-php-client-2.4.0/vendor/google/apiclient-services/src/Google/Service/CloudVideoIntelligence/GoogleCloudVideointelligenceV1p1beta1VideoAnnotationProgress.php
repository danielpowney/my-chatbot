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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1VideoAnnotationProgress extends Google_Model
{
  public $feature;
  public $inputUri;
  public $progressPercent;
  protected $segmentType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1VideoSegment';
  protected $segmentDataType = '';
  public $startTime;
  public $updateTime;

  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  public function getFeature()
  {
    return $this->feature;
  }
  public function setInputUri($inputUri)
  {
    $this->inputUri = $inputUri;
  }
  public function getInputUri()
  {
    return $this->inputUri;
  }
  public function setProgressPercent($progressPercent)
  {
    $this->progressPercent = $progressPercent;
  }
  public function getProgressPercent()
  {
    return $this->progressPercent;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1VideoSegment
   */
  public function setSegment(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1VideoSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p1beta1VideoSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
