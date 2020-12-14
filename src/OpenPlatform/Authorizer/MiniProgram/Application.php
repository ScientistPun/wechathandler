<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OpenPlatform\Authorizer\MiniProgram;

use EasyWeChat\MiniProgram\Application as MiniProgram;
use EasyWeChat\OpenPlatform\Authorizer\Aggregate\AggregateServiceProvider;

/**
 * Class Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Account\Client $account
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Code\Client    $code
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Domain\Client  $domain
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Setting\Client $setting
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Tester\Client  $tester
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\QrcodeRules\Client  $qrcodeRules
 * @property \EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Plugin\Client  $plugin
 */
class Application extends MiniProgram
{
    /**
     * Application constructor.
     */
    public function __construct(array $config = [], array $prepends = [])
    {
        parent::__construct($config, $prepends);

        $providers = [
            AggregateServiceProvider::class,
            Code\ServiceProvider::class,
            Domain\ServiceProvider::class,
            Account\ServiceProvider::class,
            Setting\ServiceProvider::class,
            Tester\ServiceProvider::class,
            QrcodeRules\ServiceProvider::class,          // 2020-11-20 16:24 scientistpun 新添加
            Plugin\ServiceProvider::class,          // 2020-12-14 16:24 scientistpun 新添加
        ];

        foreach ($providers as $provider) {
            $this->register(new $provider());
        }
    }
}
