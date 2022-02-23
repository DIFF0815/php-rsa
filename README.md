# php-rsa
php-rsa加密解密和签名验签

```php
//测试rsa
//公钥私钥为文件时：加密解密和签名验签
/*$data = [1,2,3,4,5,6];
$dataJson = json_encode($data);
echo "原始字符串：".$dataJson.PHP_EOL;
$private_key_filepath = 'rsa_private_key.pem';
$public_key_filepath = 'rsa_public_key.pem';
$rsaTool = new RsaTool($private_key_filepath,$public_key_filepath);
$enPriv = $rsaTool->privEncrypt($dataJson);
echo "私钥加密的字符串：".$enPriv.PHP_EOL;
$dePub = $rsaTool->publicDecrypt($enPriv);
echo "公钥解密后的字符串：".$dePub.PHP_EOL;
$enPub = $rsaTool->publicEncrypt($dataJson);
echo "公钥加密的字符串：".$enPub.PHP_EOL;
$dePriv = $rsaTool->privDecrypt($enPub);
echo "私钥解密后的字符串：".$dePriv.PHP_EOL;*/

//公钥私钥为字符串时：加密解密和签名验签
/*echo '-----'.PHP_EOL;
$privateKey = "MIICXAIBAAKBgQC32m37jQfnuLDtiStPwJ49EwyfJA02B/hPLjgBK8IeNoDnNLXx+lHPBHmwUm5VtT2S+wkTOlA4tvomIhvzQGmQDGMxYHc9oSi/0llQQsj44iJCCdcsmdoUqwrSlGNw0c0v9KLiC+fCrsj7QJmol4i2T08HdaSHG2FhlNn4R2vhsQIDAQABAoGBAIROIjuWIAw3MsudnJeF69nTrY+QaBlr3ttMTW06SjVnz5eSrSR3mQu7Er86csAm7yqokL1Ph49ozddHUIna3pta8PCHcWXx6HhGm6zZYGnFpuPFUPi4Ftda6N7tYpQtlzxCYbz9HXI10kGHShHHCsBtFkAvRZpRTa0eY0TpJ/gpAkEA8SBVyH3IASIpLJxdGln0J85Og6uUwEKu8HC9FFgrVGczP3P0DSFz1VRtI+JiAwPBLyyVkdUOBqmfj90YElketwJBAMMxr6gTGCKiaA7AFxjb6Scae0/zTbfUvOfRFRYUUSjJ0lD90dRg+tvoAOLoqmWYk9rYvDmQkEPNGVBWq9WvmtcCQDDPDM5Ct8OS+KaxGB+HaebM2hPJHZk1ZlgBWiTOHCc/pJ4JiLNHvDzIlDcZUiGuFuLHsZcNe4NZvpTOelrsc00CQDmyeiXIXx39u5yAk1M5zdVNMp4TYSmxrJUpbH42SzcvUQe3v0pz0DMohPqNo7CcRTgvUJQDc2FXQuBIfkqPuckCQAbvPL7vM/m/Gw9BOmSViVgCa+TKxGpGumBHWDMYSPvRiF53cSDuoEffekKxS5JyGyMI93ZpF1/2Dnsl2s+GRFY=";
$public_key = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC32m37jQfnuLDtiStPwJ49EwyfJA02B/hPLjgBK8IeNoDnNLXx+lHPBHmwUm5VtT2S+wkTOlA4tvomIhvzQGmQDGMxYHc9oSi/0llQQsj44iJCCdcsmdoUqwrSlGNw0c0v9KLiC+fCrsj7QJmol4i2T08HdaSHG2FhlNn4R2vhsQIDAQAB";
$data = [1,2,3,4,5,6];
$dataJson = json_encode($data);
echo "原始字符串：".$dataJson.PHP_EOL;
echo '-----'.PHP_EOL;
$rsaTool = new RsaTool();
$private_key_pem_str = $rsaTool->keyStrToPrivatePemFormat($privateKey);
$public_key_pem_str = $rsaTool->keyStrToPublicPemFormat($public_key);
//echo "public_key_pem_str:".$public_key_pem_str.PHP_EOL;
$rsaTool->setKey($private_key_pem_str,$public_key_pem_str);
$enPriv = $rsaTool->privEncrypt($dataJson);
echo "私钥加密的字符串：".$enPriv.PHP_EOL;
$dePub = $rsaTool->publicDecrypt($enPriv);
echo "公钥解密后的字符串：".$dePub.PHP_EOL;
$enPub = $rsaTool->publicEncrypt($dataJson);
echo "公钥加密的字符串：".$enPub.PHP_EOL;
$dePriv = $rsaTool->privDecrypt($enPub);
echo "私钥解密后的字符串：".$dePriv.PHP_EOL;
echo '-----'.PHP_EOL;
$sign = $rsaTool->privateKeySign($dataJson);
echo "私钥签名数据：".$sign.PHP_EOL;
$check = $rsaTool->publicKeyVerify($dataJson,$sign);
echo "公钥验签验证：".$check.PHP_EOL;*/

```
