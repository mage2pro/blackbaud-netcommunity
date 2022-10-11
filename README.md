The module integrates Magento 2 with the [Blackbaud NetCommunity](https://www.blackbaud.com/online-marketing/netcommunity) online fundraising software.  
The module is **free** and **open source**.

## Screenshots
### 1. The «Create New Customer Account» screen
![](https://mage2.pro/uploads/default/original/2X/8/8248d7a64df5eb4f14cce3825a62c33cdb5627f3.png)

### 2. The «Customer Login» screen
![](https://mage2.pro/uploads/default/original/2X/4/43e5f43b4b2fe4881a6fddd4f85964c1dd480ece.png)

### 3. The login button at the header
![](https://mage2.pro/uploads/default/original/2X/1/1398a9541959cb6f169786119f7aab4990e4335e.png)

### 4. The backend settings
![](https://mage2.pro/uploads/default/original/2X/b/bacd420de4e5bf7db9777f8167fe6ebf2e182cb1.png)

## How to install
[Hire me in Upwork](https://www.upwork.com/fl/mage2pro), and I will: 
- install and configure the module properly on your website
- answer your questions
- solve compatiblity problems with third-party checkout, shipping, marketing modules
- implement new features you need 

### 2. Self-installation
```
bin/magento maintenance:enable
rm -f composer.lock
composer clear-cache
composer require mage2pro/blackbaud-netcommunity:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f en_US <additional locales>
bin/magento maintenance:disable
```

## How to update
```
bin/magento maintenance:enable
composer remove mage2pro/blackbaud-netcommunity
rm -f composer.lock
composer clear-cache
composer require mage2pro/blackbaud-netcommunity:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f en_US <additional locales>
bin/magento maintenance:disable
```