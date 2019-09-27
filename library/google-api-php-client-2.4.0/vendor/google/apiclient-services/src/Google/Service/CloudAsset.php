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
 * Service definition for CloudAsset (v1).
 *
 * <p>
 * The cloud asset API manages the history and inventory of cloud resources.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/resource-manager/docs/cloud-asset-inventory/quickstart-cloud-asset-inventory" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudAsset extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $operations;
  public $v1;
  
  /**
   * Constructs the internal representation of the CloudAsset service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://cloudasset.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'cloudasset';

    $this->operations = new Google_Service_CloudAsset_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->v1 = new Google_Service_CloudAsset_Resource_V1(
        $this,
        $this->serviceName,
        'v1',
        array(
          'methods' => array(
            'batchGetAssetsHistory' => array(
              'path' => 'v1/{+parent}:batchGetAssetsHistory',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'assetNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'contentType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'readTimeWindow.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'readTimeWindow.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'exportAssets' => array(
              'path' => 'v1/{+parent}:exportAssets',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
