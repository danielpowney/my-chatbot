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

class Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1SloMetadata extends Google_Collection
{
  protected $collection_key = 'nodes';
  protected $exclusionsType = 'Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1SloExclusion';
  protected $exclusionsDataType = 'array';
  protected $nodesType = 'Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1NodeSloMetadata';
  protected $nodesDataType = 'array';
  public $tier;

  /**
   * @param Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1SloExclusion
   */
  public function setExclusions($exclusions)
  {
    $this->exclusions = $exclusions;
  }
  /**
   * @return Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1SloExclusion
   */
  public function getExclusions()
  {
    return $this->exclusions;
  }
  /**
   * @param Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1NodeSloMetadata
   */
  public function setNodes($nodes)
  {
    $this->nodes = $nodes;
  }
  /**
   * @return Google_Service_CloudFilestore_GoogleCloudSaasacceleratorManagementProvidersV1NodeSloMetadata
   */
  public function getNodes()
  {
    return $this->nodes;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}
