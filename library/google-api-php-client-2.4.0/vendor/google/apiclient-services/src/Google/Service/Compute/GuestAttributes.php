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

class Google_Service_Compute_GuestAttributes extends Google_Model
{
  public $kind;
  public $queryPath;
  protected $queryValueType = 'Google_Service_Compute_GuestAttributesValue';
  protected $queryValueDataType = '';
  public $selfLink;
  public $variableKey;
  public $variableValue;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setQueryPath($queryPath)
  {
    $this->queryPath = $queryPath;
  }
  public function getQueryPath()
  {
    return $this->queryPath;
  }
  /**
   * @param Google_Service_Compute_GuestAttributesValue
   */
  public function setQueryValue(Google_Service_Compute_GuestAttributesValue $queryValue)
  {
    $this->queryValue = $queryValue;
  }
  /**
   * @return Google_Service_Compute_GuestAttributesValue
   */
  public function getQueryValue()
  {
    return $this->queryValue;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setVariableKey($variableKey)
  {
    $this->variableKey = $variableKey;
  }
  public function getVariableKey()
  {
    return $this->variableKey;
  }
  public function setVariableValue($variableValue)
  {
    $this->variableValue = $variableValue;
  }
  public function getVariableValue()
  {
    return $this->variableValue;
  }
}
