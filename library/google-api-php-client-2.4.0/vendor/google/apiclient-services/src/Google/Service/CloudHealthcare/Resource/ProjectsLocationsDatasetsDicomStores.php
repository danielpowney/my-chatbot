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
 * The "dicomStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $dicomStores = $healthcareService->dicomStores;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStores extends Google_Service_Resource
{
  /**
   * Creates a new DICOM store within the parent dataset. (dicomStores.create)
   *
   * @param string $parent The name of the dataset this DICOM store belongs to.
   * @param Google_Service_CloudHealthcare_DicomStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dicomStoreId The ID of the DICOM store that is being
   * created. Any string value up to 256 characters in length.
   * @return Google_Service_CloudHealthcare_DicomStore
   */
  public function create($parent, Google_Service_CloudHealthcare_DicomStore $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_DicomStore");
  }
  /**
   * Deletes the specified DICOM store and removes all images that are contained
   * within it. (dicomStores.delete)
   *
   * @param string $name The resource name of the DICOM store to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Exports data to the specified destination by copying it from the DICOM store.
   * The metadata field type is OperationMetadata. (dicomStores.export)
   *
   * @param string $name The DICOM store resource name from which the data should
   * be exported (e.g., `projects/{project_id}/locations/{location_id}/datasets/{d
   * ataset_id}/dicomStores/{dicom_store_id}`).
   * @param Google_Service_CloudHealthcare_ExportDicomDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function export($name, Google_Service_CloudHealthcare_ExportDicomDataRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Gets the specified DICOM store. (dicomStores.get)
   *
   * @param string $name The resource name of the DICOM store to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_DicomStore
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_DicomStore");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (dicomStores.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Acceptable values are 0, 1, and 3. If the value is 0,
   * or the field is omitted, policy format version 1 will be returned.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Imports data into the DICOM store by copying it from the specified source.
   * For errors, the Operation will be populated with error details (in the form
   * of ImportDicomDataErrorDetails in error.details), which will hold finer-
   * grained error information. Errors are also logged to Stackdriver (see
   * [Viewing logs](/healthcare/docs/how-tos/stackdriver-logging)). The metadata
   * field type is OperationMetadata. (dicomStores.import)
   *
   * @param string $name The name of the DICOM store resource into which the data
   * is imported (e.g., `projects/{project_id}/locations/{location_id}/datasets/{d
   * ataset_id}/dicomStores/{dicom_store_id}`).
   * @param Google_Service_CloudHealthcare_ImportDicomDataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function import($name, Google_Service_CloudHealthcare_ImportDicomDataRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Lists the DICOM stores in the given dataset.
   * (dicomStores.listProjectsLocationsDatasetsDicomStores)
   *
   * @param string $parent Name of the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts stores returned to those matching a
   * filter. Syntax:
   * https://cloud.google.com/appengine/docs/standard/python/search/query_strings
   * Only filtering on labels is supported, for example `labels.key=value`.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @opt_param int pageSize Limit on the number of DICOM stores to return in a
   * single response. If zero the default page size of 100 is used.
   * @return Google_Service_CloudHealthcare_ListDicomStoresResponse
   */
  public function listProjectsLocationsDatasetsDicomStores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListDicomStoresResponse");
  }
  /**
   * Updates the specified DICOM store. (dicomStores.patch)
   *
   * @param string $name Output only. Resource name of the DICOM store, of the
   * form `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}/dic
   * omStores/{dicom_store_id}`.
   * @param Google_Service_CloudHealthcare_DicomStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_CloudHealthcare_DicomStore
   */
  public function patch($name, Google_Service_CloudHealthcare_DicomStore $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_DicomStore");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (dicomStores.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudHealthcare_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudHealthcare_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (dicomStores.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudHealthcare_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudHealthcare_TestIamPermissionsResponse");
  }
}
