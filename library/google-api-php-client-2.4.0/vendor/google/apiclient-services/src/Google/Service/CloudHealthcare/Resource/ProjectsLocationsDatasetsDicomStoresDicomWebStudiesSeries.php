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
 * The "series" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $series = $healthcareService->series;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStoresDicomWebStudiesSeries extends Google_Service_Resource
{
  /**
   * DeleteSeries deletes all instances within the given study and series. Delete
   * requests are equivalent to the GET requests specified in the WADO-RS
   * standard. (series.delete)
   *
   * @param string $parent The name of the DICOM store that is being accessed
   * (e.g., `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/d
   * icomStores/{dicom_store_id}`).
   * @param string $dicomWebPath The path of the DeleteSeries request (e.g.,
   * `studies/{study_id}/series/{series_id}`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * RetrieveSeriesMetadata returns instance associated with the given study and
   * series, presented as metadata with the bulk data removed. See http://dicom.ne
   * ma.org/medical/dicom/current/output/html/part18.html#sect_10.4.
   * (series.metadata)
   *
   * @param string $parent The name of the DICOM store that is being accessed
   * (e.g., `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/d
   * icomStores/{dicom_store_id}`).
   * @param string $dicomWebPath The path of the RetrieveSeriesMetadata DICOMweb
   * request (e.g., `studies/{study_id}/series/{series_id}/metadata`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function metadata($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('metadata', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * RetrieveSeries returns all instances within the given study and series. See h
   * ttp://dicom.nema.org/medical/dicom/current/output/html/part18.html#sect_10.4.
   * (series.retrieveSeries)
   *
   * @param string $parent The name of the DICOM store that is being accessed
   * (e.g., `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/d
   * icomStores/{dicom_store_id}`).
   * @param string $dicomWebPath The path of the RetrieveSeries DICOMweb request
   * (e.g., `studies/{study_id}/series/{series_id}`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveSeries($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveSeries', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * SearchForInstances returns a list of matching instances. See http://dicom.nem
   * a.org/medical/dicom/current/output/html/part18.html#sect_10.6.
   * (series.searchForInstances)
   *
   * @param string $parent The name of the DICOM store that is being accessed
   * (e.g., `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/d
   * icomStores/{dicom_store_id}`).
   * @param string $dicomWebPath The path of the SearchForInstancesRequest
   * DICOMweb request (e.g., `instances` or `series/{series_uid}/instances` or
   * `studies/{study_uid}/instances`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function searchForInstances($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('searchForInstances', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
}
