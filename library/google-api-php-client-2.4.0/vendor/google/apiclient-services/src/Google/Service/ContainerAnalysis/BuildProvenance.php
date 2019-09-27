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

class Google_Service_ContainerAnalysis_BuildProvenance extends Google_Collection
{
  protected $collection_key = 'commands';
  public $buildOptions;
  public $builderVersion;
  protected $builtArtifactsType = 'Google_Service_ContainerAnalysis_Artifact';
  protected $builtArtifactsDataType = 'array';
  protected $commandsType = 'Google_Service_ContainerAnalysis_Command';
  protected $commandsDataType = 'array';
  public $createTime;
  public $creator;
  public $finishTime;
  public $id;
  public $logsBucket;
  public $projectId;
  protected $sourceProvenanceType = 'Google_Service_ContainerAnalysis_Source';
  protected $sourceProvenanceDataType = '';
  public $startTime;
  public $triggerId;

  public function setBuildOptions($buildOptions)
  {
    $this->buildOptions = $buildOptions;
  }
  public function getBuildOptions()
  {
    return $this->buildOptions;
  }
  public function setBuilderVersion($builderVersion)
  {
    $this->builderVersion = $builderVersion;
  }
  public function getBuilderVersion()
  {
    return $this->builderVersion;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Artifact
   */
  public function setBuiltArtifacts($builtArtifacts)
  {
    $this->builtArtifacts = $builtArtifacts;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Artifact
   */
  public function getBuiltArtifacts()
  {
    return $this->builtArtifacts;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Command
   */
  public function setCommands($commands)
  {
    $this->commands = $commands;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Command
   */
  public function getCommands()
  {
    return $this->commands;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  public function getCreator()
  {
    return $this->creator;
  }
  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLogsBucket($logsBucket)
  {
    $this->logsBucket = $logsBucket;
  }
  public function getLogsBucket()
  {
    return $this->logsBucket;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Source
   */
  public function setSourceProvenance(Google_Service_ContainerAnalysis_Source $sourceProvenance)
  {
    $this->sourceProvenance = $sourceProvenance;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Source
   */
  public function getSourceProvenance()
  {
    return $this->sourceProvenance;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}
