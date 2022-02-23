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


## 生成rsa对称加密key
当 openssl 安装完毕后，我们就可以开始生成私钥、公钥了。

* 首先，生成原始 RSA 私钥文件
openssl genrsa -out rsa_private_key.pem 1024
注：这里生成了一个长度为 1024bit 的密钥，转化为字节就是 128byte

* 其次，将原始 RSA 私钥转换为 pkcs8 格式
openssl pkcs8 -topk8 -inform PEM -in rsa_private_key.pem -outform PEM -nocrypt -out private_key.pem

* 最后，生成 RSA 公钥
openssl rsa -in rsa_private_key.pem -pubout -out rsa_public_key.pem
在需要使用的时候，我们将私钥 rsa_private_key.pem 放在服务器端，公钥发放给需要与我们进行加密通信的一方就可以了。


