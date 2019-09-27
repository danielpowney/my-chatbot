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

class Google_Service_SecurityCommandCenter_SecurityCenterProperties extends Google_Collection
{
  protected $collection_key = 'resourceOwners';
  public $resourceName;
  public $resourceOwners;
  public $resourceParent;
  public $resourceProject;
  public $resourceType;

  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setResourceOwners($resourceOwners)
  {
    $this->resourceOwners = $resourceOwners;
  }
  public function getResourceOwners()
  {
    return $this->resourceOwners;
  }
  public function setResourceParent($resourceParent)
  {
    $this->resourceParent = $resourceParent;
  }
  public function getResourceParent()
  {
    return $this->resourceParent;
  }
  public function setResourceProject($resourceProject)
  {
    $this->resourceProject = $resourceProject;
  }
  public function getResourceProject()
  {
    return $this->resourceProject;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
}
