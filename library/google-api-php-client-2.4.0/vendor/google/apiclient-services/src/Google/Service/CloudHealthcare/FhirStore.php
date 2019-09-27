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

class Google_Service_CloudHealthcare_FhirStore extends Google_Collection
{
  protected $collection_key = 'streamConfigs';
  public $disableReferentialIntegrity;
  public $disableResourceVersioning;
  public $enableHistoryImport;
  public $enableUpdateCreate;
  public $labels;
  public $name;
  protected $notificationConfigType = 'Google_Service_CloudHealthcare_NotificationConfig';
  protected $notificationConfigDataType = '';
  protected $streamConfigsType = 'Google_Service_CloudHealthcare_StreamConfig';
  protected $streamConfigsDataType = 'array';
  protected $subscriptionConfigType = 'Google_Service_CloudHealthcare_SubscriptionConfig';
  protected $subscriptionConfigDataType = '';
  protected $validationConfigType = 'Google_Service_CloudHealthcare_ValidationConfig';
  protected $validationConfigDataType = '';

  public function setDisableReferentialIntegrity($disableReferentialIntegrity)
  {
    $this->disableReferentialIntegrity = $disableReferentialIntegrity;
  }
  public function getDisableReferentialIntegrity()
  {
    return $this->disableReferentialIntegrity;
  }
  public function setDisableResourceVersioning($disableResourceVersioning)
  {
    $this->disableResourceVersioning = $disableResourceVersioning;
  }
  public function getDisableResourceVersioning()
  {
    return $this->disableResourceVersioning;
  }
  public function setEnableHistoryImport($enableHistoryImport)
  {
    $this->enableHistoryImport = $enableHistoryImport;
  }
  public function getEnableHistoryImport()
  {
    return $this->enableHistoryImport;
  }
  public function setEnableUpdateCreate($enableUpdateCreate)
  {
    $this->enableUpdateCreate = $enableUpdateCreate;
  }
  public function getEnableUpdateCreate()
  {
    return $this->enableUpdateCreate;
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
   * @param Google_Service_CloudHealthcare_NotificationConfig
   */
  public function setNotificationConfig(Google_Service_CloudHealthcare_NotificationConfig $notificationConfig)
  {
    $this->notificationConfig = $notificationConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_NotificationConfig
   */
  public function getNotificationConfig()
  {
    return $this->notificationConfig;
  }
  /**
   * @param Google_Service_CloudHealthcare_StreamConfig
   */
  public function setStreamConfigs($streamConfigs)
  {
    $this->streamConfigs = $streamConfigs;
  }
  /**
   * @return Google_Service_CloudHealthcare_StreamConfig
   */
  public function getStreamConfigs()
  {
    return $this->streamConfigs;
  }
  /**
   * @param Google_Service_CloudHealthcare_SubscriptionConfig
   */
  public function setSubscriptionConfig(Google_Service_CloudHealthcare_SubscriptionConfig $subscriptionConfig)
  {
    $this->subscriptionConfig = $subscriptionConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_SubscriptionConfig
   */
  public function getSubscriptionConfig()
  {
    return $this->subscriptionConfig;
  }
  /**
   * @param Google_Service_CloudHealthcare_ValidationConfig
   */
  public function setValidationConfig(Google_Service_CloudHealthcare_ValidationConfig $validationConfig)
  {
    $this->validationConfig = $validationConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_ValidationConfig
   */
  public function getValidationConfig()
  {
    return $this->validationConfig;
  }
}
