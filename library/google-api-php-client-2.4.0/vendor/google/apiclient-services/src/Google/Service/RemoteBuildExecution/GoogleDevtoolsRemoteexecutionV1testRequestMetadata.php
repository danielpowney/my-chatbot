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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteexecutionV1testRequestMetadata extends Google_Model
{
  public $actionId;
  public $correlatedInvocationsId;
  protected $toolDetailsType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteexecutionV1testToolDetails';
  protected $toolDetailsDataType = '';
  public $toolInvocationId;

  public function setActionId($actionId)
  {
    $this->actionId = $actionId;
  }
  public function getActionId()
  {
    return $this->actionId;
  }
  public function setCorrelatedInvocationsId($correlatedInvocationsId)
  {
    $this->correlatedInvocationsId = $correlatedInvocationsId;
  }
  public function getCorrelatedInvocationsId()
  {
    return $this->correlatedInvocationsId;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteexecutionV1testToolDetails
   */
  public function setToolDetails(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteexecutionV1testToolDetails $toolDetails)
  {
    $this->toolDetails = $toolDetails;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemoteexecutionV1testToolDetails
   */
  public function getToolDetails()
  {
    return $this->toolDetails;
  }
  public function setToolInvocationId($toolInvocationId)
  {
    $this->toolInvocationId = $toolInvocationId;
  }
  public function getToolInvocationId()
  {
    return $this->toolInvocationId;
  }
}
