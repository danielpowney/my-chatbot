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
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $datasets = $healthcareService->datasets;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasets extends Google_Service_Resource
{
  /**
   * Creates a new health dataset. Results are returned through the Operation
   * interface which returns either an `Operation.response` which contains a
   * Dataset or `Operation.error`. The metadata field type is OperationMetadata. A
   * Google Cloud Platform project can contain up to 500 datasets across all
   * regions. (datasets.create)
   *
   * @param string $parent The name of the project in which the dataset should be
   * created (e.g., `projects/{project_id}/locations/{location_id}`).
   * @param Google_Service_CloudHealthcare_Dataset $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string datasetId The ID of the dataset that is being created. The
   * string must match the following regex: `[\p{L}\p{N}_\-\.]{1,256}`.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function create($parent, Google_Service_CloudHealthcare_Dataset $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Creates a new dataset containing de-identified data from the source dataset.
   * The metadata field type is OperationMetadata. If the request is successful,
   * the response field type is DeidentifySummary. If errors occur, details field
   * type is DeidentifyErrorDetails. (datasets.deidentify)
   *
   * @param string $sourceDataset Source dataset resource name. (e.g.,
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`).
   * @param Google_Service_CloudHealthcare_DeidentifyDatasetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Operation
   */
  public function deidentify($sourceDataset, Google_Service_CloudHealthcare_DeidentifyDatasetRequest $postBody, $optParams = array())
  {
    $params = array('sourceDataset' => $sourceDataset, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', array($params), "Google_Service_CloudHealthcare_Operation");
  }
  /**
   * Deletes the specified health dataset and all data contained in the dataset.
   * Deleting a dataset does not affect the sources from which the dataset was
   * imported (if any). (datasets.delete)
   *
   * @param string $name The name of the dataset to delete (e.g.,
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`).
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
   * Gets any metadata associated with a dataset. (datasets.get)
   *
   * @param string $name The name of the dataset to read (e.g.,
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`).
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Dataset
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_Dataset");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (datasets.getIamPolicy)
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
   * Lists the health datasets in the current project.
   * (datasets.listProjectsLocationsDatasets)
   *
   * @param string $parent The name of the project whose datasets should be listed
   * (e.g., `projects/{project_id}/locations/{location_id}`).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return. Capped to 100
   * if not specified. May not be larger than 1000.
   * @return Google_Service_CloudHealthcare_ListDatasetsResponse
   */
  public function listProjectsLocationsDatasets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListDatasetsResponse");
  }
  /**
   * Updates dataset metadata. (datasets.patch)
   *
   * @param string $name Output only. Resource name of the dataset, of the form
   * `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}`.
   * @param Google_Service_CloudHealthcare_Dataset $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_CloudHealthcare_Dataset
   */
  public function patch($name, Google_Service_CloudHealthcare_Dataset $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_Dataset");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (datasets.setIamPolicy)
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
   * "fail open" without warning. (datasets.testIamPermissions)
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
