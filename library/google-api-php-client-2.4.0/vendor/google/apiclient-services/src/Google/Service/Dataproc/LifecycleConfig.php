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

class Google_Service_Dataproc_LifecycleConfig extends Google_Model
{
  public $autoDeleteTime;
  public $autoDeleteTtl;
  public $idleDeleteTtl;
  public $idleStartTime;

  public function setAutoDeleteTime($autoDeleteTime)
  {
    $this->autoDeleteTime = $autoDeleteTime;
  }
  public function getAutoDeleteTime()
  {
    return $this->autoDeleteTime;
  }
  public function setAutoDeleteTtl($autoDeleteTtl)
  {
    $this->autoDeleteTtl = $autoDeleteTtl;
  }
  public function getAutoDeleteTtl()
  {
    return $this->autoDeleteTtl;
  }
  public function setIdleDeleteTtl($idleDeleteTtl)
  {
    $this->idleDeleteTtl = $idleDeleteTtl;
  }
  public function getIdleDeleteTtl()
  {
    return $this->idleDeleteTtl;
  }
  public function setIdleStartTime($idleStartTime)
  {
    $this->idleStartTime = $idleStartTime;
  }
  public function getIdleStartTime()
  {
    return $this->idleStartTime;
  }
}
