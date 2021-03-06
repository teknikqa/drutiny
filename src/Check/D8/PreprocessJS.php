<?php

namespace Drutiny\Check\D8;

use Drutiny\Check\Check;

/**
 * @Drutiny\Annotation\CheckInfo(
 *  title = "JS aggregation",
 *  description = "With JS optimization disabled, your website visitors are experiencing slower page performance and the server load is increased.",
 *  remediation = "Set the configuration object <code>system.performance</code> key <code>js.preprocess</code> to be <code>TRUE</code>.",
 *  success = "JS aggregation is enabled.:fixups",
 *  failure = "JS aggregation is not enabled.",
 *  exception = "Could not determine JS aggregation setting.",
 *  supports_remediation = TRUE,
 * )
 */
class PreprocessJS extends Check {

  /**
   * @inheritDoc
   */
  public function check() {
    return $this->context->drush->getConfig('system.performance', 'js.preprocess', TRUE);
  }

  /**
   * @inheritDoc
   */
  public function remediate() {
    $res = $this->context->drush->configSet('system.performance', 'js.preprocess', TRUE);
    return $res->isSuccessful();
  }

}
