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

class Google_Service_DomainsRDAP_Notice extends Google_Collection
{
  protected $collection_key = 'links';
  public $description;
  protected $linksType = 'Google_Service_DomainsRDAP_Link';
  protected $linksDataType = 'array';
  public $title;
  public $type;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_DomainsRDAP_Link
   */
  public function setLinks($links)
  {
    $this->links = $links;
  }
  /**
   * @return Google_Service_DomainsRDAP_Link
   */
  public function getLinks()
  {
    return $this->links;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
