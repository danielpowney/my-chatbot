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

class Google_Service_ServiceConsumerManagement_V1ServiceAccount extends Google_Model
{
  public $email;
  public $iamAccountName;
  public $name;
  public $tag;
  public $uniqueId;

  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setIamAccountName($iamAccountName)
  {
    $this->iamAccountName = $iamAccountName;
  }
  public function getIamAccountName()
  {
    return $this->iamAccountName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setUniqueId($uniqueId)
  {
    $this->uniqueId = $uniqueId;
  }
  public function getUniqueId()
  {
    return $this->uniqueId;
  }
}
