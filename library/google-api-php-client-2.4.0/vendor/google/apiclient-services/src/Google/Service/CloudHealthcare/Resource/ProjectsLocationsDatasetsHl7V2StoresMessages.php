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
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $messages = $healthcareService->messages;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsHl7V2StoresMessages extends Google_Service_Resource
{
  /**
   * Creates a message and sends a notification to the Cloud Pub/Sub topic. If
   * configured, the MLLP adapter listens to messages created by this method and
   * sends those back to the hospital. A successful response indicates the message
   * has been persisted to storage and a Cloud Pub/Sub notification has been sent.
   * Sending to the hospital by the MLLP adapter happens asynchronously.
   * (messages.create)
   *
   * @param string $parent The name of the dataset this message belongs to.
   * @param Google_Service_CloudHealthcare_CreateMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_Message
   */
  public function create($parent, Google_Service_CloudHealthcare_CreateMessageRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_Message");
  }
  /**
   * Deletes an HL7v2 message. (messages.delete)
   *
   * @param string $name The resource name of the HL7v2 message to delete.
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
   * Gets an HL7v2 message. (messages.get)
   *
   * @param string $name The resource name of the HL7v2 message to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies which parts of the Message resource should
   * be returned in the response.
   * @return Google_Service_CloudHealthcare_Message
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_Message");
  }
  /**
   * Ingests a new HL7v2 message from the hospital and sends a notification to the
   * Cloud Pub/Sub topic. Return is an HL7v2 ACK message if the message was
   * successfully stored. Otherwise an error is returned.  If an identical HL7v2
   * message is created twice only one resource is created on the server and no
   * error is reported. (messages.ingest)
   *
   * @param string $parent The name of the HL7v2 store this message belongs to.
   * @param Google_Service_CloudHealthcare_IngestMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_IngestMessageResponse
   */
  public function ingest($parent, Google_Service_CloudHealthcare_IngestMessageRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('ingest', array($params), "Google_Service_CloudHealthcare_IngestMessageResponse");
  }
  /**
   * Lists all the messages in the given HL7v2 store with support for filtering.
   *
   * Note: HL7v2 messages are indexed asynchronously, so there might be a slight
   * delay between the time a message is created and when it can be found through
   * a filter. (messages.listProjectsLocationsDatasetsHl7V2StoresMessages)
   *
   * @param string $parent Name of the HL7v2 store to retrieve messages from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts messages returned to those matching a
   * filter. Syntax:
   * https://cloud.google.com/appengine/docs/standard/python/search/query_strings
   *
   * Fields/functions available for filtering are:
   *
   * *  `message_type`, from the MSH-9 segment; for example `NOT message_type =
   * "ADT"` *  `send_date` or `sendDate`, the YYYY-MM-DD date the message was sent
   * in the dataset's time_zone, from the MSH-7 segment; for example `send_date <
   * "2017-01-02"` *  `send_time`, the timestamp when the message was sent, using
   * the RFC3339 time format for comparisons, from the MSH-7 segment; for example
   * `send_time < "2017-01-02T00:00:00-05:00"` *  `send_facility`, the care center
   * that the message came from, from the MSH-4 segment; for example
   * `send_facility = "ABC"` *  `HL7RegExp(expr)`, which does regular expression
   * matching of `expr` against the message payload using re2
   * (http://code.google.com/p/re2/) syntax; for example
   * `HL7RegExp("^.*\|.*\|EMERG")` *  `PatientId(value, type)`, which matches if
   * the message lists a patient having an ID of the given value and type in the
   * PID-2, PID-3, or PID-4 segments; for example `PatientId("123456", "MRN")` *
   * `labels.x`, a string value of the label with key `x` as set using the
   * Message.labels map, for example `labels."priority"="high"`. The operator `:*`
   * can be used to assert the existence of a label, for example
   * `labels."priority":*`.
   *
   * Limitations on conjunctions:
   *
   * *  Negation on the patient ID function or the labels field is not supported,
   * for example these queries are invalid: `NOT PatientId("123456", "MRN")`, `NOT
   * labels."tag1":*`, `NOT labels."tag2"="val2"`. *  Conjunction of multiple
   * patient ID functions is not supported, for example this query is invalid:
   * `PatientId("123456", "MRN") AND PatientId("456789", "MRN")`. *  Conjunction
   * of multiple labels fields is also not supported, for example this query is
   * invalid: `labels."tag1":* AND labels."tag2"="val2"`. *  Conjunction of one
   * patient ID function, one labels field and conditions on other fields is
   * supported, for example this query is valid: `PatientId("123456", "MRN") AND
   * labels."tag1":* AND message_type = "ADT"`.
   *
   * The HasLabel(x) and Label(x) syntax from previous API versions are
   * deprecated; replaced by the `labels.x` syntax.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @opt_param string orderBy Orders messages returned by the specified order_by
   * clause. Syntax:
   * https://cloud.google.com/apis/design/design_patterns#sorting_order
   *
   * Fields available for ordering are:
   *
   * *  `send_time`
   * @opt_param int pageSize Limit on the number of messages to return in a single
   * response. If zero the default page size of 100 is used.
   * @return Google_Service_CloudHealthcare_ListMessagesResponse
   */
  public function listProjectsLocationsDatasetsHl7V2StoresMessages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListMessagesResponse");
  }
  /**
   * Update the message. (messages.patch)
   *
   * @param string $name Resource name of the Message, of the form `projects/{proj
   * ect_id}/datasets/{dataset_id}/hl7V2Stores/{hl7_v2_store_id}/messages/{message
   * _id}`. Assigned by the server.
   * @param Google_Service_CloudHealthcare_Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask Only the `labels` field is
   * allowed to be updated. The labels in the request will be merged with the
   * existing set of labels. Existing labels with the same keys will be updated.
   * @return Google_Service_CloudHealthcare_Message
   */
  public function patch($name, Google_Service_CloudHealthcare_Message $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_Message");
  }
}
