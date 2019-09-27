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

class Google_Service_FirebaseCloudMessaging_WebpushConfig extends Google_Model
{
  public $data;
  protected $fcmOptionsType = 'Google_Service_FirebaseCloudMessaging_WebpushFcmOptions';
  protected $fcmOptionsDataType = '';
  public $headers;
  public $notification;

  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param Google_Service_FirebaseCloudMessaging_WebpushFcmOptions
   */
  public function setFcmOptions(Google_Service_FirebaseCloudMessaging_WebpushFcmOptions $fcmOptions)
  {
    $this->fcmOptions = $fcmOptions;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_WebpushFcmOptions
   */
  public function getFcmOptions()
  {
    return $this->fcmOptions;
  }
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setNotification($notification)
  {
    $this->notification = $notification;
  }
  public function getNotification()
  {
    return $this->notification;
  }
}
