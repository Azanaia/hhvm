/*
   +----------------------------------------------------------------------+
   | HipHop for PHP                                                       |
   +----------------------------------------------------------------------+
   | Copyright (c) 2010-present Facebook, Inc. (http://www.facebook.com)  |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
*/

#pragma once

#include "hphp/runtime/server/access-log.h"
#include "hphp/runtime/server/cli-server.h"
#include "hphp/runtime/server/server.h"
#include "hphp/runtime/base/execution-context.h"
#include "hphp/runtime/base/request-id.h"

namespace HPHP {

struct RequestURI;
struct Transport;
///////////////////////////////////////////////////////////////////////////////

struct XboxRequestHandler : RequestHandler {
  static AccessLog &GetAccessLog() { return s_accessLog; }

  XboxRequestHandler();
  ~XboxRequestHandler() override;

  void setServerInfo(std::shared_ptr<SatelliteServerInfo> info) {
    m_serverInfo = info;
  }

  void setLogInfo(bool logInfo);

  // implementing RequestHandler
  void teardownRequest(Transport* transport) noexcept override;
  void handleRequest(Transport* transport) override;
  void abortRequest(Transport* transport) override;

  time_t getLastResetTime() const { return m_lastReset; }

  void setCliContext(CLIContext&& ctx) override {
    m_cli.emplace(std::move(ctx));
  }
private:
  ExecutionContext *m_context;
  std::shared_ptr<SatelliteServerInfo> m_serverInfo;
  bool m_logResets;
  time_t m_lastReset;
  Optional<CLIContext> m_cli;

  void initState(RequestId requestId, Transport* transport);

  bool executePHPFunction(Transport *transport);

  std::string getSourceFilename(const std::string &path);

  static THREAD_LOCAL(AccessLog::ThreadData, s_accessLogThreadData);
  static AccessLog s_accessLog;

  static AccessLog::ThreadData* getAccessLogThreadData() {
    return s_accessLogThreadData.get();
  }
};

///////////////////////////////////////////////////////////////////////////////
}
