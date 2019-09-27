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

class Google_Service_DataFusion_Instance extends Google_Model
{
  public $createTime;
  public $description;
  public $displayName;
  public $enableStackdriverLogging;
  public $enableStackdriverMonitoring;
  public $labels;
  public $name;
  protected $networkConfigType = 'Google_Service_DataFusion_NetworkConfig';
  protected $networkConfigDataType = '';
  public $options;
  public $privateInstance;
  public $serviceAccount;
  public $serviceEndpoint;
  public $state;
  public $stateMessage;
  public $type;
  public $updateTime;
  public $version;
  public $zone;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnableStackdriverLogging($enableStackdriverLogging)
  {
    $this->enableStackdriverLogging = $enableStackdriverLogging;
  }
  public function getEnableStackdriverLogging()
  {
    return $this->enableStackdriverLogging;
  }
  public function setEnableStackdriverMonitoring($enableStackdriverMonitoring)
  {
    $this->enableStackdriverMonitoring = $enableStackdriverMonitoring;
  }
  public function getEnableStackdriverMonitoring()
  {
    return $this->enableStackdriverMonitoring;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_DataFusion_NetworkConfig
   */
  public function setNetworkConfig(Google_Service_DataFusion_NetworkConfig $networkConfig)
  {
    $this->networkConfig = $networkConfig;
  }
  /**
   * @return Google_Service_DataFusion_NetworkConfig
   */
  public function getNetworkConfig()
  {
    return $this->networkConfig;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setPrivateInstance($privateInstance)
  {
    $this->privateInstance = $privateInstance;
  }
  public function getPrivateInstance()
  {
    return $this->privateInstance;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setServiceEndpoint($serviceEndpoint)
  {
    $this->serviceEndpoint = $serviceEndpoint;
  }
  public function getServiceEndpoint()
  {
    return $this->serviceEndpoint;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateMessage($stateMessage)
  {
    $this->stateMessage = $stateMessage;
  }
  public function getStateMessage()
  {
    return $this->stateMessage;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
