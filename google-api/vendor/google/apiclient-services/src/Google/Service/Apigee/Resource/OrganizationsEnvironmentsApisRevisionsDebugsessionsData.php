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
 * The "data" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $data = $apigeeService->data;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsApisRevisionsDebugsessionsData extends Google_Service_Resource
{
  /**
   * Gets the debug data from a transaction. (data.get)
   *
   * @param string $name Required. The name of the debug session transaction. Must
   * be of the form:  `organizations/{organization}/environments/{environment}/api
   * s/{api}/revisions/{revision}/debugsessions/{session}/data/{transaction}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DebugSessionTransaction
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DebugSessionTransaction");
  }
  /**
   * Lists the transaction IDs from a debug session.
   * (data.listOrganizationsEnvironmentsApisRevisionsDebugsessionsData)
   *
   * @param string $parent Required. The name of the debug sessions for which to
   * list transactions. Must be of the form:  `organizations/{organization}/enviro
   * nments/{environment}/apis/{api}/revisions/{revision}/debugsessions/{session}`
   * .
   * @param array $optParams Optional parameters.
   *
   * @opt_param int limit Optional. A http query parameter that can control the
   * maximum number of debug session transactions that can be returned by UAP.
   * @return Google_Service_Apigee_ListResponse
   */
  public function listOrganizationsEnvironmentsApisRevisionsDebugsessionsData($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_ListResponse");
  }
}