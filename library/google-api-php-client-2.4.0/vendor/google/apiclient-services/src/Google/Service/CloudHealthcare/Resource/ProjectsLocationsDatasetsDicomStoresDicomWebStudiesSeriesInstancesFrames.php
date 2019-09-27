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

/**
 * The "frames" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $frames = $healthcareService->frames;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStoresDicomWebStudiesSeriesInstancesFrames extends Google_Service_Resource
{
  /**
   * RetrieveRenderedFrames returns instances associated with the given study,
   * series, SOP Instance UID and frame numbers in an acceptable Rendered Media
   * Type. See http://dicom.nema.org/medical/dicom/current/output/html/part18.html
   * #sect_10.4. (frames.rendered)
   *
   * @param string $parent The name of the DICOM store that is being accessed
   * (e.g., `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/d
   * icomStores/{dicom_store_id}`).
   * @param string $dicomWebPath The path of the RetrieveRenderedFrames DICOMweb
   * request (e.g., `studies/{study_id}/series/{series_id}/instances/{instance_id}
   * /frames/{frame_list}/rendered`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function rendered($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('rendered', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * RetrieveFrames returns instances associated with the given study, series, SOP
   * Instance UID and frame numbers. See http://dicom.nema.org/medical/dicom/curre
   * nt/output/html/part18.html#sect_10.4. (frames.retrieveFrames)
   *
   * @param string $parent The name of the DICOM store that is being accessed
   * (e.g., `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/d
   * icomStores/{dicom_store_id}`).
   * @param string $dicomWebPath The path of the RetrieveFrames DICOMweb request
   * (e.g., `studies/{study_id}/series/{series_id}/instances/{instance_id}/frames/
   * {frame_list}`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveFrames($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveFrames', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
}
