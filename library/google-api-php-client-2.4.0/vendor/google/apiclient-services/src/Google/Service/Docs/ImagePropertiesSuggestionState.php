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

class Google_Service_Docs_ImagePropertiesSuggestionState extends Google_Model
{
  public $angleSuggested;
  public $brightnessSuggested;
  public $contentUriSuggested;
  public $contrastSuggested;
  protected $cropPropertiesSuggestionStateType = 'Google_Service_Docs_CropPropertiesSuggestionState';
  protected $cropPropertiesSuggestionStateDataType = '';
  public $sourceUriSuggested;
  public $transparencySuggested;

  public function setAngleSuggested($angleSuggested)
  {
    $this->angleSuggested = $angleSuggested;
  }
  public function getAngleSuggested()
  {
    return $this->angleSuggested;
  }
  public function setBrightnessSuggested($brightnessSuggested)
  {
    $this->brightnessSuggested = $brightnessSuggested;
  }
  public function getBrightnessSuggested()
  {
    return $this->brightnessSuggested;
  }
  public function setContentUriSuggested($contentUriSuggested)
  {
    $this->contentUriSuggested = $contentUriSuggested;
  }
  public function getContentUriSuggested()
  {
    return $this->contentUriSuggested;
  }
  public function setContrastSuggested($contrastSuggested)
  {
    $this->contrastSuggested = $contrastSuggested;
  }
  public function getContrastSuggested()
  {
    return $this->contrastSuggested;
  }
  /**
   * @param Google_Service_Docs_CropPropertiesSuggestionState
   */
  public function setCropPropertiesSuggestionState(Google_Service_Docs_CropPropertiesSuggestionState $cropPropertiesSuggestionState)
  {
    $this->cropPropertiesSuggestionState = $cropPropertiesSuggestionState;
  }
  /**
   * @return Google_Service_Docs_CropPropertiesSuggestionState
   */
  public function getCropPropertiesSuggestionState()
  {
    return $this->cropPropertiesSuggestionState;
  }
  public function setSourceUriSuggested($sourceUriSuggested)
  {
    $this->sourceUriSuggested = $sourceUriSuggested;
  }
  public function getSourceUriSuggested()
  {
    return $this->sourceUriSuggested;
  }
  public function setTransparencySuggested($transparencySuggested)
  {
    $this->transparencySuggested = $transparencySuggested;
  }
  public function getTransparencySuggested()
  {
    return $this->transparencySuggested;
  }
}
