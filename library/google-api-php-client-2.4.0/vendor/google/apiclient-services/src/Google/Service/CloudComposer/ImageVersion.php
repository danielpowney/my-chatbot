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

class Google_Service_CloudComposer_ImageVersion extends Google_Collection
{
  protected $collection_key = 'supportedPythonVersions';
  public $imageVersionId;
  public $isDefault;
  public $supportedPythonVersions;

  public function setImageVersionId($imageVersionId)
  {
    $this->imageVersionId = $imageVersionId;
  }
  public function getImageVersionId()
  {
    return $this->imageVersionId;
  }
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  public function setSupportedPythonVersions($supportedPythonVersions)
  {
    $this->supportedPythonVersions = $supportedPythonVersions;
  }
  public function getSupportedPythonVersions()
  {
    return $this->supportedPythonVersions;
  }
}
