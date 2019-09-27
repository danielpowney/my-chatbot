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
 * The "availableProjects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google_Service_FirebaseManagement(...);
 *   $availableProjects = $firebaseService->availableProjects;
 *  </code>
 */
class Google_Service_FirebaseManagement_Resource_AvailableProjects extends Google_Service_Resource
{
  /**
   * Returns a list of [Google Cloud Platform (GCP) `Projects`]
   * (https://cloud.google.com/resource-manager/reference/rest/v1/projects) that
   * are available to have Firebase resources added to them.
   *
   * A GCP `Project` will only be returned if:
   *
   *   The caller has sufficient          [Google
   * IAM](https://cloud.google.com/iam) permissions to call          AddFirebase.
   * The GCP `Project` is not already a FirebaseProject.   The GCP `Project` is
   * not in an Organization which has policies          that prevent Firebase
   * resources from being added.  (availableProjects.listAvailableProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token returned from a previous call to
   * `ListAvailableProjects` indicating where in the set of GCP `Projects` to
   * resume listing.
   * @opt_param int pageSize The maximum number of GCP `Projects` to return in the
   * response.
   *
   * The server may return fewer than this value at its discretion. If no value is
   * specified (or too large a value is specified), the server will impose its own
   * limit.
   *
   * This value cannot be negative.
   * @return Google_Service_FirebaseManagement_ListAvailableProjectsResponse
   */
  public function listAvailableProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseManagement_ListAvailableProjectsResponse");
  }
}
