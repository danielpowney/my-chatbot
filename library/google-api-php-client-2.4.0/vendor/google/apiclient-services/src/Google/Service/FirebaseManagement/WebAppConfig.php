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

class Google_Service_FirebaseManagement_WebAppConfig extends Google_Model
{
  public $apiKey;
  public $appId;
  public $authDomain;
  public $databaseURL;
  public $locationId;
  public $messagingSenderId;
  public $projectId;
  public $storageBucket;

  public function setApiKey($apiKey)
  {
    $this->apiKey = $apiKey;
  }
  public function getApiKey()
  {
    return $this->apiKey;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setAuthDomain($authDomain)
  {
    $this->authDomain = $authDomain;
  }
  public function getAuthDomain()
  {
    return $this->authDomain;
  }
  public function setDatabaseURL($databaseURL)
  {
    $this->databaseURL = $databaseURL;
  }
  public function getDatabaseURL()
  {
    return $this->databaseURL;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setMessagingSenderId($messagingSenderId)
  {
    $this->messagingSenderId = $messagingSenderId;
  }
  public function getMessagingSenderId()
  {
    return $this->messagingSenderId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setStorageBucket($storageBucket)
  {
    $this->storageBucket = $storageBucket;
  }
  public function getStorageBucket()
  {
    return $this->storageBucket;
  }
}
