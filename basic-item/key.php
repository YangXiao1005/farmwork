<?php
/**
 * 使用openssl实现非对称加密
 */
class Rsa{
    /**
     * 私钥
     */
    private $_privKey;
    /**
     * 公钥
     */
    private $_pubKey;
    /**
     * 创建公钥和私钥
     */
    public function createKey(){
        $config = [
            "config" => 'D:\phpStudy\Apache\conf\openssl.cnf',
            "private_key_bits" => 1024,
        ];
        // 生成私钥
        $rsa = openssl_pkey_new($config);
        openssl_pkey_export($rsa, $privKey,null, $config);
        file_put_contents('./private.txt', $privKey);
        $this->_privKey = openssl_pkey_get_public($privKey);
        // 生成公钥
        $rsaPri = openssl_pkey_get_details($rsa);
        $pubKey = $rsaPri['key'];
        file_put_contents('./public.txt', $pubKey);
        $this->_pubKey = openssl_pkey_get_public($pubKey);
    }
    /**
     * 设置私钥
     */
    public function setupPrivKey(){
        if (is_resource($this->_privKey)) {
            return true;
        }
        $file = 'private.txt';
        $privKey = file_get_contents($file);
        $this->_privKey = openssl_pkey_get_private($privKey);
        return true;
    }
    /**
     * 设置公钥
     */
    public function setupPubKey()
    {
        if (is_resource($this->_pubKey)) {
            return true;
        }
        $file = 'public.txt';
        $pubKey = file_get_contents($file);
        $this->_pubKey = openssl_pkey_get_public($pubKey);
        return true;
    }
    /**
     * 用私钥加密
     */
    public function privEncrypt($data)
    {
        if (!is_string($data)) {
            return null;
        }
        $this->setupPrivKey();
        $result = openssl_private_encrypt($data, $encrypted, $this->_privKey);
        if ($result) {
            return base64_encode($encrypted);
        }
        return null;
    }
    /**
     * 私钥解密
     */
    public function privDecrypt($encrypted)
    {
        if (!is_string($encrypted)) {
            return null;
        }
        $this->setupPrivKey();
        $encrypted = base64_decode($encrypted);
        $result = openssl_private_decrypt($encrypted, $decrypted, $this->_privKey);
        if ($result) {
            return $decrypted;
        }
        return null;
    }
    /**
     * 公钥加密
     */
    public function pubEncrypt($data)
    {
        if (!is_string($data)) {
            return null;
        }
        $this->setupPubKey();
        $result = openssl_public_encrypt($data, $encrypted, $this->_pubKey);
        if ($result) {
            return base64_encode($encrypted);
        }
        return null;
    }
    /**
     * 公钥解密
     */
    public function pubDecrypt($crypted)
    {
        if (!is_string($crypted)) {
            return null;
        }
        $this->setupPubKey();
        $crypted = base64_decode($crypted);
        $result = openssl_public_decrypt($crypted, $decrypted, $this->_pubKey);
        if ($result) {
            return $decrypted;
        }
        return null;
    }
    /**
     * __destruct
     */
    public function __destruct() {
        @fclose($this->_privKey);
        @fclose($this->_pubKey);
    }
}
header("content-type:text/html;charset=UTF-8");
$rsa = new Rsa();
$rsa->createKey();
//私钥加密，公钥解密
echo "待加密数据：segmentfault.com\n";
$pre = $rsa->privEncrypt("segmentfault.com");
echo "加密后的密文:\n" . $pre . "\n";
$pud = $rsa->pubDecrypt($pre);
echo "解密后数据:" . $pud . "\n";

//公钥加密，私钥解密
echo "<br>";
echo "待加密数据：woshinidaye\n";
$pue = $rsa->pubEncrypt("woshinidaye");
echo "加密后的密文:\n" . $pue . "\n";
$prd = $rsa->privDecrypt($pue);
echo "解密后数据:" . $prd;
?>

?>