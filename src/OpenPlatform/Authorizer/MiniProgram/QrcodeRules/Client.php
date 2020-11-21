<?php
/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OpenPlatform\Authorizer\MiniProgram\QrcodeRules;

use EasyWeChat\Kernel\BaseClient;
/**
 * Class Client.
 * 二维码有关的设置
 *
 * @author scientistpun <honynero@sina.cn>
 */
class Client extends BaseClient
{
    const VERSION_DEVELOP   = 1;
    const VERSION_TEST      = 2;
    const VERSION_OFFICAL   = 3;

    /**
     * 获取已设置的二维码规则.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getlist() {
        return $this->httpPostJson('cgi-bin/wxopen/qrcodejumpget');
    }

    /**
     * 增加或修改二维码规则.
     *
     * @param array $prefix
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modify(array $params) {
        return $this->httpPostJson('cgi-bin/wxopen/qrcodejumpadd', $params);
    }

    /**
     * 获取校验文件信息.
     * 
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getcheckinfo() {
        return $this->httpPostJson('cgi-bin/wxopen/qrcodejumpdownload');
    }
}
