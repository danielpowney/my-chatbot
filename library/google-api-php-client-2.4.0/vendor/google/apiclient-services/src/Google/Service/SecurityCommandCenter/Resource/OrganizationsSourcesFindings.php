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
 * The "findings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google_Service_SecurityCommandCenter(...);
 *   $findings = $securitycenterService->findings;
 *  </code>
 */
class Google_Service_SecurityCommandCenter_Resource_OrganizationsSourcesFindings extends Google_Service_Resource
{
  /**
   * Creates a finding. The corresponding source must exist for finding creation
   * to succeed. (findings.create)
   *
   * @param string $parent Resource name of the new finding's parent. Its format
   * should be "organizations/[organization_id]/sources/[source_id]".
   * @param Google_Service_SecurityCommandCenter_Finding $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string findingId Unique identifier provided by the client within
   * the parent scope. It must be alphanumeric and less than or equal to 32
   * characters and greater than 0 characters in length.
   * @return Google_Service_SecurityCommandCenter_Finding
   */
  public function create($parent, Google_Service_SecurityCommandCenter_Finding $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_SecurityCommandCenter_Finding");
  }
  /**
   * Filters an organization or source's findings and  groups them by their
   * specified properties.
   *
   * To group across all sources provide a `-` as the source id. Example:
   * /v1/organizations/123/sources/-/findings (findings.group)
   *
   * @param string $parent Name of the source to groupBy. Its format is
   * "organizations/[organization_id]/sources/[source_id]". To groupBy across all
   * sources provide a source_id of `-`. For example: organizations/123/sources/-
   * @param Google_Service_SecurityCommandCenter_GroupFindingsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_GroupFindingsResponse
   */
  public function group($parent, Google_Service_SecurityCommandCenter_GroupFindingsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('group', array($params), "Google_Service_SecurityCommandCenter_GroupFindingsResponse");
  }
  /**
   * Lists an organization or source's findings.
   *
   * To list across all sources provide a `-` as the source id. Example:
   * /v1/organizations/123/sources/-/findings
   * (findings.listOrganizationsSourcesFindings)
   *
   * @param string $parent Name of the source the findings belong to. Its format
   * is "organizations/[organization_id]/sources/[source_id]". To list across all
   * sources provide a source_id of `-`. For example: organizations/123/sources/-
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fieldMask Optional. A field mask to specify the Finding
   * fields to be listed in the response. An empty field mask will list all
   * fields.
   * @opt_param string pageToken The value returned by the last
   * `ListFindingsResponse`; indicates that this is a continuation of a prior
   * `ListFindings` call, and that the system should return the next page of data.
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. Default is 10, minimum is 1, maximum is 1000.
   * @opt_param string orderBy Expression that defines what fields and order to
   * use for sorting. The string value should follow SQL syntax: comma separated
   * list of fields. For example: "name,resource_properties.a_property". The
   * default sorting order is ascending. To specify descending order for a field,
   * a suffix " desc" should be appended to the field name. For example: "name
   * desc,source_properties.a_property". Redundant space characters in the syntax
   * are insignificant. "name desc,source_properties.a_property" and " name
   * desc  ,   source_properties.a_property  " are equivalent.
   *
   * The following fields are supported: name parent state category resource_name
   * event_time source_properties security_marks.marks
   * @opt_param string readTime Time used as a reference point when filtering
   * findings. The filter is limited to findings existing at the supplied time and
   * their values are those at that specific time. Absence of this field will
   * default to the API's version of NOW.
   * @opt_param string compareDuration When compare_duration is set, the
   * ListFindingsResult's "state_change" attribute is updated to indicate whether
   * the finding had its state changed, the finding's state remained unchanged, or
   * if the finding was added in any state during the compare_duration period of
   * time that precedes the read_time. This is the time between (read_time -
   * compare_duration) and read_time.
   *
   * The state_change value is derived based on the presence and state of the
   * finding at the two points in time. Intermediate state changes between the two
   * times don't affect the result. For example, the results aren't affected if
   * the finding is made inactive and then active again.
   *
   * Possible "state_change" values when compare_duration is specified:
   *
   * * "CHANGED":   indicates that the finding was present at the start of
   * compare_duration, but changed its state at read_time. * "UNCHANGED":
   * indicates that the finding was present at the start of
   * compare_duration and did not change state at read_time. * "ADDED":
   * indicates that the finding was not present at the start                  of
   * compare_duration, but was present at read_time.
   *
   * If compare_duration is not specified, then the only possible state_change is
   * "UNUSED", which will be the state_change set for all findings present at
   * read_time.
   * @opt_param string filter Expression that defines the filter to apply across
   * findings. The expression is a list of one or more restrictions combined via
   * logical operators `AND` and `OR`. Parentheses are supported, and `OR` has
   * higher precedence than `AND`.
   *
   * Restrictions have the form `  ` and may have a `-` character in front of them
   * to indicate negation. Examples include:
   *
   * name source_properties.a_property security_marks.marks.marka
   *
   * The supported operators are:
   *
   * * `=` for all value types. * `>`, `<`, `>=`, `<=` for integer values. * `:`,
   * meaning substring matching, for strings.
   *
   * The supported value types are:
   *
   * * string literals in quotes. * integer literals without quotes. * boolean
   * literals `true` and `false` without quotes.
   *
   * The following field and operator combinations are supported:
   *
   * name: `=` parent: `=`, `:` resource_name: `=`, `:` state: `=`, `:` category:
   * `=`, `:` external_uri: `=`, `:` event_time: `=`, `>`, `<`, `>=`, `<=`
   *
   *   Usage: This should be milliseconds since epoch or an RFC3339 string.
   * Examples:     "event_time = \"2019-06-10T16:07:18-07:00\""     "event_time =
   * 1560208038000"
   *
   * security_marks.marks: `=`, `:` source_properties: `=`, `:`, `>`, `<`, `>=`,
   * `<=`
   *
   * For example, `source_properties.size = 100` is a valid filter string.
   * @return Google_Service_SecurityCommandCenter_ListFindingsResponse
   */
  public function listOrganizationsSourcesFindings($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SecurityCommandCenter_ListFindingsResponse");
  }
  /**
   * Creates or updates a finding. The corresponding source must exist for a
   * finding creation to succeed. (findings.patch)
   *
   * @param string $name The relative resource name of this finding. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example: "organizations/123/sources/456/findings/789"
   * @param Google_Service_SecurityCommandCenter_Finding $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the finding
   * resource. This field should not be specified when creating a finding.
   *
   * When updating a finding, an empty mask is treated as updating all mutable
   * fields and replacing source_properties.  Individual source_properties can be
   * added/updated by using "source_properties." in the field mask.
   * @return Google_Service_SecurityCommandCenter_Finding
   */
  public function patch($name, Google_Service_SecurityCommandCenter_Finding $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_SecurityCommandCenter_Finding");
  }
  /**
   * Updates the state of a finding. (findings.setState)
   *
   * @param string $name The relative resource name of the finding. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Example: "organizations/123/sources/456/finding/789".
   * @param Google_Service_SecurityCommandCenter_SetFindingStateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SecurityCommandCenter_Finding
   */
  public function setState($name, Google_Service_SecurityCommandCenter_SetFindingStateRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setState', array($params), "Google_Service_SecurityCommandCenter_Finding");
  }
  /**
   * Updates security marks. (findings.updateSecurityMarks)
   *
   * @param string $name The relative resource name of the SecurityMarks. See:
   * https://cloud.google.com/apis/design/resource_names#relative_resource_name
   * Examples: "organizations/123/assets/456/securityMarks"
   * "organizations/123/sources/456/findings/789/securityMarks".
   * @param Google_Service_SecurityCommandCenter_SecurityMarks $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The FieldMask to use when updating the security
   * marks resource.
   *
   * The field mask must not contain duplicate fields. If empty or set to "marks",
   * all marks will be replaced.  Individual marks can be updated using "marks.".
   * @opt_param string startTime The time at which the updated SecurityMarks take
   * effect. If not set uses current server time.  Updates will be applied to the
   * SecurityMarks that are active immediately preceding this time.
   * @return Google_Service_SecurityCommandCenter_SecurityMarks
   */
  public function updateSecurityMarks($name, Google_Service_SecurityCommandCenter_SecurityMarks $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateSecurityMarks', array($params), "Google_Service_SecurityCommandCenter_SecurityMarks");
  }
}
