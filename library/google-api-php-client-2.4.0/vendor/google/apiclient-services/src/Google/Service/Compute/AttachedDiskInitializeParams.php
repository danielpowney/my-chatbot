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

class Google_Service_Compute_AttachedDiskInitializeParams extends Google_Collection
{
  protected $collection_key = 'resourcePolicies';
  public $description;
  public $diskName;
  public $diskSizeGb;
  public $diskType;
  public $labels;
  public $resourcePolicies;
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $sourceImageEncryptionKeyDataType = '';
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $sourceSnapshotEncryptionKeyDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDiskName($diskName)
  {
    $this->diskName = $diskName;
  }
  public function getDiskName()
  {
    return $this->diskName;
  }
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  public function getDiskType()
  {
    return $this->diskType;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setResourcePolicies($resourcePolicies)
  {
    $this->resourcePolicies = $resourcePolicies;
  }
  public function getResourcePolicies()
  {
    return $this->resourcePolicies;
  }
  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }
  public function getSourceImage()
  {
    return $this->sourceImage;
  }
  /**
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceImageEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceImageEncryptionKey)
  {
    $this->sourceImageEncryptionKey = $sourceImageEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
   */
  public function getSourceImageEncryptionKey()
  {
    return $this->sourceImageEncryptionKey;
  }
  public function setSourceSnapshot($sourceSnapshot)
  {
    $this->sourceSnapshot = $sourceSnapshot;
  }
  public function getSourceSnapshot()
  {
    return $this->sourceSnapshot;
  }
  /**
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceSnapshotEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceSnapshotEncryptionKey)
  {
    $this->sourceSnapshotEncryptionKey = $sourceSnapshotEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
   */
  public function getSourceSnapshotEncryptionKey()
  {
    return $this->sourceSnapshotEncryptionKey;
  }
}
