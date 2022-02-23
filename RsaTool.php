<?php
/**
 * Created by PhpStorm.
 * User: DIFF
 * Date: 2022/2/23
 * Time: 16:30
 */

class RsaTool
{
    private $_config = [
        'public_key' => '',
        'private_key' => '',
    ];

    public function __construct($private_key_filepath='', $public_key_filepath='') {
        $private_key_filepath && $this->_config['private_key'] = $this->_getContents($private_key_filepath);
        $public_key_filepath && $this->_config['public_key'] = $this->_getContents($public_key_filepath);
    }

    /**
     * 设置key
     * @param $private_key
     * @param $public_key
     */
    public function setKey($private_key,$public_key){
        $private_key && $this->_config['private_key'] = $private_key;
        $public_key && $this->_config['public_key'] = $public_key;
    }

    /**
     * 把公钥字符串转成pem格式
     * @param $keyStr
     * @return string
     */
    public function keyStrToPublicPemFormat($keyStr){
        $pemStr = chunk_split($keyStr, 64, "\n");
        return "-----BEGIN PUBLIC KEY-----\n" . $pemStr . "-----END PUBLIC KEY-----\n";
    }
    /**
     * 把私钥字符串转成pem格式
     * @param $keyStr
     * @return string
     */
    public function keyStrToPrivatePemFormat($keyStr){
        $pemStr = chunk_split($keyStr, 64, "\n");
        return "-----BEGIN RSA PRIVATE KEY-----\n" . $pemStr . "-----END RSA PRIVATE KEY-----\n";
    }

    /**
     * @uses 获取文件内容
     * @param $file_path string
     * @return bool|string
     */
    private function _getContents($file_path) {
        file_exists($file_path) or die ('密钥或公钥的文件路径错误');
        return file_get_contents($file_path);
    }

    /**
     * @uses 获取私钥
     * @return bool|resource
     */
    private function _getPrivateKey() {
        $priv_key = $this->_config['private_key'];
        return openssl_pkey_get_private($priv_key);
    }

    /**
     * @uses 获取公钥
     * @return bool|resource
     */
    private function _getPublicKey() {
        $public_key = $this->_config['public_key'];
        return openssl_pkey_get_public($public_key);
    }

    /**
     * @uses 私钥加密
     * @param string $data
     * @return null|string
     */
    public function privEncrypt($data = '') {
        if (!is_string($data)) {
            return null;
        }
        return openssl_private_encrypt($data, $encrypted, $this->_getPrivateKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * @uses 公钥加密
     * @param string $data
     * @return null|string
     */
    public function publicEncrypt($data = '') {
        if (!is_string($data)) {
            return null;
        }
        return openssl_public_encrypt($data, $encrypted, $this->_getPublicKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * @uses 私钥解密
     * @param string $encrypted
     * @return null
     */
    public function privDecrypt($encrypted = '') {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_private_decrypt(base64_decode($encrypted), $decrypted, $this->_getPrivateKey())) ? $decrypted : null;
    }

    /**
     * @uses 公钥解密
     * @param string $encrypted
     * @return null
     */
    public function publicDecrypt($encrypted = '') {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_public_decrypt(base64_decode($encrypted), $decrypted, $this->_getPublicKey())) ? $decrypted : null;
    }

    /**
     * 私钥签名
     * @param $data
     * @return string|null
     */
    public function privateKeySign($data){
        $sign = openssl_sign($data, $encrypted, $this->_getPrivateKey()) ? base64_encode($encrypted) : null;
        openssl_free_key($this->_getPrivateKey());
        return $sign;
    }

    /**
     * 公钥验证签名
     * @param $data
     * @param $sign
     * @return false|int
     */
    public function publicKeyVerify($data,$sign){
        $verify = openssl_verify($data, base64_decode($sign), $this->_getPublicKey());
        openssl_free_key($this->_getPublicKey());
        return $verify;
    }
}
